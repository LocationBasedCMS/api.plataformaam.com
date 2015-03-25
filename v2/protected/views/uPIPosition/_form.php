<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'upiposition-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model, 'id'); ?>
		<?php echo $form->error($model,'id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'upi'); ?>
		<?php echo $form->dropDownList($model, 'upi', GxHtml::listDataEx(UPI::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'upi'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'editiontime'); ?>
		<?php echo $form->textField($model, 'editiontime'); ?>
		<?php echo $form->error($model,'editiontime'); ?>
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