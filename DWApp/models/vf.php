<?php defined('BASEPATH') OR exit('No direct script access allowed');


class vf extends CI_Model{

    public $data = array();

    function __construct(){
        parent::__construct();
    }

    ##################################################################
    #
    # PANEL
    #
    ##################################################################

    function PanelLoginControl(){
        if(@$this->session->userdata('SKPanel-Session') != 'OPEN'){
            redirect('../Panel/Login');
            exit(0);
        }
    }

    function DBCHECK(){
        if(@$this->session->userdata('DBNAME') == ''){
            redirect('../DBSelect');
            exit(0);
        }else{

        }
    }

    function panelview($view,$data=""){
        $this->load->view('Panel/' . $view,$data);
    }

    ##################################################################
    #
    # FUNCTION
    #
    ##################################################################


    function SelectReload($table,$key,$val,$select=""){

        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($key,$val);
        $query = $this->db->get();
        $row   = $query->result_array();

        if(@$row){
            echo('<option value=""> --- SEÇINIZ ---</option>');
            foreach ($row as $r){
                $selected = "";
                if($r["id"] == $select){
                    $selected = 'selected="selected"';
                }

                echo('<option ' . $selected . ' value="' . $r["id"] . '">' . $r["adi"] . '</option>');
            }
        }else{
            echo('<option value="" selected="selected"> --- Kayıt Bulunamadı ---</option>');
        }
    }

    function strtoupperTR($str)
    {
        $str = str_replace(array('i', 'ı', 'ü', 'ğ', 'ş', 'ö', 'ç'), array('İ', 'I', 'Ü', 'Ğ', 'Ş', 'Ö', 'Ç'), $str);
        return strtoupper($str);
    }

    function disktotal(){
        $total   = disk_total_space("/");
        return $this->formatSizeUnits($total);
    }

    function diskfree(){
        $free    = disk_free_space("/");
        return $this->formatSizeUnits($free);
    }


    function diskused(){
        $total   = disk_total_space("/");
        $free    = disk_free_space("/");
        $used    = $this->formatSizeUnits($total-$free);

        return $used;
    }

    function diskpercent(){
        $total   = disk_total_space("/");
        $free    = disk_free_space("/");
        $percent = sprintf('%.2f',( $free/ $total) * 100);

        return number_format($percent,0);
    }

    function diskpercents(){
        $total   = disk_total_space("/");
        $free    = disk_free_space("/");
        $percent = 100-sprintf('%.2f',( $free / $total) * 100);

        return $percent;
    }


    function diskcheck()
    {
        $output = shell_exec("df -h");
        $output = $this->replaceSpace(str_replace("\n","|",$output));
        $e = explode("|",$output);


        $total  = 0;
        $used   = 0;
        $avail  = 0;
        $use    = 0;

        for($x = 0 ; $x < (count($e)-1); $x++){



            if($x != 0){
                $out = str_replace(" ",",",$e[$x]);
                $ext = explode(",",$out);


                #Filesystem     = $ext[0];
                #Size           = $ext[1];
                #Used           = $ext[2];
                #Avail          = $ext[3];
                #Use            = $ext[4];

                $total += $this->Donustur($ext[1]);
                $used  += $this->Donustur($ext[2]);
                $avail += $this->Donustur($ext[3]);
                $use   += $ext[4];
            }

        }

        $data = array(
            "total"     => $this->formatSizeUnits($total),
            "used"      => $this->formatSizeUnits($used),
            "avail"     => $this->formatSizeUnits($avail),
            "percent"   => ($use/(count($e)-1))
        );

        return $data;
    }

    function replaceSpace($string)
    {
        $string = preg_replace("/\s+/", " ", $string);
        $string = trim($string);
        return $string;
    }

    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }


    function encode($sifrelenecek) {
        $kaynak			= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890[]:,|';
        $hedef  		= '[]quazDSoNehEWZsbAFjQcKOvTyLPlIiBdrCtRV@UXgYwpJmxGnH3790481625kM}!f';
        $yenikelime 	= strtr($sifrelenecek, $kaynak, $hedef);
        return $yenikelime;
    }

    function decode($sifrelenecek) {
        $kaynak 		= '[]quazDSoNehEWZsbAFjQcKOvTyLPlIiBdrCtRV@UXgYwpJmxGnH3790481625kM}!f';
        $hedef 			= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890[]:,|';
        $yenikelime 	= strtr($sifrelenecek, $kaynak, $hedef);
        return $yenikelime;
    }

    function formencode($sifrelenecek) {
        $kaynak			= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@';
        $hedef  		= 'quazDSoNehEWZsbAFjQcKOvTyLPlIiBdrCtRVUXgYwpJmxGnH3790481625kMf-';
        $yenikelime 	= strtr($sifrelenecek, $kaynak, $hedef);
        return $yenikelime;
    }

    function formdecode($sifrelenecek) {
        $kaynak 		= 'quazDSoNehEWZsbAFjQcKOvTyLPlIiBdrCtRVUXgYwpJmxGnH3790481625kMf@';
        $hedef 			= 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890-';
        $yenikelime 	= strtr($sifrelenecek, $kaynak, $hedef);
        return $yenikelime;
    }

    function seo($s) {
        $tr = array('ş','Ş','ı','İ','ğ','Ğ','ü','Ü','ö','Ö','Ç','ç');
        $eng = array('s','s','i','i','g','g','u','u','o','o','c','c');
        $s = str_replace($tr,$eng,$s);
        $s = strtolower($s);
        $s = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $s);
        $s = preg_replace('/[^%a-z0-9 _-]/', '', $s);
        $s = preg_replace('/\s+/', '-', $s);
        $s = preg_replace('|-+|', '-', $s);
        $s = trim($s, '-');
        return $s;
    }

    function sifre($uzunluk=8,$buyuk_harf=1,$kucuk_harf=1,$sayi_kullan=1,$ozel_karakter=1){
        $buyukler 	= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $kucukler 	= "abcdefghijklmnopqrstuvwxyz";
        $sayilar 	= "0123456789";
        $seed_length= 0;
        $seed		= "";
        $sifre		= "";
        if($buyuk_harf=='1'){
            $seed_length += 26;
            $seed .= $buyukler;
        }
        if($kucuk_harf=='1'){
            $seed_length += 26;
            $seed .= $kucukler;
        }
        if($sayi_kullan=='1'){
            $seed_length += 10;
            $seed .= $sayilar;
        }
        if($ozel_karakter=='1'){
            $seed_length +=strlen($ozel_karakter);
            $seed .= $ozel_karakter;
        }
        for($x=1;$x<=$uzunluk;$x++){

            $sifre .= $seed{rand(0,$seed_length-1)};
        }
        return($sifre);
    }

    function cleanInput($input) {

        $search = array(
            '@<script[^>]*?>.*?</script>@si', // Strip out javascript
            '@<[\/\!]*?[^<>]*?>@si', // Strip out HTML tags
            '@<style[^>]*?>.*?</style>@siU', // Strip style tags properly
            '@<![\s\S]*?--[ \t\n\r]*>@' // Strip multi-line comments
        );

        $output = preg_replace($search, '', $input);
        return $output;

    }

    function resize_crop_image($max_width, $max_height, $source_file, $dst_dir, $quality = 80){
        $imgsize = getimagesize($source_file);
        $width = $imgsize[0];
        $height = $imgsize[1];
        $mime = $imgsize['mime'];

        switch($mime){
            case 'image/gif':
                $image_create = "imagecreatefromgif";
                $image = "imagegif";
                break;

            case 'image/png':
                $image_create = "imagecreatefrompng";
                $image = "imagepng";
                $quality = 7;
                break;

            case 'image/jpeg':
                $image_create = "imagecreatefromjpeg";
                $image = "imagejpeg";
                $quality = 80;
                break;

            default:
                return false;
                break;
        }

        $dst_img = imagecreatetruecolor($max_width, $max_height);
        $src_img = $image_create($source_file);

        $width_new = $height * $max_width / $max_height;
        $height_new = $width * $max_height / $max_width;
        //if the new width is greater than the actual width of the image, then the height is too large and the rest cut off, or vice versa
        if($width_new > $width){
            //cut point by height
            $h_point = (($height - $height_new) / 2);
            //copy image
            imagecopyresampled($dst_img, $src_img, 0, 0, 0, $h_point, $max_width, $max_height, $width, $height_new);
        }else{
            //cut point by width
            $w_point = (($width - $width_new) / 2);
            imagecopyresampled($dst_img, $src_img, 0, 0, $w_point, 0, $max_width, $max_height, $width_new, $height);
        }

        $image($dst_img, $dst_dir, $quality);

        if($dst_img)imagedestroy($dst_img);
        if($src_img)imagedestroy($src_img);
    }

}