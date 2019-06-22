<?php
/* @var $this SiteController */

$this->pageTitle="Карта программы";
?>

<style>
    input.circle {
        border: 3px solid black;
        border-radius: 50%;
        width: 80px; height: 80px;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        background-color: bisque;
        outline: none;

    }
</style>

<div class="main">
    <?php
    $x[0] = 0;
    $y[0] = 0;
    foreach ($points as $key => $point){
        $x[$key] = (50 + 200*($key-1));
        $y[$key] = (200+rand(-200, 200));
        echo '<input type="button" class="circle" style="position: relative; top: '.$y[$key].'px; left: '.$x[$key].'px;"onclick="window.location=\'/page'.$key.'\';" >';


        /*        if($key>1){
            echo '<div style="padding:0px; margin:0px; height:1px; background-color:black; line-height:1px; position:absolute; 
        left:'.$xold.'px; top:'.$yold.'px; width:'.'22'.'px; -moz-transform:rotate('.'45'.'deg); -webkit-transform:rotate('.'45'.'deg); -o-transform:rotate('.'45'.'deg); -ms-transform:rotate('.'45'.'deg); transform:rotate('.'45'.'deg);" />';
         $xold = $x;
         $yold = $y;
        }*/
    }

    ?>

</div>

<script>
</script>

