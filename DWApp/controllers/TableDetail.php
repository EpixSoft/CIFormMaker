<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Doğruweb Yazılım
 * Date: 2.08.2018
 * Time: 00:25
 * File Name : TableDetail.php
 */

class TableDetail extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->lang->load('genel', 'english');
        $this->vf->DBCHECK();
        $this->load->model("TableDetail_model","TableDetail");
    }

    public function Detail($table)
    {
        $data["Liste"] = $this->TableDetail->FieldList($table);
        $data["table"] = $table;

        $this->load->view('Header');
        $this->load->view('TableDetail',$data);
        $this->load->view('Footer');
    }

    function AddForm(){

        $table      = $this->input->post("table");

        $data       = json_decode($this->input->post("data"),true);

        $form       = "";
        $java       = "''";
        $x          = 0;
        $i          = 0;
        $control    = "";

        foreach ($data as $r){

            if($r["extra"] != "auto_increment" and $r["ft"] != "timestamp"){

                if( $r["required"] == "true") {
                    $required = "required";
                }else{
                    $required = "";
                }

                if($r["field"]  == "Input"){
                    $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <input type="' . $r["type"] . '" class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '" ' . $required . '>
    </div>
</div>
';

                }else if($r["field"]  == "Select"){
                    if( $r["type"] == "" ){
                        $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <select class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '"  ' . $required . '></select>
    </div>
</div>
';
                    }else{
                        $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <select class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '"  ' . $required . '>
            <?php echo($this->' . $table . '_model->' . $r["name"] . '() );?>
        </select>
    </div>
</div>
';
                    }
                }else if($r["field"]  == "Textarea"){
                    $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <textarea class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '"  ' . $required . '>&#60;/textarea>
    </div>
</div>
';
                }else if($r["field"]  == "Checkbox"){
                    $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
     <div class="col-sm-8">
        <input type="checkbox" class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '"  ' . $required . '>
    </div>
</div>
';
                }else if($r["field"]  == "Radio"){
                    $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <input type="radio" class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '">
    </div>
</div>
';
                }

                if( $x == 0){
                    $java = '"' . $r["name"] . '=" + $("#' . $r["name"] . '").val()';
                }else{
                    $java = $java . ' + 
                          "&' . $r["name"] . '=" + $("#' . $r["name"] . '").val()';
                }



                if( $r["required"] == "true"){
                    if($i == 0){
                        $control = $control . 'if( $("#' . $r["name"] . '").val() == ""){
                alert("It is necessary to fill in the field");
                $("#' . $r["name"] . '").focus();
            }';
                    }else{
                        $control = $control . ' else if( $("#' . $r["name"] . '").val() == ""){
                alert("It is necessary to fill in the field");
                $("#' . $r["name"] . '").focus();
            }';

                    }

                    $i++;
                }


                $x++;
            }
        }
        if( $control == ""){
            $control = '    $.ajax({
                type    : "POST",
                url     : "' . $table . '/insert",
                data    : ' . $java . ',
                success : function(r){
                    console.log( r ); 
                }
            })';
        }else {
            $control = $control . 'else{
                $.ajax({
                    type    : "POST",
                    url     : "' . $table . '/insert",
                    data    : ' . $java . ',
                    success : function(r){
                        console.log( r ); 
                    }
                })
            }';


        }
        echo( '<div class="row">');
        echo( '<div class="col-sm-6">');
        echo( '<label>Bootstrap Add Form</label>
<pre data-snap-ignore="true" class="xml.js"  data-language="xml.js"><code class="xml.js" id="BootstrapFormCopy">&#60;?php defined("BASEPATH") OR exit("No direct script access allowed");
/**
* Created by DW From Winzard
* Date: ' . date('d.m.Y') . '
* Time: ' . date('H:i') . '
* File Name : ' . $table . '.php - Codeignter View
*/
?>
<form>
' . str_replace('<','&#60;',$form) . '
&#60;a class="btn btn-success" id="FormProcessBTN">Form Save&#60;/a>
</form>
</code>></pre>');
        echo( '<a class="btn btn-dark text-white" id="BootstrapFormCopyBTN">Copy</a>');
        echo( '</div>');

        echo( '<div class="col-sm-6">');
        echo( '<label>Jquery Ajax Post</label>
<pre data-snap-ignore="true" class="javascript.js"  data-language="javascript.js"><code class="javascript.js" id="JqueryFormCopy">&#60;script>
$(document).ready(function(){
    $("#FormProcessBTN").click(function(){
        ' . str_replace('<','&#60;',$control) . '
    })                
});
&#60;/script>

</code>></pre>');
        echo( '<a class="btn btn-dark text-white" id="JqueryFormCopyBTN">Copy</a>');
        echo( '</div>');
        echo( '</div>');
    }

    function EditForm(){

        $table      = $this->input->post("table");
        $data       = json_decode($this->input->post("data"),true);

        $form       = "";
        $java       = "''";
        $x          = 0;
        $i          = 0;
        $control    = "";
        $required   = "";

        foreach ($data as $r){

            if($r["extra"] != "auto_increment" and $r["ft"] != "timestamp"){

                if( $r["required"] == "true") {
                    $required = "required";
                }else{
                    $required = "";
                }

                if($r["field"]  == "Input"){
                    $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <input type="' . $r["type"] . '" class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '" ' . $required . ' value="<?php echo($row["' . $r["name"] . '"]);?>">
    </div>
</div>
';

                }else if($r["field"]  == "Select"){
                    if( $r["type"] == "" ){
                        $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <select class="form-control" id="' . $r["name"] . '" name="' . $r["name"] . '"  ' . $required . '></select>
    </div>
</div>
';
                    }else{
                        $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <select class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '"  ' . $required . '>
            <?php echo($this->' . $table . '_model->' . $r["name"] . '() );?>
        </select>
    </div>
</div>
';
                    }
                }else if($r["field"]  == "Textarea"){
                    $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <textarea class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '"  ' . $required . '><?php echo($row["' . $r["name"] . '"]);?> &#60;/textarea>
    </div>
</div>
';
                }else if($r["field"]  == "Checkbox"){
                    $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <input type="checkbox" class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '"  ' . $required . '>
    </div>
</div>
';
                }else if($r["field"]  == "Radio"){
                    $form = $form . '
<div class="form-group row">
    <label for="' . $r["name"] . '" class="col-sm-4 col-form-label">' . $r["name"] . '</label>
    <div class="col-sm-8">
        <input type="radio" class="form-control" id="' . $r["name"] . '"  name="' . $r["name"] . '">
    </div>
</div>
';
                }

                if( $x == 0){
                    $java = '"' . $r["name"] . '=" + $("#' . $r["name"] . '").val()';
                }else{
                    $java = $java . ' + 
                          "&' . $r["name"] . '=" + $("#' . $r["name"] . '").val()';
                }



                if( $r["required"] == "true"){
                    if($i == 0){
                        $control = $control . 'if( $("#' . $r["name"] . '").val() == ""){
                alert("It is necessary to fill in the field");
                $("#' . $r["name"] . '").focus();
            }';
                    }else{
                        $control = $control . ' else if( $("#' . $r["name"] . '").val() == ""){
                alert("It is necessary to fill in the field");
                $("#' . $r["name"] . '").focus();
            }';

                    }

                    $i++;
                }


                $x++;
            }
        }
        if( $control == ""){
            $control = '    $.ajax({
                type    : "POST",
                url     : "' . $table . '/update",
                data    : ' . $java . ',
                success : function(r){
                    console.log( r ); 
                }
            })';
        }else {
            $control = $control . 'else{
                $.ajax({
                    type    : "POST",
                    url     : "' . $table . '/update",
                    data    : ' . $java . ',
                    success : function(r){
                        console.log( r ); 
                    }
                })
            }';


        }
echo( '<div class="row">');
echo( '<div class="col-sm-6">');
echo( '<label>Bootstrap Edit Form</label>
<pre data-snap-ignore="true" class="xml.js"  data-language="xml.js"><code class="xml.js" id="BootstrapFormCopy">&#60;?php defined("BASEPATH") OR exit("No direct script access allowed");
/**
* Created by DW From Winzard
* Date: ' . date('d.m.Y') . '
* Time: ' . date('H:i') . '
* File Name : ' . $table . '.php - Codeignter View
*/
?>
<form>
' . str_replace('<','&#60;',trim($form)) . '
&#60;a class="btn btn-success" id="FormProcessBTN">Form Save&#60;/a>
</form>
</code></pre>');
echo( '<a class="btn btn-dark text-white" id="BootstrapFormCopyBTN">Copy</a>');
echo( '</div>');

echo( '<div class="col-sm-6">');
echo( '<label>Jquery Ajax Post</label>
<pre data-snap-ignore="true" class="javascript.js"  data-language="javascript.js"><code class="javascript.js" id="JqueryFormCopy">&#60;script>
$(document).ready(function(){
    $("#FormProcessBTN").click(function(){
        ' . str_replace('<','&#60;',$control) . '
    })                
});
&#60;/script>

</code></pre>');
        echo( '<a class="btn btn-dark text-white" id="JqueryFormCopyBTN">Copy</a>');
        echo( '</div>');
        echo( '</div>');
    }

    function ControllerModel()
    {

        $table      = $this->input->post("table");
        $data       = json_decode($this->input->post("data"), true);

        $Field      = "";
        $LookUp     = "";
        $id         = '$this->input->post("id");';

        foreach ($data as $r) {

            if($r["extra"] == "auto_increment"){
                $id = '$this->input->post("' . $r["name"] . '");';
            }else{
                $id = '$this->input->post("id");';
            }

            if($r["extra"] != "auto_increment" and $r["ft"] != "timestamp") {

                $Field = $Field . '"' . $r["name"] . '" => $this->input->post("' . $r["name"] . '"),
                ';

            }

            if($r["field"]  == "Select") {
                if ($r["type"] != "") {

                $LookUp = $LookUp . 'function ' . $r["name"] . '(){
            $this->db->select("*");
            $this->db->from("' . $r["name"] . '");
            $row = $this->db->get()->result_array();
                
            if(@$row){
                echo(\'<option value=""> --- SEÇINIZ ---</option>\');
                foreach ($row as $r){
                    $selected = "";
                    if($r["id"] == $select){
                        $selected = \'selected="selected"\';
                    }
                    echo(\'<option \' . $selected . \' value="\' . $r["id"] . \'">\' . $r["name"] . \'</option>\');
                }
            }else{
                echo(\'<option value="" selected="selected"> --- Kayıt Bulunamadı ---</option>\');
            }
        }
    ';
                }
            }


        }
$controller = '<?php defined("BASEPATH") OR exit("No direct script access allowed");

/**
* Created by DW From Winzard
* Date: ' . date('d.m.Y') . '
* Time: ' . date('H:i') . '
* File Name : ' . $table . '.php - Codeignter Controller
*/

class ' . $table . ' extends CI_Controller{

    public $data = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("' . $table . '_model");
    }
        
    ##############################################
    #
    # List - Add - Edit
    #
    ##############################################
        
    public function index(){
        $data["query"] = $this->' . $table . '_model->Lists(0);  
        $this->vf->panelview("List",$data);
    }
        
    public function Lists($page)    {

        $page = $page-1;
        $limit = $page*25;
    
        $data["query"]      = $this->' . $table . '_model->Lists($limit);
        $data["page"]       = $page+1;
            
        $this->vf->panelview("List",$data);
    }
        
    public function Add(){              
        $this->vf->panelview("Add");
    }
        
    public function Edit($id){
        $data["row"] = $this->' . $table . '_model->Edit($id);  
        $this->vf->panelview("Edit",$data);
    }        
        
    ##############################################
    #
    # insert - update - delete
    #
    ##############################################
        
    function insert(){            
        $FormArray = array(
            ' . $Field . '
        );                    
        $this->' . $table . '_model->insert($FormArray);
    }
        
    function update(){
        $id = ' . $id . '
        $FormArray = array(
            ' . $Field . '
        );                    
        $this->' . $table . '_model->update($id,$FormArray);
    }
        
    function delete(){ 
        $id = ' . $id . '
        $this->' . $table . '_model->delete($id);
    }
}
';

$model = '<?php defined("BASEPATH") OR exit("No direct script access allowed");

/**
* Created by DW From Winzard
* Date: ' . date('d.m.Y') . '
* Time: ' . date('H:i') . '
* File Name : ' . $table . '_model.php - Codeignter Model
*/

class ' . $table . '_model extends CI_Model{
    
    public $data = array();
    
    function __construct(){
        parent::__construct();
    }
        
    ##############################################
    #
    # List - Edit
    #
    ##############################################
    
    function Lists($limit=0){
        $this->db->from("' . $table . '");
        $data["ttl"] = $this->db->count_all_results();
            
        $this->db->select("*");
        $this->db->from("' . $table . '");
        $this->db->limit("25",$limit);

        $data["row"] = $this->db->get()->result_array();
    
        return $data;
    }
        
    function Edit($id){
            
        $this->db->select("*");
        $this->db->from("' . $table . '");
        $this->db->where("id",$id);

        $q = $this->db->get()->row_array();
    
        return $q;
    }
        
    ##############################################
    #
    # insert - update - delete
    #
    ##############################################
    
    function insert($FormArray){
        $str = $this->db->insert_string("' . $table . '", $FormArray);
        $this->db->query($str);
        $id = $this->db->insert_id();
            
        echo($id);
    }
        
    function update($id,$FormArray){
        $this->db->where("id",$id);
        $this->db->update("' . $table . '",$FormArray);
    }
        
    function delete($id){
        $this->db->where("id",$id);
        $this->db->delete("' . $table . '");
    }
        
    ##############################################
    #
    # LOOP UP
    #
    ##############################################        
    ' . $LookUp . '        
}';


echo( '<div class="row">');
echo( '<div class="col-sm-6">');
echo( '<label>Controller - File Name : ' . $table . '.php</label>
<pre data-snap-ignore="true" class="php.js"  data-language="php.js"><code class="php.js" id="ControllerFormCopy">' . str_replace('<','&#60;',$controller) . '
</code></pre>');
        echo( '<a class="btn btn-dark text-white" id="ControllerFormCopyBTN">Copy</a>');
echo( '</div>');

echo( '<div class="col-sm-6">');
echo( '<label>Model - File Name : ' . $table . '_model.php</label>
<pre data-snap-ignore="true" class="php.js"  data-language="php.js"><code class="php.js" id="ModelFormCopy">' . str_replace('<','&#60;',$model) . '
</code></pre>');
        echo( '<a class="btn btn-dark text-white" id="ModelFormCopyBTN">Copy</a>');
echo( '</div>');
echo( '</div>');

    }


    function FieldType(){

        if( $this->input->post("val") == "Input"  ){
            echo('<select class="form-control input-sm">');
            echo('<option value="text">text</option>');
            echo('<option value="password">password</option>');
            echo('<option value="email">email</option>');
            echo('<option value="tel">tel</option>');
            echo('<option value="url">url</option>');
            echo('<option value="number">number</option>');
            echo('<option value="file">file</option>');
            echo('</select>');
        }else if( $this->input->post("val") == "Select"  ){
            echo('<select class="form-control input-sm">');
            echo('<option value=""> --- </option>');
            foreach ($this->TableDetail->TableList() as $row){
                echo('<option value="' . $row["Tables_in_" . $this->session->userdata('DBNAME')] . '">' . $row["Tables_in_" . $this->session->userdata('DBNAME')] . '</option>');
            }
            echo('</select>');
        }else{
            echo('<select class="form-control input-sm">');
            echo('<option value=""> --- </option>');
            echo('</select>');
        }


    }
}