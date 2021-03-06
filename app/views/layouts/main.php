<?php
use \Yii;
use \yii\helpers\Html;

$this->registerAssetBundle('app');
$this->beginPage();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<title><?php echo Html::encode($this->title); ?></title>
	<?php $this->head(); ?>
</head>

<body>

<div class="container" id="page">
	<?php $this->beginBody(); ?>
	<div class="masthead">
		<h3 class="muted"><?php echo Html::encode(Yii::$app->name); ?></h3>

		<div class="navbar">
			<div class="navbar-inner">
				<div class="container">
					<?php 
					$username = '';

					if ( Yii::$app->user->identity instanceof app\models\User) {
						$username = Yii::$app->user->identity->username;
					}

					$this->widget('app\widgets\Menu',array(
						'htmlOptions'=>array(
							'class'=>'nav'
						),
						'controller'=>$this->context,
						'items'=>array(
							array('label'=>'Home', 'url'=>array('post/index')),
							array('label'=>'About', 'url'=>array('site/page', 'view'=>'about')),
							array('label'=>'Contact', 'url'=>array('site/contact')),
							array('label'=>'Login', 'url'=>array('site/login'), 'visible'=>Yii::$app->user->isGuest),
							array('label'=>'Logout ('.Html::encode($username).')', 'url'=>array('site/logout'), 'visible'=>!Yii::$app->user->isGuest)
						),
					));?>
				</div>
			</div>
		</div>
		<!-- /.navbar -->
	</div>

	<?php $this->widget('app\widgets\Breadcrumbs', array(
		'links'=>$this->params['breadcrumbs'],
	));?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div class="footer">
		<p>&copy; <?php echo Html::encode(Yii::$app->name);?> <?php echo date('Y'); ?></p>
		<p>
			<?php echo Yii::powered(); ?>
			Template by <a href="http://twitter.github.io/bootstrap/">Twitter Bootstrap</a>
		</p>
	</div><!-- footer -->
	<?php $this->endBody(); ?>
</div><!-- page -->

</body>
</html>
<?php $this->endPage(); ?>