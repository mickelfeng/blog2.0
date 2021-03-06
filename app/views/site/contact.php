<?php
use yii\helpers\Html;

$this->title = 'Contact Us';

$this->params['breadcrumbs']=array(
    'Contact',
);

?>

<h1><?php echo Html::encode($this->title); ?></h1>

<?php if(Yii::$app->session->hasFlash('contact')): ?>
<div class="alert alert-success">
	<?php echo Yii::$app->session->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<?php $form=$this->beginWidget('\yii\widgets\ActiveForm', array(
	'options' => array('class' => 'form-horizontal'),
	'fieldConfig' => array('inputOptions' => array('class' => 'input-xlarge')),
)); ?>

	<?php echo $form->field($model,'name')->textInput(); ?>
	<?php echo $form->field($model,'email')->textInput(); ?>
	<?php echo $form->field($model,'subject')->textInput(array('size'=>60,'maxlength'=>128)); ?>
	<?php echo $form->field($model,'body')->textArea(array('rows' => 6, 'cols'=>50)); ?>
	<div class="form-actions">
		<?php echo Html::submitButton('Submit', null, null, array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

<?php endif; ?>