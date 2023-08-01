

  <!-- Footer Start -->

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
                <a href="#">
                   
                    <img id="footerLogo" style="width:200px;" class="logo d-none d-lg-block" src="../frontend/images/logo/Gv2.png" alt="Rx MiMS Bangladesh">
                </a>
            </div>
    
            <div class="footer-links">
                <h4> Quick links </h4>
                <ul>
                    <li> <a href="{{ url('/') }}"> Home </a> </li>
                    <li> <a href="{{ route('web_page_about') }}"> About Us </a> </li>
                    <li> <a href="{{ route('web_page_privacy_policy') }}">Privacy Policy </a> </li>
    
                    <!-- <li> <a href="#"> Ebook </a> </li> -->
                </ul>
    
            </div>
    
    
    
            <div class="footer-links">
    
                <ul>
    
                    <li> <a href="{{ route('web_page_doctor') }}"> Doctor </a> </li>
                    <li> <a href="{{ route('web_get_herbal_list') }}"> Herbal </a> </li>
                    <li> <a href="{{ route('web_get_journal', ['category'=> 'Cardiovascular']) }}"> Journal </a> </li>
                    <li> <a href="{{ route('web_page_disclaimer') }}"> Disclaimer </a> </li>
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
                    <span>Visitors -</span><span style="color: #fff;" class="visitor-count">2,911,456</span>
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
                <p>ISSN: 2707-109X ©# - Pharmamedica</p>
            </div>
        </div>
    </footer>
    
    
    <script src="#"></script>
    
    <script>
        // frontendCommonMethods.incrementVisitorCount();
        // frontendCommonMethods.getNumberOfVisitor();
    
        // if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
        //     frontendCommonMethods.changeForMobileUI();
        // } else {
        //     frontendCommonMethods.changeForDesktopUI();
        // }
    </script>

    @stack('js-link')
    </body>
    
    </html>