<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Вход';

?>
<link rel="stylesheet" href="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/css/ol.css" type="text/css">
<style>
    .map {
        height: 400px;
        width: 100%;
    }
</style>
<script src="https://cdn.rawgit.com/openlayers/openlayers.github.io/master/en/v5.3.0/build/ol.js"></script>



<h1>Представьтесь</h1>
<?= CHtml::textField('username','', ['class' => 'form form-control', 'placeholder' => 'Введите имя', 'style' => 'font-weigth: 16px']);
?>

<br />
  <?= CHtml::link('Это Я!', '#', ['class' => 'auth btn btn-primary', 'style'=> 'margin-bottom: 10px']); ?>

<div class="mainblock col-sm-9" hidden="hidden">

    <div class="alert1 alert alert-danger" role="alert" style="text-align: center;"><h3>Мы знаем где ты:))</h3></div>

    <div  id="map" class="map" style="margin-bottom: 10px;"> </div>

    <div class="alert alert-danger" role="alert" style="text-align: center;"><h3>Мы все о тебе знаем!</h3></div>
    <div class="alert alert-danger" role="alert" style="text-align: center;">Твой браузер: <?= $agent; ?> </div>

    <table class="table  table-striped  table-border">
        <tbody>
            <tr>
                <td>
                    Точка выхода
                </td>
                <td>
                    <?= $model->as?>
                </td>
            </tr>
            <tr>
                <td>
                    Город
                </td>
                <td>
                    <?= $model->city?>
                </td>
            </tr>
            <tr>
                <td>
                    Страна
                </td>
                <td>
                    <?= $model->country?>
                </td>
            </tr>
            <tr>
                <td>
                    ISP
                </td>
                <td>
                    <?= $model->isp?>
                </td>
            </tr>
            <tr>
                <td>
                    Организация
                </td>
                <td>
                    <?= $model->org?>
                </td>
            </tr>
            <tr>
                <td>
                    Организация
                </td>
                <td>
                    <?= $model->query; ?>
                </td>
            </tr>
        </tbody>
    </table>

    <?= CHtml::link('Хочу знать как защитить себя!', ['map'], ['class' => 'btn btn-success', 'style'=> 'margin-bottom: 10px; horizontal-align:center;']); ?>
</div>

<script>
    $('.auth').on('click', function(e) {
        e.preventDefault();
        var user = $('#username').val();
        if (user !== "") {
            $(".alert1").html('<h3>Мы знаем где ты:)) ' + user + '</h3>'  );
            $(".mainblock").show();

            $.ajax({
                url: "<?= Yii::app()->createAbsoluteUrl('site/saveLogin'); ?>",
                type: 'post',
                dataType: 'json',
                data: {login: user},
                success : function(responce) {
                    if (responce.success) {
                        $.notify({
                            // options
                            icon: 'glyphicon glyphicon-remove',
                            title: '<b>Успешно!</b>',
                            message: '',
                            newest_on_top: true
                        },{
                            // settings
                            type: 'success',
                            icon_type: 'class',
                            delay: 2000
                        });
                    }
                }
            });

            var map = new ol.Map({
                target: 'map',
                layers: [
                    new ol.layer.Tile({
                        source: new ol.source.OSM()
                    })
                ],
                view: new ol.View({
                    center: ol.proj.fromLonLat([<?= str_replace(',', '.', $model->lon); ?>, <?= str_replace(',', '.', $model->lat); ?>]),
                    zoom: 11
                })
            });
        } else {
            $.notify({
                // options
                icon: 'glyphicon glyphicon-remove',
                title: '<b>Ошибка!</b>',
                message: 'Введите свое имя',
                newest_on_top: true
            },{
                // settings
                type: 'danger',
                icon_type: 'class',
                delay: 2000
            });
        }
    });
</script>

