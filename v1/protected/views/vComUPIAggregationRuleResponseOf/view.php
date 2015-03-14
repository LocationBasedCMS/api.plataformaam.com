<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'View') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
'id',
array(
			'name' => 'vcomuserole0',
			'type' => 'raw',
			'value' => $model->vcomuserole0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->vcomuserole0)), array('vComUserRole/view', 'id' => GxActiveRecord::extractPkValue($model->vcomuserole0, true))) : null,
			),
array(
			'name' => 'upiaggregationruleresponseof0',
			'type' => 'raw',
			'value' => $model->upiaggregationruleresponseof0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->upiaggregationruleresponseof0)), array('uPIAggregationRuleResponseOf/view', 'id' => GxActiveRecord::extractPkValue($model->upiaggregationruleresponseof0, true))) : null,
			),
'allowedRead:boolean',
'allowedWrite:boolean',
	),
)); ?>

