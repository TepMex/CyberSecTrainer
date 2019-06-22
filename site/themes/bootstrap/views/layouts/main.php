<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="ru" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'Главная', 'url'=>array('/site/index')),
                array('label'=>'О нас', 'url'=>array('/site/page', 'view'=>'about')),
                array('label'=>'Контакты', 'url'=>array('/site/contact')),
                array('label'=>'Вход', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Выход ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        ),
    ),
)); ?>

<div class="container" id="page" style="margin-bottom: 80px;">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer" style="position: fixed; right: 0px; left: 0px; bottom: 0; width: 100%; height: 80px;
	background-color: #f5f5f5; border: 1px solid transparent; border-color: #B9B9B9;">
        <div class="container" style="padding-right: 15px; padding-left: 15px; color: #777; text-align: center;">
		Copyright &copy; <?php echo date('Y'); ?> by OmGTU.<br/>
        Все права защищены.<br/>
        </div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
