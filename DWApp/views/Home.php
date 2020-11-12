<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Doğruweb
 * Date: 2.08.2018
 * Time: 00:28
 * File Name : TableDetail.php
 */
?>
<!-- /.site-sidebar -->
<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="row page-title clearfix">
        <div class="page-title-left">
            <h6 class="page-title-heading mr-0 mr-r-5"><?php echo(lang("TableSelect_Title"));?></h6>
            <p class="page-title-description mr-0 d-none d-md-inline-block"><?php echo(lang("TableSelect_Helper"));?></p>
        </div>
        <!-- /.page-title-left -->
        <div class="page-title-right d-none d-sm-inline-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><?php echo(lang("TableSelect_Title"));?></li>
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
                        <h5 class="widget-title"><?php echo(lang("TableSelect_Title"));?></h5>
                        <!-- /.widget-actions -->
                    </div>
                    <!-- /.widget-heading -->
                    <div class="widget-body">
                        <ul class="list-group">
                            <?php foreach ($Liste as $row){?>
                                <li class="list-group-item">
                                    <?php echo($row["Tables_in_" . $this->session->userdata('DBNAME')]);?>
                                    <div class="button">
                                            <a class="btn btn-info text-white" href="TableDetail/Detail/<?php echo($row["Tables_in_" . $this->session->userdata('DBNAME')]);?>"><?php echo(lang("DBSelect_BTN"));?></a>
                                    </div>
                                </li>
                            <?php }?>
                        </ul>
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
        $('.DBSelectBTN').click(function(){
            database = $(this).attr("data-dbname");
            $.ajax({
                type	: 'POST',
                url		: 'DBSelect/Select',
                data	: 'test=asdsad&dbname=' + database,
                success : function(r){
                    location.href = './';
                }
            });
        });
    });
</script>
<style>
    .list-group li {
        position: relative;
    }
    .list-group li .button{
        position: absolute;
        right: 2px;
        top:2px;
    }
</style>
