<!-- /.site-sidebar -->
<main class="main-wrapper clearfix">
    <!-- Page Title Area -->
    <div class="row page-title clearfix">
        <div class="page-title-left">
            <h6 class="page-title-heading mr-0 mr-r-5"><?php echo(lang("DBSelect_Title"));?></h6>
            <p class="page-title-description mr-0 d-none d-md-inline-block"><?php echo(lang("DBSelect_Helper"));?></p>
        </div>
        <!-- /.page-title-left -->
        <div class="page-title-right d-none d-sm-inline-flex">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><?php echo(lang("DBSelect_Title"));?></li>
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
                        <h5 class="widget-title"><?php echo(lang("DBSelect_Title"));?></h5>
                    </div>
                    <!-- /.widget-heading -->
                    <div class="widget-body">
                        <ul class="list-group">
                            <?php foreach ($Liste as $row){
                                if( $row['Database'] != "mysql" and $row['Database'] != "information_schema" and  $row['Database'] != "test" and $row['Database'] != "performance_schema"){
                                ?>
                            <li class="list-group-item">
                                <?php echo($row['Database']);?>
                                <div class="button">
                                    <?php if( @$this->session->userdata('DBNAME') == $row['Database'] ){ ?>
                                        <a class="btn btn-success text-white"><?php echo(lang("DBSelected_BTN"));?></a>
                                    <?php } else{ ?>
                                        <a class="btn btn-info text-white DBSelectBTN" data-dbname="<?php echo($row['Database']);?>"><?php echo(lang("DBSelect_BTN"));?></a>
                                    <?php }?>
                                </div>
                            </li>
                            <?php }
                            }?>
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
