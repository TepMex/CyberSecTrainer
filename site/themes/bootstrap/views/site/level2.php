<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/level2Game.css">

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
                        Ступени</a><div class="dropdown-menu"><a class="text-white dropdown-item display-4" href="#">0. Компьютерная грамотность</a><a class="text-white dropdown-item display-4" href="page1.html">Мини-игра: надёжный пароль</a><a class="text-white dropdown-item display-4" href="#">2. Защита личности в сети</a><a class="text-white dropdown-item display-4" href="#">3. Безопасность онлайн платежей</a></div>
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
                    Мини-игра: Менеджер паролей</h1>



            </div>
        </div>
    </div>

</section>

<section class="mbr-section article content11 cid-ru7TXATUeN" id="content11-n" style="padding-bottom: 700px;">

    <div class="igra_pamyat">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>

</section>

<script>
    $(document).ready(function(){

        function mix(mixArray) {
            var index, valueIndex;
            for (var i=0; i<=mixArray.length-1; i++) {
                index = Math.floor(Math.random()*i);
                valueIndex = mixArray[index];
                mixArray[index] = mixArray[i];
                mixArray[i] = valueIndex;
            }
            return mixArray;
        }

        var last_img; //Последняя показанная картинка
        //var img_root = 'https://sergey-oganesyan.ru/wp-content/uploads/2017/01/'; //Путь к папке с картинками
        var img_root = '<?php echo Yii::app()->theme->baseUrl; ?>' + '/img/';
        var click_flag = 1;
        var count_click = 0; //Кол-во кликов
        var game_array = [1,3,4,5,6,1,7,8,2,6,7,3,4,5,8,2]; //Массив расположения картинок
        var add_win = 0;
        var count_all_click = 0;

        mix(game_array); //перемешиваем массив (картинки)

        $('.igra_pamyat div').each(function(){
            $(this).attr({'class':'num'+game_array[count_click],'data-state':'0'});
            count_click++;
        });

        count_click = 0;

        $('.igra_pamyat div').click(function(){ //Клик на игровом поле
            count_all_click++;
            if( $(this).data('state') == 0 && click_flag == 1 ){ //Если ячейка закрыта

                if( count_click == 0 ){ //Если первый клик по закрытому полю
                    count_click++;
                    last_img = $(this).attr('class');
                    $(this).data('state',1).attr('data-state',1).css('backgroundImage', 'url(' + img_root + last_img.substr(3,1) + '.png)');
                }else{

                    //Если картинки совпадают
                    if( last_img == $(this).attr('class')  ){
                        $('.' + last_img).data('state',2).attr('data-state',2).css('backgroundImage', 'url(' + img_root + last_img.substr(3,1) + '.png)');
                        add_win = add_win+1;
                        if(add_win>7){
                            setTimeout(hide_all, 1000);
                        }
                    }else{

                        $(this).data('state', 1).attr('data-state',1).css('backgroundImage', 'url(' + img_root + $(this).attr('class').substr(3,1) + '.png)');

                        click_flag = 0;

                        function hide_img() { //Делаем задержку
                            $('.igra_pamyat div').each(function(){
                                if( $(this).data('state') == 1 ){
                                    $(this).data('state',0).attr('data-state',0).css('backgroundImage', 'none');
                                }
                            });
                            click_flag = 1;
                        }
                        setTimeout(hide_img, 1000);
                    }
                    function hide_all() {
                        $('.igra_pamyat div').each(function(){
                            $(this).data('state',0).attr('data-state',0).css('backgroundImage', 'none');
                        });
                        alert('Your click '+count_all_click);
                    }
                    count_click = 0;
                }
            }
        });
    });

</script>
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



