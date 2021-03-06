<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/buttons.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/icons.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/tables.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/mbmenu_iestyles.css" />
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page"> 
	<div id="topnav">
	<?php 
	if (!Yii::app()->user->isGuest)
	{
//	$usuario = Usuario::model()->findByPk(Yii::app()->user->id);
    $nome_conhecido = Yii::app()->user->name;
    $user_type = 0; //Yii::app()->user->type;
    $user_id = Yii::app()->user->id;
	} else
	$usuario = $nome_conhecido = $user_type = $user_id = null;
	?>
		<div class="topnav_text"><a href='<?php echo Yii::app()->request->baseUrl;?>'>Home</a> | <a href='#'>My Account</a> | <a href='<?php echo Yii::app()->request->baseUrl .'/'. $user_type .'/'.$user_id;?>'>Meu Perfil</a> | <a href='<?php echo Yii::app()->request->baseUrl;?>/site/logout'>Sair</a> </div>
	</div>
	<div id="header">
		<div id="logo"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png"></img><?php //echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
    <!--
<?php /*$this->widget('application.extensions.mbmenu.MbMenu',array(
            'items'=>array(
                array('label'=>'Dashboard', 'url'=>array('/site/index'),'itemOptions'=>array('class'=>'test')),
                array('label'=>'Theme Pages',
                  'items'=>array(
                    array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs'),'itemOptions'=>array('class'=>'icon_chart')),
					array('label'=>'Form Elements', 'url'=>array('/site/page', 'view'=>'forms')),
					array('label'=>'Interface Elements', 'url'=>array('/site/page', 'view'=>'interface')),
					array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')),
					array('label'=>'Calendar', 'url'=>array('/site/page', 'view'=>'calendar')),
					array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
                  ),
                ),
                array('label'=>'Gii Generated Module',
                  'items'=>array(
                    array('label'=>'Items', 'url'=>array('/theme/index')),
                    array('label'=>'Create Item', 'url'=>array('/theme/create')),
					array('label'=>'Manage Items', 'url'=>array('/theme/admin')),
                  ),
                ),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
            ),
    )); */?> --->
	<div id="mainmenu">
    
		<?php 
		if (!Yii::app()->user->isGuest){
			$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Dashboard', 'url'=>array('/site')),
			//	array('label'=>'Usuarios', 'url'=>array('/usuario', ''=>'')),
				array('label'=>'Alunos', 'url'=>array('/aluno', ''=>'')),
				array('label'=>'Professores', 'url'=>array('/professor', ''=>'')),
				array('label'=>'Administradores', 'url'=>array('/admin', ''=>'')),
				array('label'=>'Equipes', 'url'=>array('/equipe', ''=>'')),
				array('label'=>'Mensagens', 'url'=>array('/message', ''=>'')),
				array('label'=>'Mensagens 2', 'url'=>array('/mailbox', ''=>'')),
				array('label'=>'Noticias', 'url'=>array('/mailbox/', ''=>'')),
			
			//Botoes do BUM	
				array('label'=>'Install', 'url'=>array('/bum/install'), 'visible'=>Yii::app()->getModule('bum')->install),
        		array('label'=>'My Profile', 'url'=>array('/bum/users/viewProfile', 'id'=>Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
        		array('label'=>'Login', 'url'=>array('/bum/users/login'), 'visible'=>Yii::app()->user->isGuest),
        		array('label'=>'SingUp', 'url'=>array('/bum/users/signUp'), 'visible'=>Yii::app()->user->isGuest),
        		array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
				
				//	array('label'=>'Graphs', 'url'=>array('/site/page', 'view'=>'graphs'),'itemOptions'=>array('class'=>'icon_chart')),
			//	array('label'=>'Form', 'url'=>array('/site/page', 'view'=>'forms')),
			//	array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),				
			//	array('label'=>'Buttons & Icons', 'url'=>array('/site/page', 'view'=>'buttons_and_icons')),
			//	array('label'=>'Error Pages', 'url'=>array('/site/page', 'view'=>'Demo 404 page')), 
			),
		)); 
		}
		?>
	</div> <!--mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by webapplicationthemes.com<br/>
		All Rights Reserved.<br/>
		<? 