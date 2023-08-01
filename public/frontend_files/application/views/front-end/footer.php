<?php

/**
 * Created by PhpStorm.
 * User: Amalesh
 * Date: 7/17/2018
 * Time: 12:31 PM
 */
?>


<style>
span.visitor-count {
    background: #009B3E;
    display: inline-block;
    padding: 10px 10px;
    border-radius: 5px;
    cursor: pointer;
    font-weight: 500;
    /* font-size: 14px; */
    font-size: 16px;
    width: 130px !important;
    text-align: left !important;
}



    .footer-hotline {
        text-align: left;
    }



    .footer-hotline a {
        display: block;
        margin: 5px 0px;
    }

    .footer-logo.logo-middle.quote .socail-links {
        margin-top: 10px;
    }
</style>
<!-- footer -->
<footer>
    <div class="container d-flex justify-content-between footer-wrapper">
        <div class="footer-logo logo-middle">
            <a href="<?php echo site_url() ?>">
                <!-- <img id="footerLogo" src="<?php //echo base_url().'application/views/';
                                                ?>images/white-logo.png" alt=""> -->
                <img id="footerLogo" style="width:200px;" class="logo d-none d-lg-block" src="<?php echo base_url() . 'application/views/'; ?>images/logo/Gv2.png" alt="Rx MiMS Bangladesh">
            </a>
        </div>

        <div class="footer-links">
            <h4> Quick links </h4>
            <ul>
                <li> <a href="<?= site_url('') ?>"> Home </a> </li>
                <li> <a href="<?= site_url('StaticInfo/showAboutUs') ?>"> About Us </a> </li>
                <li> <a href="<?= site_url('StaticInfo/showprivacy') ?>">Privacy Policy </a> </li>

                <!-- <li> <a href="#"> Ebook </a> </li> -->
            </ul>

        </div>



        <div class="footer-links">

            <ul>

                <li> <a href="<?= site_url('Doctor/getAllDoctorInformation') ?>"> Doctor </a> </li>
                <li> <a href="<?= site_url('Herbal/showHerbalList') ?>"> Herbal </a> </li>
                <li> <a href="<?= site_url('Journal/getAllActiveJournalInformation?JournalCategoryID=1') ?>"> Journal </a> </li>
                <li> <a href="<?= site_url('StaticInfo/showDisclaimer') ?>"> Disclaimer </a> </li>
                <!-- <li> <a href="#"> Ebook </a> </li> -->
            </ul>

        </div>


        <div class="footer-hotline">
            <h4> Contact Us </h4>
            <a class="hotline-number" href="tel:+880-1617776467"><i class="ico-phone"></i>+880-161777(MIMS)6467</a>
            <a class="hotline-number" href="tel:+880-1309990637"><i class="ico-phone"></i>+880-1309990637</a>
            <a class="hotline-email" href="mailto:rxmimsbd@gmail.com"><i class="icon-email"></i>info@mimsbangladesh.com</a>


            <!--<div class="left-links">-->
            <!--    <a href="https://www.facebook.com/rxmimsbd" class="side-link" target="_blank"><i class="fab fa-facebook-square"></i></a>-->
            <!--    <a href="https://twitter.com/rxmims" class="side-link" target="_blank"><i class="fab fa-twitter-square"></i></a>-->
            <!--</div>-->
        </div>
        <style>
            .visitor1 {
                /* display: flex;
    justify-content: space-between;
    width: 200px; */
            }
        </style>
        <div class="footer-logo logo-middle quote">
            <div class="visitor1">
                <span>Visitors -</span><span style="color: #fff;" class="visitor-count"></span>
            </div>
            <div class="socail-links">
                <ul>
                    <li> <a href="https://www.facebook.com/rxmimsbd" class="side-link" target="_blank"><i class="fa-brands fa-facebook-f"></i> </a> </li>
                    <li> <a href="https://twitter.com/rxmims" class="side-link" target="_blank"><i class="fab fa-twitter"></i></a> </li>
                    <li> <a href="#" target="_blank"> <i class="fa-brands fa-youtube"></i> </a> </li>
                    <li> <a href="#" target="_blank"> <i class="fa-brands fa-instagram"></i> </a> </li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class="copy-right-bottom">
        <div class="container justify-content-between align-items-center">
            <p>ISSN: 2707-109X © <?= date('Y') ?> - Pharmamedica</p>
        </div>
    </div>
</footer>


<script src="<?php echo base_url() . 'application/views/js/imageviewer.min.js'; ?>"></script>
<!-- <script src="<?php echo base_url() . 'application/views/js/ui.js'; ?>"></script> -->
<script>
    frontendCommonMethods.incrementVisitorCount();
    frontendCommonMethods.getNumberOfVisitor();

    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        frontendCommonMethods.changeForMobileUI();
    } else {
        frontendCommonMethods.changeForDesktopUI();
    }
</script>
</body>

</html>