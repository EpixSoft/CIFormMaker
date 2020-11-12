<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Doğruweb
 * Date: 2.08.2018
 * Time: 00:28
 * File Name : TableDetail.php
 */
?>

<link  href="assets/plugins/hightlight/styles/default.css" rel="stylesheet" type="text/css">
<link  href="assets/plugins/hightlight/styles/darcula.css" rel="stylesheet" type="text/css">
<script src="assets/plugins/hightlight/highlight.js"></script>

<!-- /.site-sidebar -->
<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="row page-title clearfix">
        <div class="page-title-left">
            <h6 class="page-title-heading mr-0 mr-r-5"><?php echo(lang("TableDetail_Title"));?></h6>
            <p class="page-title-description mr-0 d-none d-md-inline-block"><?php echo(lang("TableDetail_Helper"));?></p>
        </div>
        <!-- /.page-title-left -->
        <div class="page-title-right d-none d-sm-inline-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><?php echo(lang("TableDetail_Title"));?></li>
            </ol>
        </div>
        <!-- /.page-title-right -->
    </div>
    <!-- /.page-title -->
    <!-- =================================== -->
    <!-- Different data widgets ============ -->
    <!-- =================================== -->
    <div class="widget-list">
        <div class="row">
            <div class="widget-holder col-md-12">
                <div class="widget-bg">
                    <div class="widget-heading widget-heading-border">
                        <div class="row" style="width: 100% !important">
                            <div class="col-sm-6">
                                <h5 class="widget-title" style="line-height: 45px;"><?php echo(lang("TableDetail_Title"));?></h5>
                            </div>
                            <div class="col-sm-6 text-right">
                                <a class="btn btn-success text-white" id="AddFormBTN">Add Form</a>
                                <a class="btn btn-primary text-white" id="EditFormBTN">Edit Form</a>
                                <a class="btn btn-dark text-white" id="FormControlBTN">Controller and Model</a>
                            </div>
                        </div>


                    </div>
                    <div class="widget-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="FullCheckBox"></th>
                                    <th><?php echo(lang("TableDetail_FieldName"));?></th>
                                    <th><?php echo(lang("TableDetail_FieldProcess"));?></th>
                                    <th><?php echo(lang("TableDetail_FieldType"));?></th>
                                    <th class="text-center"><?php echo(lang("TableDetail_FieldRequired"));?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($Liste as $row){?>
                                <tr>
                                    <td style="width: 15px; line-height: 45px;   "><input type="checkbox" class="ListeCheckbox" id="<?php echo( $row["Field"] );?>" data-name="<?php echo( $row["Field"] );?>" data-type="<?php echo( $row["Type"] );?>" data-extra="<?php echo( $row["Extra"] );?>"  ></td>
                                    <td class="name">
                                        <?php echo($row["Field"]);?>
                                        <div class="badge badge-success <?php if($row["Extra"] == "auto_increment" or $row["Type"] == "timestamp"){echo('badge-danger');}?> text-white Type">
                                            <?php if($row["Extra"] == "auto_increment"){echo('<i class="fa fa-key" aria-hidden="true"></i>');}?>
                                            <?php if($row["Type"] == "timestamp"){echo('<i class="fa fa-calendar-o" aria-hidden="true"></i>');}?>
                                            <?php echo($row["Type"]);?>
                                        </div>
                                    </td>
                                    <td>
                                        <select class="form-control input-sm SelectedBTN" id="SelectedBTN<?php echo( $row["Field"] );?>" data-name="<?php echo( $row["Field"] );?>">
                                            <option value="Input">Input</option>
                                            <option value="Select">Select</option>
                                            <option value="Textarea">Textarea</option>
                                            <option value="Checkbox">Checkbox</option>
                                            <option value="Radio">Radio</option>
                                        </select>
                                    </td>
                                    <td id="table_tr_<?php echo( $row["Field"] );?>">
                                        <select class="form-control input-sm">
                                            <option value="text">text</option>
                                            <option value="password">password</option>
                                            <option value="email">email</option>
                                            <option value="tel">tel</option>
                                            <option value="url">url</option>
                                            <option value="number">number</option>
                                            <option value="file">file</option>
                                        </select>
                                    </td>
                                    <td style="width: 150px; line-height: 45px; text-align: center"><input type="checkbox" id="FieldRequired<?php echo( $row["Field"] );?>" data-name="<?php echo( $row["Field"] );?>" ></td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.widget-body -->
                </div>
                <!-- /.widget-bg -->
            </div>
            <!-- /.widget-holder -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.widget-list -->
</main>

<script>
    $(document).ready(function(){
        
        $('#BootstrapFormCopyBTN').live('click',function () {

            var el = document.getElementById('BootstrapFormCopy');
            var range = document.createRange();
            range.selectNodeContents(el);
            var sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
            document.execCommand('copy');

        });

        $('#JqueryFormCopyBTN').live('click',function () {

            var el = document.getElementById('JqueryFormCopy');
            var range = document.createRange();
            range.selectNodeContents(el);
            var sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
            document.execCommand('copy');

        });

        $('#ControllerFormCopyBTN').live('click',function () {

            var el = document.getElementById('ControllerFormCopy');
            var range = document.createRange();
            range.selectNodeContents(el);
            var sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
            document.execCommand('copy');

        });

        $('#ModelFormCopyBTN').live('click',function () {

            var el = document.getElementById('ModelFormCopy');
            var range = document.createRange();
            range.selectNodeContents(el);
            var sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
            document.execCommand('copy');

        });

        $('#AddFormBTN').click(function () {

            $data = "";
            $x    = 0;

            $('.ListeCheckbox').each(function (i) {

                $check      = $(this).prop("checked");
                $name       = $(this).attr("data-name");
                $type       = $(this).attr("data-type");
                $extra      = $(this).attr("data-extra");

                $table      = '<?php echo($table);?>';
                $required   = $('#FieldRequired' + $name).prop("checked");

                if($check == true){
                    Field = $('#SelectedBTN' + $name + ' option:selected').val();
                    Type  = $('#table_tr_' + $name + ' select option:selected').val();

                    if( $x == 0){
                        $data = '{"name":"' + $name + '","ft":"' + $type + '","extra":"' + $extra + '","field":"' + Field + '","type":"' + Type + '","required":"' + $required + '"}';
                    }else{
                        $data = $data + ',{"name":"' + $name + '","ft":"' + $type + '","extra":"' + $extra + '","field":"' + Field + '","type":"' + Type + '","required":"' + $required + '"}';
                    }
                    $x++;
                }
            })

            $.ajax({
                type    : 'POST',
                url     : 'TableDetail/AddForm',
                data    : 'table=' + $table + '&data=[' + $data + ']',
                success : function (r) {
                    $('#exampleModalLabel').html('Bootstrap Add Form ve Jquery');
                    $('#exampleModal').modal('show');
                    $('#exampleModal .modal-body').html(r);
                    $('pre code').each(function(i, block) {
                        hljs.highlightBlock(block);
                    });
                    $('pre code').each(function(i, block) {
                        hljs.highlightBlock(block);
                    });
                }
            })

        })

        $('#EditFormBTN').click(function () {

            $data = "";
            $x    = 0;

            $('.ListeCheckbox').each(function (i) {

                $check      = $(this).prop("checked");
                $name       = $(this).attr("data-name");
                $type       = $(this).attr("data-type");
                $extra      = $(this).attr("data-extra");

                $table      = '<?php echo($table);?>';
                $required   = $('#FieldRequired' + $name).prop("checked");

                if($check == true){
                    Field = $('#SelectedBTN' + $name + ' option:selected').val();
                    Type  = $('#table_tr_' + $name + ' select option:selected').val();

                    if( $x == 0){
                        $data = '{"name":"' + $name + '","ft":"' + $type + '","extra":"' + $extra + '","field":"' + Field + '","type":"' + Type + '","required":"' + $required + '"}';
                    }else{
                        $data = $data + ',{"name":"' + $name + '","ft":"' + $type + '","extra":"' + $extra + '","field":"' + Field + '","type":"' + Type + '","required":"' + $required + '"}';
                    }
                    $x++;
                }
            })

            $.ajax({
                type    : 'POST',
                url     : 'TableDetail/EditForm',
                data    : 'table=' + $table + '&data=[' + $data + ']',
                success : function (r) {
                    $('#exampleModalLabel').html('Bootstrap Edit Form ve Jquery');
                    $('#exampleModal').modal('show');
                    $('#exampleModal .modal-body').html(r);
                    $('pre code').each(function(i, block) {
                        hljs.highlightBlock(block);
                    });
                }
            })

        })

        $('#FormControlBTN').click(function () {

            $data = "";
            $x    = 0;

            $('.ListeCheckbox').each(function (i) {

                $check      = $(this).prop("checked");
                $name       = $(this).attr("data-name");
                $type       = $(this).attr("data-type");
                $extra      = $(this).attr("data-extra");

                $table      = '<?php echo($table);?>';
                $required   = $('#FieldRequired' + $name).prop("checked");

                if($check == true){
                    Field = $('#SelectedBTN' + $name + ' option:selected').val();
                    Type  = $('#table_tr_' + $name + ' select option:selected').val();

                    if( $x == 0){
                        $data = '{"name":"' + $name + '","ft":"' + $type + '","extra":"' + $extra + '","field":"' + Field + '","type":"' + Type + '","required":"' + $required + '"}';
                    }else{
                        $data = $data + ',{"name":"' + $name + '","ft":"' + $type + '","extra":"' + $extra + '","field":"' + Field + '","type":"' + Type + '","required":"' + $required + '"}';
                    }
                    $x++;
                }
            })

            $.ajax({
                type    : 'POST',
                url     : 'TableDetail/ControllerModel',
                data    : 'table=' + $table + '&data=[' + $data + ']',
                success : function (r) {
                    $('#exampleModalLabel').html('Codeigneter Controller and Model');
                    $('#exampleModal').modal('show');
                    $('#exampleModal .modal-body').html(r);
                    $('pre code').each(function(i, block) {
                        hljs.highlightBlock(block);
                    });
                }
            })

        })
        
        $('.FullCheckBox').click(function (r) {

            if($('.FullCheckBox').prop("checked") == false){
                $('.ListeCheckbox').prop('checked', false);
            }else{
                $('.ListeCheckbox').prop('checked', true);
            }
        })

        $('.SelectedBTN').change(function(){
            id  = $(this).attr('data-name');
            val = $("#SelectedBTN" + id + " option:selected").val();
            $.ajax({
                type	: 'POST',
                url		: 'TableDetail/FieldType',
                data    : 'id=' + id + '&val=' + val,
                success : function(r){
                    $('#table_tr_' + id).html(r);
                }
            });
        });
    });
</script>
<style>
    .list-group li {
        position: relative;
    }
    .list-group li .col-sm-3{
        line-height: 40px;
    }
</style>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg " role="document" style="max-width: 90% !important ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bootstrap Form ve Jquery</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    code{
        word-wrap: break-word;
        height: 400px;
        overflow-wrap: break-word;
        padding: 15px !important;
    }
    .name{
        position: relative;  line-height: 40px;
    }
    .name .Type{
        position: absolute;
        right: 10px;
        top:18px;
        font-weight: normal;
    }
</style>

