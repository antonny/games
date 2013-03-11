<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    
    
    
    
    
<script type="text/javascript" src="/linenstore/assets/845a7866/jquery1.js"></script>

 <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/jcarouse/lib/jquery.jcarousel.min.js"></script>

 <script type="text/javascript" src="fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>

 <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jcarouse/style.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/jcarouse/skins/tango/skin.css"  media="screen, projection"/>
    
    
    
    
    
    
    
    
    
    
    
    
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<!--<script type="text/javascript" src="../framework/web/js/source/jquery.js"></script>-->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
        <form action="index.php" method="get">
        <input type="hidden" name="r" value="fabrics/search" />
        <input type="text" name="q" />
        <input name="ok" type="submit" value="search">
        </form>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
			array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Fabrics', 'url'=>array('/Fabrics/show_fabrics')),
				array('label'=>'Lien', 'url'=>array('/Fabrics/Show_fabric_by_type&type=2')),
				array('label'=>'Cotton', 'url'=>array('/Fabrics/Show_fabric_by_type&type=1')),
				array('label'=>'Hemp', 'url'=>array('/Fabrics/Show_fabric_by_type&type=3')),
				array('label'=>'Add Linen', 'url'=>array('/Fabrics/add_fabric'),'visible'=>(Yii::app()->session['privs']==2&&!Yii::app()->user->isGuest)),
				array('label'=>'Statistic', 'url'=>array('/Statistic/show'),'visible'=>(Yii::app()->session['privs']==2&&!Yii::app()->user->isGuest)),
				array('label'=>'Orders', 'url'=>array('/Order/index'),'visible'=>(Yii::app()->session['privs']==2&&!Yii::app()->user->isGuest)),
                array('label'=>'Registration', 'url'=>array('site/registeruser'),'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Profile', 'url'=>array('site/updateuser'),'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Cart', 'url'=>array('/cart/show_cart'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)

			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
