<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 8/17/2018
 * Time: 10:01 PM
 */
?>
</head>

<body>

<section id="container" >
    <!--header start-->
    <header class="header fixed-top clearfix">
        <!--logo start-->
        <div class="brand">
            <a href="" class="logo">
                <img src="<?php echo base_url()?>application/views/images/admin/adminLogoGreen.png" alt="Rx MiMS Logo">
            </a>
            <!-- <div class="sidebar-toggle-box">
                <div class="fa fa-bars"></div>
            </div> -->
        </div>
        <!--logo end-->
    </header>
    <!--header end-->
    <aside>
        <div id="sidebar" class="nav-collapse">
            <!-- sidebar menu start-->
            <div class="leftside-navigation">
                <ul class="sidebar-menu" id="nav-accordion">
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-database"></i>
                            <span>General Data</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo site_url('Generic/getGenericListForAdmin')?>">
                                    <i class="fa fa-stethoscope"></i>
                                    <span>Generic</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Brand/getBrandListForAdmin')?>">
                                    <i class="fa fa-tag"></i>
                                    <span>Brand</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Manufacturer/getManufacturerListForAdmin')?>">
                                    <i class="fa fa-truck"></i>
                                    <span>Manufacturer</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('DosageForm/getDosageFormListForAdmin')?>">
                                    <i class="fa fa-industry"></i>
                                    <span>Dosage Form</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('Strength/getStrengthListForAdmin')?>">
                                    <i class="fa fa-heartbeat"></i>
                                    <span>Strength</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('PackSize/getPackSizeListForAdmin')?>">
                                    <i class="fa fa-thermometer-three-quarters"></i>
                                    <span>Pack Size</span>
                                </a>
                            </li>
                        </ul>
                    </li>
					<li>
						<a href="<?php echo site_url('Scroller/getScrollData')?>">
							<i class="fas fa-backward"></i>
							<span>Scroller</span>
						</a>
					</li>
					<li>
                        <a href="<?php echo site_url('Doctor/getDoctorListForAdmin')?>">
                            <i class="fa fa-user-md"></i>
                            <span>Doctor</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('Job/getJobListForAdmin')?>">
                            <i class="fa fa-laptop"></i>
                            <span>Job</span>
                        </a>
                    </li>
					<li>
						<a href="<?php echo site_url('News/getNewsListForAdmin')?>">
							<i class="fa fa-newspaper"></i>
							<span>News</span>
						</a>
					</li>
					<li>
						<a href="<?php echo site_url('Journal/getJournalListForAdmin')?>">
							<i class="fa fa-file-text"></i>
							<span>Journal</span>
						</a>
					</li>
					<li>
                        <a href="<?php echo site_url('Address/getAddressListForAdmin')?>">
                            <i class="fa fa-address-card"></i>
                            <span>Address</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-columns"></i>
                            <span>Advertisement</span>
                        </a>
                        <ul class="sub">
                            <li>
                                <a href="<?php echo site_url('Advertisement/getAdvertisementListForAdmin')?>">
                                    <i class="fa fa-th-list"></i>
                                    <span> Advertisement</span>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="<?php echo site_url('CategoryWiseAdvertisement/getAdvertisementListForAdmin')?>">
                                    <i class="fa fa-th-large"></i>
                                    <span>Category wise Advertisement</span>
                                </a>
                            </li> -->
                        </ul>
                    </li>
					<li>
						<a href="<?php echo site_url('SpecialReports/getSpecialReportsListForAdmin')?>">
							<i class="fa fa-file-text"></i>
							<span>Special Reports</span>
						</a>
					</li>
					<!-- <li>
						<a href="<?php echo site_url('MimsStudy/getMimsStudyListForAdmin')?>">
							<i class="fa fa-file-text"></i>
							<span>MiMS Learning</span>
						</a>
					</li>
					<li>
                        <a href="<?php echo site_url('InternationalHealth/getInternationalHealthListForAdmin')?>">
                            <i class="fa fa-globe"></i>
                            <span>Study Club</span>
                        </a>
                    </li> -->
                    <li>
                        <a href="<?php echo site_url('User/logout')?>">
                            <i class="fa  fa-power-off"></i>
                            <span>logout</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->
