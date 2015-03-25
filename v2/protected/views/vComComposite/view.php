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
'name',
'description',
array(
			'name' => 'virtualspace0',
			'type' => 'raw',
			'value' => $model->virtualspace0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->virtualspace0)), array('virtualSpace/view', 'id' => GxActiveRecord::extractPkValue($model->virtualspace0, true))) : null,
			),
array(
			'name' => 'vcomcomposite0',
			'type' => 'raw',
			'value' => $model->vcomcomposite0 !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->vcomcomposite0)), array('vComComposite/view', 'id' => GxActiveRecord::extractPkValue($model->vcomcomposite0, true))) : null,
			),
'createruser',
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('vComBases')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vComBases as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComBase/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('vComComposites')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vComComposites as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComComposite/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?><h2><?php echo GxHtml::encode($model->getRelationLabel('vComUserRoles')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->vComUserRoles as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('vComUserRole/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>