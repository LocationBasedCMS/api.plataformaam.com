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
			'name' => 'user0',
			'type' => 'raw',
			'value' => $model->user0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->user0)), array('user/view', 'id' => GxActiveRecord::extractPkValue($model->user0, true))) : null,
			),
array(
			'name' => 'vcombase0',
			'type' => 'raw',
			'value' => $model->vcombase0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->vcombase0)), array('vComBase/view', 'id' => GxActiveRecord::extractPkValue($model->vcombase0, true))) : null,
			),
array(
			'name' => 'upi0',
			'type' => 'raw',
			'value' => $model->upi0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->upi0)), array('uPI/view', 'id' => GxActiveRecord::extractPkValue($model->upi0, true))) : null,
			),
array(
			'name' => 'upiaggregationrulestart0',
			'type' => 'raw',
			'value' => $model->upiaggregationrulestart0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->upiaggregationrulestart0)), array('uPIAggregationRuleStart/view', 'id' => GxActiveRecord::extractPkValue($model->upiaggregationrulestart0, true))) : null,
			),
array(
			'name' => 'upiaggregationruleresponseof0',
			'type' => 'raw',
			'value' => $model->upiaggregationruleresponseof0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->upiaggregationruleresponseof0)), array('uPIAggregationRuleResponseOf/view', 'id' => GxActiveRecord::extractPkValue($model->upiaggregationruleresponseof0, true))) : null,
			),
'latitude',
'longitude',
'currentTime',
	),
)); ?>

