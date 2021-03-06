<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'upitype-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->

		<label><?php echo GxHtml::encode($model->getRelationLabel('uPIs')); ?></label>
		<?php echo $form->checkBoxList($model, 'uPIs', GxHtml::encodeEx(GxHtml::listDataEx(UPI::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleResponseOfs')); ?></label>
		<?php echo $form->checkBoxList($model, 'uPIAggregationRuleResponseOfs', GxHtml::encodeEx(GxHtml::listDataEx(UPIAggregationRuleResponseOf::model()->findAllAttributes(null, true)), false, true)); ?>
		<label><?php echo GxHtml::encode($model->getRelationLabel('uPIAggregationRuleStarts')); ?></label>
		<?php echo $form->checkBoxList($model, 'uPIAggregationRuleStarts', GxHtml::encodeEx(GxHtml::listDataEx(UPIAggregationRuleStart::model()->findAllAttributes(null, true)), false, true)); ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->