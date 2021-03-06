<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'virtual-space-form',
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
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'startLatitude'); ?>
		<?php echo $form->textField($model, 'startLatitude'); ?>
		<?php echo $form->error($model,'startLatitude'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'startLongitude'); ?>
		<?php echo $form->textField($model, 'startLongitude'); ?>
		<?php echo $form->error($model,'startLongitude'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'stopLatitude'); ?>
		<?php echo $form->textField($model, 'stopLatitude'); ?>
		<?php echo $form->error($model,'stopLatitude'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'stopLongitude'); ?>
		<?php echo $form->textField($model, 'stopLongitude'); ?>
		<?php echo $form->error($model,'stopLongitude'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('vComBases')); ?></label>
		<?php echo $form->checkBoxList($model, 'vComBases', GxHtml::encodeEx(GxHtml::listDataEx(VComBase::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('vComComposites')); ?></label>
		<?php echo $form->checkBoxList($model, 'vComComposites', GxHtml::encodeEx(GxHtml::listDataEx(VComComposite::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->