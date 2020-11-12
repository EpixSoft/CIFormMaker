<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Doğruweb Yazilim
 * Date: 1.08.2018
 * Time: 17:29
 * File Name : Header.php
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-collapse.png">
    <link rel="stylesheet" href="assets/css/pace.css">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DW Form Winzard</title>
    <base href="<?php echo($this->config->item("base_url"));?>">
    <!-- CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600%7CRoboto:400" rel="stylesheet" type="text/css">
    <link href="assets/fonts/meterial/material-icons.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/monosociali/monosocialiconsfont.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/feather/feather.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/jquery-migrate-1.4.1.js"></script>
    <!-- Head Libs -->
    <script src="assets/js/modernizr.min.js"></script>
    <script data-pace-options='{ "ajax": false, "selectors": [ "img" ]}' src="assets/js/pace.min.js"></script>
</head>

<body class="sidebar-horizontal">
<div id="wrapper" class="wrapper">
    <!-- HEADER & TOP NAVIGATION -->
    <nav class="navbar">
        <!-- Logo Area -->
        <div class="navbar-header">
            <a href="./" class="navbar-brand">
                <img class="logo-expand" alt="" src="assets/images/logo-dark.png">
                <img class="logo-collapse" alt="" src="assets/images/logo-collapse.png">
                <!-- <p>BonVue</p> -->
            </a>
        </div>
        <!-- /.navbar-search -->
        <div class="spacer"></div>
        <!-- Right Menu -->
        <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">

            <li>
                <?php if( @$this->session->userdata('DBNAME') != "" ){ ?>
                <a href="DBSelect" class="btn btn-success" style="margin-right: 15px !important; ">
                    <?php echo( $this->session->userdata('DBNAME') );?> - <?php echo( lang("DBChange_BTN") );?>
                </a>
                <?php }?>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
    <div class="content-wrapper">

