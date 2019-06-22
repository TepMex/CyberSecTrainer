<?php
/* @var $this SiteController */

$this->pageTitle="Карта программы";

?>


<link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="row">
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


