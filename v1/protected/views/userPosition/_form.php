<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'user-position-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'user'); ?>
		<?php echo $form->dropDownList($model, 'user', GxHtml::listDataEx(User::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'user'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'currentTime'); ?>
		<?php echo $form->textField($model, 'currentTime'); ?>
		<?php echo $form->error($model,'currentTime'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model, 'content'); ?>
		<?php echo $form->error($model,'content'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'latitude'); ?>
		<?php echo $form->textField($model, 'latitude'); ?>
		<?php echo $form->error($model,'latitude'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'longitude'); ?>
		<?php echo $form->textField($model, 'longitude'); ?>
		<?php echo $form->error($model,'longitude'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->