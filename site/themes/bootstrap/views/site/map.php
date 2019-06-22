
<section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-k">



    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm bg-color transparent">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">

                         <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/logo2.png" alt="BeSafe!" title="" style="height: 3.8rem;">

                </span>
                <span class="navbar-caption-wrap"><a class="navbar-caption text-secondary display-4" href="#top">
                        Будь Защищён!</a></span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item dropdown">
                    <a class="nav-link link text-white dropdown-toggle display-4" href="index.html" data-toggle="dropdown-submenu" aria-expanded="true"><span class="mbri-rocket mbr-iconfont mbr-iconfont-btn" style="color: rgb(255, 51, 102);"></span>
                        Ступени</a><div class="dropdown-menu"><a class="text-white dropdown-item display-4" href="#">0. Компьютерная грамотность</a><a class="text-white dropdown-item display-4" href="page1.html">1. Основы кибербезопасности</a><a class="text-white dropdown-item display-4" href="#">2. Защита личности в сети</a><a class="text-white dropdown-item display-4" href="#">3. Безопасность онлайн платежей</a></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="index.html"><span class="mbri-idea mbr-iconfont mbr-iconfont-btn" style="color: rgb(255, 51, 102);"></span>

                        О проекте</a>
                </li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="index.html"><span class="mbri-lock mbr-iconfont mbr-iconfont-btn"></span>
                    Вход</a></div>
        </div>
    </nav>
</section>

<section class="header1 cid-ru7SqC2BrW mbr-parallax-background" id="header1-m">



    <div class="mbr-overlay" style="opacity: 0.7; background-color: rgb(70, 80, 82);">
    </div>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="mbr-white col-md-10">
                <h1 class="mbr-section-title align-center mbr-bold pb-3 mbr-fonts-style display-1">
                    1. Основы Кибербезопасности</h1>



            </div>
        </div>
    </div>

</section>

<section class="mbr-section article content11 cid-ru7TXATUeN" id="content11-n">


    <div class="container">
        <div class="media-container-row">
            <div class="mbr-text counter-container col-12 col-md-8 mbr-fonts-style display-7">
                <?php
                foreach ($points as $key => $point) {
                    /* из сессии забирать информацию о прохождении теста*/
                    if(true){$point['cssButton'] = 'btn btn-primary';}else{$point['cssButton'] = 'btn btn-success';}
                    /*end*/
                    echo '<div class="col-sm-6 col-md-3">
        <fieldset '.(($point['disabled'])?'disabled':'').'>
            <div class="thumbnail">
                <img src="'.$point['img'].'" alt="'.$point['notify'].'">
                <div class="caption">
                    <h3>'.$point['title'].'</h3>
                    <p>'.$point['description'].'</p>
                    <p><a href="'.$point['link'].'" class="'.$point['cssButton'].'" role="button">Перейти к выполнению</a> 
                    </p>
                </div>
            </div>
        </fieldset>
    </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<section once="footers" class="cid-ru7qItbVxn" id="footer7-l">





    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row row-links">
                <ul class="foot-menu">
                    <li class="foot-menu-item mbr-fonts-style display-7"><a href="#" target="_blank">
                            <a href="#">
                                О проекте&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            </a>
                    </li>
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a href="#">
                            Ступени&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        </a>
                    </li>
                    <li class="foot-menu-item mbr-fonts-style display-7">
                        <a href="#">
                            Связаться
                        </a>
                    </li>
                </ul>
            </div>
            <div class="row social-row">
                <div class="social-list align-right pb-2">






                    <div class="soc-item">
                        <a href="https://twitter.com/" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-twitter socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.facebook.com/pages/" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com/c/" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://instagram.com/" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://ok.ru" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-odnoklassniki socicon"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.vk.ru" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-vkontakte socicon"></span>
                        </a>
                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white align-center display-7">
                    © Copyright 2019 CyberSecTrainer - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>




<div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon mbr-arrow-up-icon-cm cm-icon cm-icon-smallarrow-up"></i></a></div>
<input name="animation" type="hidden">



