<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo isset($title) ? $title : 'MiMS'; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Medicine Detail, drug detail, brand detail">
    <meta name="keywords" content="<?php echo isset($keywords) ? $keywords : 'Bangladesh, Medicine, Herbal, Doctor, Jurnal, Ebook, Important address, Pharma job, Medical Job, Pharma news, RxMiMSbd, MiMS'; ?>">
    <meta name="author" content="amalesh.debnath@gmail.com">

    <link rel="icon" type="image/png" href="<?php echo base_url() . 'application/views/'; ?>images/fav.png">

    <meta property="og:type" content="website" />

    <meta property="og:url" content="https://www.rxmimsbd.com" />

    <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:400,600,700" rel="stylesheet"> -->
    <!------Font Awesome Css------>
    <!-- CDN -->
    <!-- stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300&display=swap" rel="stylesheet">

    <!-- scripts -->
    <script src="<?php echo base_url() . 'application/views/'; ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url() . 'application/views/'; ?>js/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script src="<?php echo base_url() . 'application/views/'; ?>js/common-script.js?ver=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url() . 'application/views/'; ?>js/popup-script.js?ver=<?php echo time(); ?>"></script>
    <script src="<?php echo base_url() . 'application/views/'; ?>js/ajax-call.js?ver=<?php echo time(); ?>"></script>

    <!------Main Css------>
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/imageviewer.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/fonts/fonts.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/base.css?ver=<?php echo time(); ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>application/views/css/marquee.css">


    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-169020184-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-169020184-1');
    </script>
</head>

<body>


    <style>




@media only screen and (max-width: 500px) {


    ul.navbar-nav.mt-2.mt-lg-0.main-menu.mr-auto.ml-auto {
    background: #091C2E;
    z-index: 9999 !important;
    position: absolute;
    width: 100%;
    padding-left: -3px;
    left: 0;
    padding-left: 20px;
}
    .lockal {
      font-family: 'Bahnschrift Regular', sans-serif;
      height: 100px;
      position: relative;

      border: 1px solid #e4e4e4;
      padding: 15px 0;
      border-radius: 3px;
      margin-bottom: 10px;
      display: flex;
      width: 100%;
      margin: 20px 10px;
      /* padding: 30px 0px !important; */
      padding: 10px;
      height: 120px;
      border-radius: 20px;
      box-shadow: rgb(100 100 111 / 20%) 0px 7px 29px 0px;
      justify-content: center;
      align-items: center;
      align-content: center;
      margin-top: 0px;
    }


    .search-wrapper {
      display: flex;
      flex-direction: column;
      position: relative;
      top: 20px !important;
      /* width: 800px; */
      width: 90%;
      margin-top: 19px !important;
      margin: auto !important;
      margin-bottom: 35px !important;
    }

    ul.search-tabs.group li a {
      font-size: 10px;
    }

    section.anitext {
      text-align: center;
      width: 90% !important;
      margin: auto;
    }

    img.logo.d-lg-none {
      width: 199px !important;
    }

    .marquee-sibling {
      font-size: 12px !important;
    }

    .waviy {
      margin: auto;
      width: 100%;
      padding-bottom: 20px;
    }

    .waviy span {
      font-size: 12px !important;
    }

    .section-col h4 {
    font-size: var(--font-size-regular);
    color: var(--title-color);
    font-family: var(--font-bold);
    text-transform: uppercase;
    margin-bottom: 16px;
    position: relative !important;
    font-size: 10px;
    text-align: center;
}

img#footerLogo {
    margin: 28px 0px;
    width: 215px !important;
    margin-top: 0px;
}

span.visitor-count {
    display: none !important;
}

.home-special-report-slider-wrapper.content-section {
    margin: 0 !important;
    width: 95% !important;
}

button.slick-next.slick-arrow {
    display: none !important;
}

div#durandar {
    margin: 20px 0px !important;
    /* padding: 30px 0px; */
}

div#my_tub .home-special-report-slider-wrapper.content-section {
    width: 100% !important;
}

div#durandar .home-special-report-slider-wrapper.content-section {
    width: 100% !important;
}

div#durandar .home-special-report-slider-wrapper.content-section {
    padding: 20px 0px !important;
}

div#durandar .home-special-report-slider-wrapper.content-section img.mratime {
    margin-bottom: 20px !important;
}


  }

        nav.navbar.navbar-expand-lg.navbar-light.home-top-nav a {
            font-family: 'Rubik', sans-serif;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 300 !important;

        }

        .container22 {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
            align-content: center;
            height: 100% !important;
            padding-left: 60px !important;
        }

        .dropdown-menu {
            background: #34495E;
        }

        .dropdown-menu a.dropdown-item {
            padding: 5px 5px !important;
        }

        .container22 .container.d-flex.navbar-container.main-menu-top-bar {
            margin: 0;
            padding: 0;
        }

        .container22 ul.navbar-nav.mt-2.mt-lg-0.main-menu.mr-auto.ml-auto {
            margin-right: 0px !important;
            margin-right: 0px !important;
            display: flex;
            align-items: center;
            justify-content: center;
            align-content: center;
        }

        .container2222.d-flex.navbar-container.main-menu-top-bar {
            width: 100%;
            padding-right: 60px;
        }

        ul.navbar-nav.mt-2.mt-lg-0.main-menu.mr-auto.ml-auto li a {

            color: rgba(255, 255, 255, .8) !important;
        }

        .dropdown-menu {
            display: none;
        }


        .umesh {
            position: relative;
        }

        .umesh:hover .dropdown-menu {
            display: block !important;

        }



        li#mainMenuResource .dropdown-menu.mims-dropdown-menu a.dropdown-item {
            margin: 0 !important;
            padding-left: 10px !important;
        }

        .umesh .dropdown-menu.mims-dropdown-menu a {
            margin: 0px 5px !important;
        }


        .dropdown-menu.mims-dropdown-menu {
            padding-top: 15px;
            margin-top: 0px;
            border-top: none !important;
            left: 15px;
        }



        .raju {
            display: none;
        }

        .mehra:hover .raju {
            display: block !important;
        }

        a#navbarDropdownEbook {
            border: none;
        }


        .dropdown-menu.mims-dropdown-menu a.dropdown-item.nav-link.mims-nav-link {
            margin-left: 0px !important;
        }


        .rgmk:hover div#muj {
            display: block !important;
        }


        a.nav-link.text-success.mims-nav-link-cta-secondary {
            color: white !important;
            margin: 0px 10px !important;
            background: #02A44F !important;
            border-radius: 5px;
        }



        span.visitor-count {
            position: absolute;
            right: 80px;
            top: 40px;
        }

        footer {
            position: relative;
        }

        div#bihari {
            position: relative;
        }

        .section-col h4::after {
            content: "";
            background: #33495E;
            width: 40%;
            height: 8px;
            position: absolute;
            left: 0;
            top: -15px;
        }


        .section-col h4 {
            font-size: var(--font-size-regular);
            color: var(--title-color);
            font-family: var(--font-bold);
            text-transform: uppercase;
            margin-bottom: 16px;
            position: relative !important;


        }


        @media only screen and (max-width: 500px) {
            .container22 {
                display: block !important;
                justify-content: unset;
                width: 100%;
                align-items: center;
                align-content: center;
                height: 100% !important;
                padding-left: 0px !important;
            }

            .container22 ul.navbar-nav.mt-2.mt-lg-0.main-menu.mr-auto.ml-auto {
                margin-right: 0px !important;
                margin-right: 0px !important;
                display: block;
                align-items: unset;
                justify-content: center;
                align-content: center;
            }

            .marquee-sibling {
                padding: 0;
                background: #009b3e;
                width: 35% !important;
                height: 45px;
                line-height: 42px;
                font-size: 12px;
                font-weight: normal;
                color: #ffffff;
                text-align: center;
                float: left;
                left: 0;
                z-index: 2000;
                font-size: 14px;
                font-weight: bold;
            }
        }
    </style>
    <script language="JavaScript">
        /**
         * Disable right-click of mouse, F12 key, and save key combinations on page
         * By Arthur Gareginyan (arthurgareginyan@gmail.com)
         * For full source code, visit https://mycyberuniverse.com
         */
        window.onload = function() {
            document.addEventListener("contextmenu", function(e) {
                e.preventDefault();
            }, false);
            document.addEventListener("keydown", function(e) {
                //document.onkeydown = function(e) {
                // "I" key
                if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                    disabledEvent(e);
                }
                // "J" key
                if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                    disabledEvent(e);
                }
                // "S" key + macOS
                if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                    disabledEvent(e);
                }
                // "U" key
                if (e.ctrlKey && e.keyCode == 85) {
                    disabledEvent(e);
                }
                // "F12" key
                if (event.keyCode == 123) {
                    disabledEvent(e);
                }
            }, false);

            function disabledEvent(e) {
                if (e.stopPropagation) {
                    e.stopPropagation();
                } else if (window.event) {
                    window.event.cancelBubble = true;
                }
                e.preventDefault();
                return false;
            }
        };
    </script>
    <nav class="navbar navbar-expand-lg navbar-light home-top-nav">
        <div class="container22">
            <button class="navbar-toggler menu-btn no-outline" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation" id="navbarMenuButton">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand mr-md-auto" href="<?php echo site_url() ?>">
                <img class="logo d-lg-none" src="<?php echo base_url() . 'application/views/'; ?>images/logo/logo-mobile.svg" alt="Rx MiMS Bangladesh">
                <!-- <img class="logo d-none d-lg-block" src="<?php //echo base_url().'application/views/';
                                                                ?>images/logo/logo-desktop.svg" alt="Rx MiMS Bangladesh"> -->
                <img style="width:180px;" class="logo d-none d-lg-block" src="<?php echo base_url() . 'application/views/'; ?>images/logo/Gv2.png" alt="Rx MiMS Bangladesh">
            </a>
            <button class="navbar-toggler menu-btn no-outline" type="button" data-toggle="collapse" data-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle navigation" id="navbarSearchButton">
                <i class="fas fa-search"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarMenu">
                <div class="container2222 d-flex navbar-container main-menu-top-bar">
                    <ul class="navbar-nav mt-2 mt-lg-0 main-menu mr-auto ml-auto">
                        <li id="mainMenuHome" class="nav-item">
                            <a class="nav-link mims-nav-link home-link mims-main-menu" href="<?php echo site_url(); ?>">Home</a>
                        </li>
                        <li id="mainMenuDoctor" class="nav-item">
                            <a class="nav-link mims-nav-link doctor-link mims-main-menu" href="<?php echo site_url('Doctor/getAllDoctorInformation'); ?>">Doctor</a>
                        </li>
                        <li id="mainMenuHerbal" class="nav-item">
                            <a class="nav-link mims-nav-link herbal-link mims-main-menu" href="<?php echo site_url('Herbal/showHerbalList'); ?>">Herbal</a>
                        </li>
                        <li class="nav-item umesh" id="mainMenuResource">
                            <a class="nav-link mims-nav-link resource-link mims-main-menu" href="#" id="navbarDropdownResource" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Journal
                                <i class="icon-dropdown"></i>
                            </a>
                            <div class="dropdown-menu mims-dropdown-menu" aria-labelledby="navbarDropdownResource" style="min-width: 15rem">
                                <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('Journal/getAllActiveJournalInformation?JournalCategoryID=1'); ?>">Cardiovascular</a>
                                <a class="dropdown-item nav-link mims-nav-link" href="https://www.dental-practice.biz/emagazine/dpbangladesh1-2/">Dental</a>
                                <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('Journal/getAllActiveJournalInformation?JournalCategoryID=5'); ?>">Library</a>
                                <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('Journal/getAllActiveJournalInformation?JournalCategoryID=2'); ?>">Research Method</a>
                                <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('Journal/getAllActiveJournalInformation?JournalCategoryID=3'); ?>">Resource</a>
                                <div class="dropdown-divider"></div>



                                <div class="rgmk">

                                    <!-- <a class="nav-link mims-nav-link ebook-link mims-main-menu umesh" href="#" id="navbarDropdownEbook" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Archived EBook
                                        <i class="icon-dropdown"></i>
                                    </a>
                                    <div class=" raju" id="muj" aria-labelledby="navbarDropdownResource">
                                        <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('EBooks/showEBook?ID=1'); ?>">RxMiMS<sup>TM</sup> Natural Medicine (Issue 01/2019)</a>
                                        <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('EBooks/showEBook?ID=2'); ?>">RxMiMS<sup>TM</sup> Bangladesh (Issue 02/2018)</a>
                                        <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('EBooks/showEBook?ID=3'); ?>">RxMiMS<sup>TM</sup> Natural Medicine (Issue 02/2019)</a>
                                        <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('EBooks/showEBook?ID=4'); ?>">RxMiMS<sup>TM</sup> Bangladesh (Issue 02/2019)</a>
                                    </div> -->

                                </div>
                                <!--						<div class="dropdown-menu mims-dropdown-menu" aria-labelledby="navbarDropdownResource">-->
                                <!--							<a class="nav-link mims-nav-link ebook-link mims-main-menu" href="#" id="navbarDropdownEbook" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                <!--								RxMiMS<sup>TM</sup> Natural Medicine-->
                                <!--								<i class="icon-dropdown"></i>-->
                                <!--							</a>-->
                                <!--							<div class="dropdown-menu mims-dropdown-menu" aria-labelledby="navbarDropdownResource">-->
                                <!--								<a class="dropdown-item nav-link mims-nav-link" href="--><?php //echo site_url('EBooks/showEBook?ID=1');
                                                                                                                                ?>
                                <!--">Issue 2019</a>-->
                                <!--								<a class="dropdown-item nav-link mims-nav-link" href="--><?php //echo site_url('EBooks/showEBook?ID=3');
                                                                                                                                ?>
                                <!--">Issue 2020</a>-->
                                <!--							</div>-->
                                <!--							<a class="nav-link mims-nav-link ebook-link mims-main-menu" href="#" id="navbarDropdownEbook" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                                <!--								RxMiMS<sup>TM</sup> Bangladesh-->
                                <!--								<i class="icon-dropdown"></i>-->
                                <!--							</a>-->
                                <!--							<div class="dropdown-menu mims-dropdown-menu" aria-labelledby="navbarDropdownResource">-->
                                <!--								<a class="dropdown-item nav-link mims-nav-link" href="--><?php //echo site_url('EBooks/showEBook?ID=2');
                                                                                                                                ?>
                                <!--">Issue 2019</a>-->
                                <!--								<a class="dropdown-item nav-link mims-nav-link" href="--><?php //echo site_url('EBooks/showEBook?ID=4');
                                                                                                                                ?>
                                <!--">Issue 2020</a>-->
                                <!--							</div>-->
                                <!--						</div>-->
                            </div>
                        </li>
                        <!-- <li class="nav-item umesh" id="mainMenuEbook">
                            <a class="nav-link mims-nav-link ebook-link mims-main-menu" href="#" id="navbarDropdownEbook" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Ebook
                                <i class="icon-dropdown"></i>
                            </a>
                            <div class="dropdown-menu mims-dropdown-menu" aria-labelledby="navbarDropdownEbook">
                                <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('EBooks/showEBook?ID=5'); ?>">RxMiMS<sup>TM</sup> Natural Medicine</a>
                                <a class="dropdown-item nav-link mims-nav-link" href="<?php echo site_url('EBooks/showEBook?ID=6'); ?>">RxMiMS<sup>TM</sup> Bangladesh</a>
                            </div>
                        </li> -->
                        <li class="nav-item umesh" id="mainMenuAbout">
                            <a class="nav-link mims-nav-link about-link mims-main-menu" href="#" id="navbarDropdownAbout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                About Us
                                <i class="icon-dropdown"></i>
                            </a>
                            <div class="dropdown-menu mims-dropdown-menu" aria-labelledby="navbarDropdownAbout">
                                <a class="dropdown-item nav-link mims-nav-link about-link" href="<?php echo site_url('StaticInfo/showAboutUs'); ?>">About Us</a>
                                <a class="dropdown-item nav-link mims-nav-link about-link" href="<?php echo site_url('StaticInfo/showDisclaimer'); ?>">Disclaimer</a>


                                <a class="dropdown-item nav-link mims-nav-link about-link" href="https://mimsbangladesh.com/index.php/StaticInfo/showprivacy">Privacy Policy</a>

                            </div>
                        </li>


                    </ul>
                    <!-- <div class="left-links">
                <a href="https://www.facebook.com/rxmimsbd" class="side-link" target="_blank"><i class="fab fa-facebook-square"></i></a>
                <a href="https://twitter.com/rxmims" class="side-link" target="_blank"><i class="fab fa-twitter-square"></i></a>
            </div> -->

                    <div class="form-inline my-2 my-lg-0 d-flex flex-row-reverse flex-lg-row justify-content-end" id="user-login-status">
                        <?php
                        if (isset($UserDetail['ID'])) {
                            echo '<a class="btn btn-success my-2 my-sm-0 mims-nav-link-cta-primary" href="' . site_url('User/showUserProfile') . '">' . $UserDetail['UserName'] . '</a>
                            
                            
                            
                            <a class="btn btn-success my-2 my-sm-0 mims-nav-link-cta-primary" href="' . site_url('User/userLogout') . '">Logout</a>';
                        } else {
                            echo '<a href="#" class="btn btn-success my-2 my-sm-0 mims-nav-link-cta-primary" style="
                            margin: 0px 10px !important;
                        "  onclick="UserObject.showLoginModal()">Login</a>
                            
                            
                            
                            <a href="' . site_url('User/signUp') . '" class="btn btn-success my-2 my-sm-0 mims-nav-link-cta-primary">Register</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSearch">
                <div class="navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" id="searchOptionInMobile">
                        <div class="input-group-append">
                            <button class="btn theme-btn" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    <div class="search-category-radio">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="brand" name="search-category" value="brand" class="custom-control-input" checked="checked" onclick="drugObject.changeSearchOption('brand')">
                            <label class="custom-control-label" for="brand">Brand</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="generic" name="search-category" value="generic" class="custom-control-input" onclick="drugObject.changeSearchOption('generic')">
                            <label class="custom-control-label" for="generic">Generic</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="indication" name="search-category" value="indication" class="custom-control-input" onclick="drugObject.changeSearchOption('indication')">
                            <label class="custom-control-label" for="indication">Indication</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="manufacture" name="search-category" value="manufacture" class="custom-control-input" onclick="drugObject.changeSearchOption('manufacturer')">
                            <label class="custom-control-label" for="manufacture">Manufacturer</label>
                        </div>
                        <p class="alphabets nav-aldphabets">
                            <a onclick="drugObject.searchAlphabetically('a')" class="alphabet-link">A</a>
                            <a onclick="drugObject.searchAlphabetically('b')" class="alphabet-link">B</a>
                            <a onclick="drugObject.searchAlphabetically('c')" class="alphabet-link">C</a>
                            <a onclick="drugObject.searchAlphabetically('d')" class="alphabet-link">D</a>
                            <a onclick="drugObject.searchAlphabetically('e')" class="alphabet-link">E</a>
                            <a onclick="drugObject.searchAlphabetically('f')" class="alphabet-link">F</a>
                            <a onclick="drugObject.searchAlphabetically('g')" class="alphabet-link">G</a>
                            <a onclick="drugObject.searchAlphabetically('h')" class="alphabet-link">H</a>
                            <a onclick="drugObject.searchAlphabetically('i')" class="alphabet-link">I</a>
                            <a onclick="drugObject.searchAlphabetically('j')" class="alphabet-link">J</a>
                            <a onclick="drugObject.searchAlphabetically('k')" class="alphabet-link">K</a>
                            <a onclick="drugObject.searchAlphabetically('l')" class="alphabet-link">L</a>
                            <a onclick="drugObject.searchAlphabetically('m')" class="alphabet-link">M</a>
                            <a onclick="drugObject.searchAlphabetically('n')" class="alphabet-link">N</a>
                            <a onclick="drugObject.searchAlphabetically('o')" class="alphabet-link">O</a>
                            <a onclick="drugObject.searchAlphabetically('p')" class="alphabet-link">P</a>
                            <a onclick="drugObject.searchAlphabetically('q')" class="alphabet-link">Q</a>
                            <a onclick="drugObject.searchAlphabetically('r')" class="alphabet-link">R</a>
                            <a onclick="drugObject.searchAlphabetically('s')" class="alphabet-link">S</a>
                            <a onclick="drugObject.searchAlphabetically('t')" class="alphabet-link">T</a>
                            <a onclick="drugObject.searchAlphabetically('u')" class="alphabet-link">U</a>
                            <a onclick="drugObject.searchAlphabetically('v')" class="alphabet-link">V</a>
                            <a onclick="drugObject.searchAlphabetically('w')" class="alphabet-link">W</a>
                            <a onclick="drugObject.searchAlphabetically('x')" class="alphabet-link">X</a>
                            <a onclick="drugObject.searchAlphabetically('y')" class="alphabet-link">Y</a>
                            <a onclick="drugObject.searchAlphabetically('z')" class="alphabet-link">Z</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '295945388066507',
                status: true,
                cookie: true,
                xfbml: true
            });
        };
        (function() {
            var e = document.createElement('script');
            e.async = true;
            e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js';
            document.getElementById('fb-root').appendChild(e);
        }());
    </script>
    <!--<div id="fb-root"></div>-->
    <!--<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v7.0&appId=295945388066507&autoLogAppEvents=1"></script>-->