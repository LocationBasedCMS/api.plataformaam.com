<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'upi-form',
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
		<?php echo $form->labelEx($model,'upitype'); ?>
		<?php echo $form->dropDownList($model, 'upitype', GxHtml::listDataEx(UPIType::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'upitype'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textArea($model, 'title'); ?>
		<?php echo $form->error($model,'title'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model, 'description'); ?>
		<?php echo $form->error($model,'description'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php echo $form->textArea($model, 'content'); ?>
		<?php echo $form->error($model,'content'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('uPIPositions')); ?></label>
		<?php echo $form->checkBoxList($model, 'uPIPositions', GxHtml::encodeEx(GxHtml::listDataEx(UPIPosition::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('vComUPIPublications')); ?></label>
		<?php echo $form->checkBoxList($model, 'vComUPIPublications', GxHtml::encodeEx(GxHtml::listDataEx(VComUPIPublication::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->