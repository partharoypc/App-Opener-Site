<?php
require_once("app/init/init.php");

try {
    $subdomain = isset($_REQUEST['subdomain']) ? $_REQUEST['subdomain'] : "";
    $prefix = isset($_REQUEST['prefix']) ? $_REQUEST['prefix'] : "";
    $link = false;
    if (empty($subdomain) && empty($prefix)) {
        //only domain
        //echo "Only domain";


    } else if (!empty($subdomain) && empty($prefix)) {
        //only subdomain
        //echo "Only subdomain";


    } else if (empty($subdomain) && !empty($prefix)) {
        //only prefix
        //echo "Only prefix";
        $stmt = $dbo->prepare("SELECT * FROM link WHERE ref='$prefix' LIMIT 1");
    } else if (!empty($subdomain) && !empty($prefix)) {
        //subdomain and prefix
        $stmt = $dbo->prepare("SELECT * FROM link WHERE subdomain='$subdomain' AND ref='$prefix' LIMIT 1");
    }


    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            //link found
            $link = (object) $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($link->id)){

                $stmt = $dbo->prepare("INSERT INTO views (linkId, userId) VALUE ('$link->id', $link->userId) ");
                try {
                    $stmt->execute();
                }catch (Exception $e){
                }
            }
        }
    }
}catch (Exception $e){
    echo $e->getMessage();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta property="og:url" content="<?php echo $link->nLink ?>" />
    <meta property="og:type" content="article" />

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/slick/slick.css">
    <link rel="stylesheet" href="/slick/slick.min.js">

    <?php
    if (empty($link->metaTitle)) {
        ?>
        <meta property="og:title" content="Yt Master " />
        <?php
    } else {
        ?>
        <meta property="og:title" content="<?php echo $link->metaTitle ?>" />
        <?php
    }

    ?>


    <?php
    if (empty($link->metaDesc)) {
        ?>
        <meta property="og:description" content="Yt Master " />
        <?php
    } else {
        ?>
        <meta property="og:description" content="<?php echo $link->metaDesc ?>" />
        <?php
    }

    ?>



    <?php
    if (empty($link->metaImg)) {
        ?>
        <meta property="og:image" content="Yt Master " />
        <?php
    } else {
        ?>
        <meta property="og:image" content="<?php echo $link->metaImg ?>" />
        <?php
    }

    ?>

    <title>Link Share</title>
</head>

<body>
<div class="container">
    <!-- <div class="header">
        <div class="logo">
            <a href="./">Views  <span style="color: black;">Grow</span></a>
        </div>
        <div class="inner-div">
            <div>
                <a href="./Terms-of-Service.html">
                    FAQs
                </a>
            </div>
            <div class="login-btn">
                <a style=" color: white;" href="./">
                    login
                </a>
            </div>

        </div>

    </div> -->
    <div class="main-body">
    <div class="heading">
                <p>Open Links Directly <br> <span style="display: flex; justify-content: center;">In&nbsp;<img style="padding-left: 10px; padding-right: 10px;"  width="20%" src="./img/youtube-logo.png"> Apps</span> <span style="color: #12a4d9; font-size: 14px;" >By Views Grow App</span></p>
            </div>
            <a href="https://play.google.com/store/apps/details?id=com.sikderithub.viewsgrow">
                <div class="">
                    <img width="100%" src="./img/install-app.JPEG" alt="" srcset="">
                    
                </div>
            </a>

            <style>
                .slider-container {
                    margin-top: 20px;
                    margin-bottom: 40px;
                }
            </style>

            <div class="poster-section-link">
                <h2 class="link-hedline">Create Link by Channel Category</h2>

                <div class="all-link">
                    <form>
                        <fieldset>
                          <legend class="link-hedline-2">Available Domain For You</legend>
                          <div class="link">
                            <input type="checkbox" checked="checked" id="clicked-box" name="interest" value="coding" />
                            <label for="coding"> <span class="sublink-1">newvideo.link</span>/<span class="sublink-2">z1DKCtu45C</span></label>
                          </div>
                          <div class="link2">
                            <input type="checkbox" id="unclicked-box" disabled="disabled" name="interest" value="coding" />
                            <label for="coding"> <span class="sublink-1">myvlog.video</span>/<span class="sublink-2">z1DKCtu45C</span></label>
                          </div>
                          <div class="link2">
                            <input type="checkbox" id="unclicked-box" disabled="disabled" name="interest" value="coding" />
                            <label for="coding"> <span class="sublink-1">myroast.video</span>/<span class="sublink-2">z1DKCtu45C</span></label>
                          </div>
                          <div class="link2">
                            <input type="checkbox" id="unclicked-box" disabled="disabled" name="interest" value="coding" />
                            <label for="coding"> <span class="sublink-1">myprank.video</span>/<span class="sublink-2">z1DKCtu45C</span></label>
                          </div>
                          <div class="link2">
                            <input type="checkbox" id="unclicked-box" disabled="disabled" name="interest" value="coding" />
                            <label for="coding"> <span class="sublink-1">mycooking.video</span>/<span class="sublink-2">z1DKCtu45C</span></label>
                          </div>

                          <div class="link2">
                            <input type="checkbox" id="unclicked-box" disabled="disabled" name="interest" value="coding" />
                            <label for="coding"> <span class="sublink-1">mytech.video</span>/<span class="sublink-2">z1DKCtu45C</span></label>
                          </div>

                        </fieldset>
                    </form>
                </div>

                <div>
                    <a href="https://play.google.com/store/apps/details?id=com.sikderithub.viewsgrow">
                        <Button class="publish-btn">Publish Your Link</Button>
                    </a>
                    
                </div>

            </div>


            <!-- <div class="poster-section">
                <h2 style="font-weight: 500; font-size: 20px;">What's <span style="color: #12a4d9;"> Views </span>Grow ?</h2>
                    <div>
                        <a href="https://youtu.be/uuVxx53E8Kk">
                            <img width="100%" src="./img/youtube-poster.JPEG" alt="" srcset="">
                            
                        </a>                        
                    </div>
            </div> -->

            <!-- <div class="another-slider">
                <div>
                    <div class="slider-wrapper">
                        
                        <div class="card ">
                            <img src="./img/slider01.png" alt="">
                            <div class="title">
                                <h2>Ads Revinew</h2>
                                <p>Users will be able to see the ads on your content.<br></p>
                                <div class="btn">
                                    <img src="./img/a01.png" alt="" srcset="">
                                    <img src="./img/a02.png" alt="" srcset="">
                                </div>
                            </div>

                        </div>
                        
                        <div class="card ">
                            <img src="./img/slider02.png" alt="">
                            <div class="title">
                                <h2>Get Interactions</h2>
                                <p>Users will be able to like, share and subscribe to you.</p>


                                <div class="btn">
                                    <img src="./img/b01.png" alt="" srcset="">
                                    <img src="./img/b02.png" alt="" srcset="">
                                    <img src="./img/b03.png" alt="" srcset="">
                                </div>

                            </div>
                        </div>

                       
                        <div class="card ">
                            <img src="./img/slider03.png" alt="">
                            <div class="title">
                                <h2>Get Insights</h2>
                                <p>Get In-Depth Insights and Analytics on your Fans….</p>
                                <div class="btn">
                                    <img src="./img/c01.png" alt="" srcset="">
                                    <img src="./img/c02.png" alt="" srcset="">
                                </div>
                            </div>
                        </div>

                        
                        <div class="card ">
                            <img src="./img/slider04.png" alt="">
                            <div class="title">
                                <h2>Open in App</h2>
                                <p>The link will directly open<br><br></p>

                                <div class="btn">
                                    <img src="./img/d01.png" alt="" srcset="">
                                    <img src="./img/d02.png" alt="" srcset="">
                                    <img src="./img/d03.png" alt="" srcset="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> -->


        <div class="happy-slider-section">
            <p>Over <strong>1,00,000</strong> Happy Customers!</p>
            <div class="happy-slider">
                <!-- User 01 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user01.png" alt="" srcset="">
                            <div class="info">
                                <h2>Wish Rathod
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/wish_rathod" target="_blank" rel="noopener noreferrer">https://www.instagram.com/wish_rathod</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- User 02 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user02.png" alt="" srcset="">
                            <div class="info">
                                <h2>Ulhas Kamathe
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/ulhaskamthe" target="_blank" rel="noopener noreferrer">https://www.instagram.com/ulhaskamthe</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- User 03 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user03.png" alt="" srcset="">
                            <div class="info">
                                <h2>Anish Singh
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/boomingbulls" target="_blank" rel="noopener noreferrer">https://www.instagram.com/boomingbulls</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- User 04 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user04.png" alt="" srcset="">
                            <div class="info">
                                <h2>Sharan Hegde
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/financewithsharan" target="_blank" rel="noopener noreferrer">https://www.instagram.com/financewithsharan</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- User 05 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user05.png" alt="" srcset="">
                            <div class="info">
                                <h2>Jitendra Singh
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/indore_physical_academy" target="_blank" rel="noopener noreferrer">https://www.instagram.com/indore_physical_academy</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- User 06 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user06.png" alt="" srcset="">
                            <div class="info">
                                <h2>Inderjeet
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/bandookbaazritesh" target="_blank" rel="noopener noreferrer">https://www.instagram.com/bandookbaazritesh</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- User 07 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user07.png" alt="" srcset="">
                            <div class="info">
                                <h2>jennifer Mistry
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/jennifer_mistry_bansiwal" target="_blank" rel="noopener noreferrer">https://www.instagram.com/jennifer_mistry_bansiwal</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- User 08 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user08.png" alt="" srcset="">
                            <div class="info">
                                <h2>Sharan Hegde
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/inishutiwari" target="_blank" rel="noopener noreferrer">https://www.instagram.com/inishutiwari</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- User 09 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user09.png" alt="" srcset="">
                            <div class="info">
                                <h2>Wish Rathod
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/wish_rathod" target="_blank" rel="noopener noreferrer">https://www.instagram.com/wish_rathod</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- User 010 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user01.png" alt="" srcset="">
                            <div class="info">
                                <h2>Wish Rathod
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/wish_rathod" target="_blank" rel="noopener noreferrer">https://www.instagram.com/wish_rathod</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- User 011 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user02.png" alt="" srcset="">
                            <div class="info">
                                <h2>Ulhas Kamathe
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/ulhaskamthe" target="_blank" rel="noopener noreferrer">https://www.instagram.com/ulhaskamthe</a>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- User 12 -->

                <div class="user-list" style="width: 140px !important; align-items: center;">
                    <div>
                        <div>
                            <img src="./img/user03.png" alt="" srcset="">
                            <div class="info">
                                <h2>Anish Singh
                                    <svg width="11" height="11" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13.1539 6.91797L11.7597 5.32368L11.9539 3.21511L9.89109 2.74654L8.81109 0.917969L6.86823 1.75225L4.92538 0.917969L3.84538 2.74083L1.78252 3.20368L1.97681 5.31797L0.58252 6.91797L1.97681 8.51225L1.78252 10.6265L3.84538 11.0951L4.92538 12.918L6.86823 12.078L8.81109 12.9123L9.89109 11.0894L11.9539 10.6208L11.7597 8.51225L13.1539 6.91797ZM5.37109 9.2094L4.01109 7.83797C3.95812 7.7851 3.91609 7.72231 3.88741 7.65318C3.85874 7.58405 3.84398 7.50995 3.84398 7.43511C3.84398 7.36027 3.85874 7.28617 3.88741 7.21704C3.91609 7.14791 3.95812 7.08512 4.01109 7.03225L4.05109 6.99225C4.27395 6.7694 4.63966 6.7694 4.86252 6.99225L5.78252 7.91797L8.72538 4.9694C8.94823 4.74654 9.31395 4.74654 9.53681 4.9694L9.5768 5.0094C9.79966 5.23225 9.79966 5.59225 9.5768 5.81511L6.19395 9.2094C5.95966 9.43225 5.59966 9.43225 5.37109 9.2094Z" fill="#0E6FFF"></path>
                                    </svg></h2>
                                <a href="https://www.instagram.com/boomingbulls" target="_blank" rel="noopener noreferrer">https://www.instagram.com/boomingbulls</a>
                            </div>
                        </div>

                    </div>
                </div>




            </div>
        </div>


        <div class="use-anywhire">
            <p class="use-it">Use it Anywhere</p>
            <div class="platform">
                <a href="http://www.facebook.com"><img class="platform-img" src="./img/facebook-lcon.gif" alt="" srcset=""></a>
                <a href="http://www.instagram.com"><img class="platform-img" src="./img/instagram-icont.gif" alt="" srcset=""></a>
                <a href="http://www.snapchat.com"><img class="platform-img" src="./img/snapchat-icon.gif" alt="" srcset=""></a>
                <a href="http://www.twitter.com"><img class="platform-img" src="./img/twitter-icon.gif" alt="" srcset=""></a>
            </div>

            <div class="platform">
                <a href="http://www.youtube.com"><img class="platform-img" src="./img/youtube-lcon.gif" alt="" srcset=""></a>
                <a href="http://www.telegram.com"><img class="platform-img" src="./img/telegram-lcon.gif" alt="" srcset=""></a>
                <a href="http://www.messenger.com"><img class="platform-img" src="./img/messenger-lcon.gif" alt="" srcset=""></a>
                <a href="http://www.whatsapp.com"><img class="platform-img" src="./img/whats-app-icons.gif" alt="" srcset=""></a>
            </div>
            <p style="color: #12a4d9;">& many more </p>
        </div>

        <div style="background: #f9fbff; width: 100%;">
        <div class="heading">
                <p>Open Links Directly <br> <span style="display: flex; justify-content: center;">In&nbsp;<img style="padding-left: 10px; padding-right: 10px;"  width="20%" src="./img/youtube-logo.png"> Apps</span> <span style="color: #12a4d9; font-size: 14px;" >By Views Grow App</span></p>
            </div>
            <a href="https://play.google.com/store/apps/details?id=com.sikderithub.viewsgrow">
                <div class="">
                    <img width="100%" src="./img/install-app.JPEG" alt="" srcset="">
                    
                </div>
            </a>
        </div>


        <div class="community">
            <p>Join our community &amp; stay updated</p>
            <div class="community-social">
                <a href="http://www.facebook.com" target="_blank"><img class="image" src="./img/fb.svg" alt="" srcset=""></a>
                <a href="http://www.twitter.com" target="_blank"><img style="background: #12a4d9; border: solid 1px white;" class="image" src="./img/twitter.svg" alt="" srcset=""></a>
                <a href="http://www.instagram.com" target="_blank"><img class="image" src="./img/instagram.png" alt="" srcset=""></a>

            </div>
            <div class="Email">
                <p>For queries mail us at</p>
                <a href="mailto:Viewsgrowapp@gmail.com">Viewsgrowapp@gmail.com</a>
            </div>

            <div class="app-av">
                <a href="http://" target="_blank" rel="noopener noreferrer"><img src="./img/google-play.svg" alt="" srcset=""></a>
            </div>
        </div>

        <div class="footer">
            <p style="font-weight: 400;">Copyright © 2023  Views Grow App All rights reserved.</p>
            <div class="footer-link-div">
                <div>
                    <a href="./Terms-of-Service.html">
                        Terms of Services
                    </a>
                </div>
                <div>
                    |
                </div>
                <div>
                    <a href="./Privacy-Policy.html">
                        Privacy Policy
                    </a>
                </div>

            </div>
            <div class="footer-link-div">
                <div>
                    <a href="./return-policy.html">
                        Return Policy
                    </a>
                </div>
                <div>
                    |
                </div>
                <div>
                    <a href="./contact-us.html">
                        Contact Us
                    </a>
                </div>

            </div>
        </div>

        <style>
            .counter-div {
                border: solid 1px #12a4d9;
                margin-top: 10px;
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: center;
                row-gap: 6px;
                flex-direction: row;
                font-size: x-small;
            }

            .Counter-inner-div {
                display: block;
                align-self: center;
                padding: 3px 5px;
            }

            .ctitle {
                font-weight: 500;
            }
        </style>

        <div>
            <div class="counter-div">
                <div class="Counter-inner-div">
                    <div class="counter-today ctitle">Today</div>
                    <div class="counter-today-value">3</div>
                </div>

                <div class="Counter-inner-div">
                    <div class="counter-week ctitle">This Week</div>
                    <div class="counter-week-value">3</div>
                </div>
                <div class="Counter-inner-div">
                    <div class="counter-this-month ctitle">This Month</div>
                    <div class="counter-this-month-value">3</div>
                </div>
                <div class="Counter-inner-div">
                    <div class="counter-last-month ctitle">Last Month</div>
                    <div class="counter-last-month-value">3</div>
                </div>
                <div class="Counter-inner-div">
                    <div class="counter-this-year ctitle">This Year</div>
                    <div class="counter-this-year-value">3</div>
                </div>
                <div class="Counter-inner-div">
                    <div class="counter-total ctitle">Total</div>
                    <div class="counter-total-value">3</div>
                </div>
            </div>
        </div>


    </div>
    <a href="https://wa.me/+919433614287?text=Hello" target="_blank" rel="noopener noreferrer" style="position: relative;">
        <div class="floating-button">
            <img class="ft-whatsapp" src="./img/whatsapp-button.gif" alt="" srcset="">
        </div>
    </a>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="/slick/slick.js"></script>
<script type="text/javascript">
    $('.slider-wrapper').slick({
        centerMode: true,
        autoplaySpeed: 3000,
        autoplay: true,
        infinite: true,
        centerPadding: '40px',
        arrows: false,
        pauseOnHover: true,
        pauseOnFocus: true,
        slidesToShow: 1,
    });

    $('.happy-slider').slick({
        autoplaySpeed: 3000,
        autoplay: true,
        infinite: true,
        arrows: false,
        focusOnSelect: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        focusOnSelect: true,

    });
</script>

<script>
    var counteToday = document.querySelector(".counter-today-value");
    var Totalcounte = document.querySelector(".counter-total-value");

    var today = new Date();
    var lastDayOfMonth = new Date(today.getFullYear(), today.getMonth() + 1, 0);

    var visitCount = localStorage.getItem("page_view");

    // Check if page_view entry is present
    if (visitCount && today) {
        visitCount = Number(visitCount) + 1;
        localStorage.setItem("page_view", visitCount);
    } else {
        visitCount = 1;
        localStorage.setItem("page_view", 1);
    }
    counteToday.innerHTML = visitCount;
    Totalcounte.innerHTML = visitCount;
</script>

<script>
    //window.location = "intent://youtube.com/channel/UCDcPukLG2XrWLs3uYCcONYg/#Intent;scheme=vnd.youtube;package=com.google.android.youtube;S.browser_fallback_url=market://details?id=com.google.android.youtube;end;";
    //window.location = "intent://channel/UCDcPukLG2XrWLs3uYCcONYg/#Intent;scheme=vnd.youtube;package=com.google.android.youtube;S.browser_fallback_url=market://details?id=com.google.android.youtube;end;";
    //window.location = "intent://instagram.com/p/CichwmeqBv6/?utm_source=ig_web_copy_link/#Intent;package=com.instagram.android;scheme=https;end";
    //window.location = "fb://':'https://www.facebook.com/zuck";

    var isMobile = false; //initiate as false
    console.log(isMobile);

    // device detection
    if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent)
        || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) {
        isMobile = true;
    }

    <?php
    if ($link) {
    if ($link->type == "YOUTUBE") {
    ?>
    if(isMobile){
        window.location = "intent://<?php echo $link->intent ?>/#Intent;scheme=vnd.youtube;package=com.google.android.youtube;S.browser_fallback_url=market://details?id=com.google.android.youtube;end;";
    }else{
        window.open("<?php echo $link->oLink?>");
    }

    <?php
    }
    if ($link->type == "INSTAGRAM") {
    ?>
    if(isMobile){
        window.location = "intent://instagram.com/<?php echo $link->intent ?>/#Intent;package=com.instagram.android;scheme=https;end;";
    }else{

    }

    <?php
    }
    }
    ?>
</script>
</body>


</html>