<?php
$this->params['breadcrumbs']=array(
	'Comments'=>array('index'),
	'Update Comment #'.$model->id,
);
?>

<h1>Update Comment #<?php echo $model->id; ?></h1>

<?php echo $this->context->renderPartial('_form', array('model'=>$model)); ?>