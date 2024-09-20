<?php

if(file_exists('../php/geturl/index.php')) //for use corrent url
{
    include '../php/geturl/index.php';
}
function head($title = '',$style){ ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VenSoeng - <?=$title?></title>
        <!-- this is favicon  -->
        <link rel="shortcut icon" href="<?=getBaseUrl('')?>images/favicon.png" type="image/x-icon">
        <!-- this is main css  -->
        <link rel="stylesheet" href="<?=getBaseUrl('')?>css/main.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?=getBaseUrl('')?>css/header.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?=getBaseUrl('')?>css/home.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="<?=getBaseUrl('')?>css/dashbaord.css?v=<?php echo time(); ?>">
        <!-- this is for icon  -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- this is oas animation link css  -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <!-- this is for insert style  -->
        <?=$style?>
    </head>
    <body>
        <header class="main-header">
            <div class="web-header df-s">
                <ul class="home-ul df-l">
                    <a class="web-logo curs-p">
                        <li class="df-l">
                            <i class='bx bx-menu' onclick="document.querySelector('.form-head').classList.add('form-head-active')"></i>
                            <h1 onclick="location.href='<?=getBaseUrl('')?>'">SOENG</h1>
                        </li>
                    </a>
                </ul>
                <ul class="list-ul df-l">
                    <a href="<?=getBaseUrl('')?>" class="<?= urlRequest(getBaseUrl('')) ? 'active' : ''?>"><li><span>about me</span></li></a>
                    <a href="<?=getBaseUrl('mywork/')?>" class="<?= urlRequest(getBaseUrl('mywork/')) ? 'active' : ''?>"><li><span>my work</span></li></a>
                    <a onclick="document.querySelector('.form-head').classList.add('form-head-active')" class="main-btn btn icon-ra btn-bg curs-p">
                        <li>
                            <span>Contact</span>
                            <!-- <i class="fa-solid fa-up-right-from-square"></i> -->
                        </li>
                    </a>
                </ul>
            </div>
        </header>
        <!-- this is form For header  -->
        <div class="form-head df-c">
            <div class="form-body db-c scroll-y">
                <div class="head">
                    <ul class="df-s">
                        <li>
                            <h2>Choose Menu</h2>
                        </li>
                        <li onclick="document.querySelector('.form-head').classList.remove('form-head-active')">
                            <div class="icon icon-ra icon-sm">
                                <i class="fa-solid fa-xmark"></i>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="form-con">
                    <ul>
                        <li>
                            <a href="<?=getBaseUrl('')?>" class="df-l <?= urlRequest(getBaseUrl('')) ? 'active' : ''?>">
                                <strong>A</strong>
                                <span>AboutMe</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?=getBaseUrl('mywork/')?>" class="df-l <?= urlRequest(getBaseUrl('mywork/')) ? 'active' : ''?>">
                                <strong>M</strong>
                                <span>My work</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://web.facebook.com/vensoeng" class="df-l">
                                <i class="fa-brands fa-facebook"></i>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://t.me/seongpublichannel" class="df-l">
                                <i class="fa-brands fa-telegram"></i>
                                <span>Telegram</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.tiktok.com/@vensoeng" class="df-l">
                                <i class="fa-brands fa-tiktok"></i>
                                <span>Tiktok</span>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/@vsoeng" class="df-l">
                                <i class="fa-brands fa-youtube"></i>
                                <span>YouTube</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bg"></div>
        </div>
        <!-- this IS aos animation  -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <!-- this is start aos  -->
        <script>
            AOS.init();
        </script>
<?php
}