<div class="wide form">

<?php $form = $this->beginWidget('GxActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model, 'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'user'); ?>
		<?php echo $form->textField($model, 'user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'currentTime'); ?>
		<?php echo $form->textField($model, 'currentTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'content'); ?>
		<?php echo $form->textArea($model, 'content'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'latitude'); ?>
		<?php echo $form->textField($model, 'latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'longitude'); ?>
		<?php echo $form->textField($model, 'longitude'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
