<?php
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:34 PM
 */
?>
<section class="header">
    <div class="container">
        <div class="logo float-left">
            <a href="<?php echo site_url();?>"><img src="<?php echo base_url().'application/views/';?>img/logo.png" alt="logo" class="img-fluid"></a>
        </div>
        <div class="sign-in float-right">
            <ul class="list-inline">
                <li class="list-inline-item"><i class="fas fa-map-marker-alt"></i> <a href="#">Bangladesh</a></li>
                <li class="list-inline-item"><i class="fas fa-user"></i> <a href="#">Sign In</a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="menu">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul id="main-menu" class="navbar-nav mr-auto">
                        <li id="main-menu-home" class="nav-item active">
                            <a class="nav-link" href="<?php echo site_url();?>">HOME <span class="sr-only">(current)</span></a>
                        </li>
                        <li id="main-menu-doctor" class="nav-item"><a class="nav-link" href="<?php echo site_url('Doctor/getAllDoctorInformation');?>">DOCTOR</a></li>
                        <li id="main-menu-resource" class="nav-item"><a class="nav-link" href="<?php echo site_url('Resource/getAllActiveResourceInformation');?>">RESOURCES</a></li>
                        <li id="main-menu-about-us" class="nav-item"><a class="nav-link" href="<?php echo site_url('StaticInfo/showAboutUs');?>">ABOUT US</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</section>
