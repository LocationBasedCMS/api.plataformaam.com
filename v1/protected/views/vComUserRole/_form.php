<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'vcom-upipublication-form',
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
		<?php echo $form->labelEx($model,'vcombase'); ?>
		<?php echo $form->dropDownList($model, 'vcombase', GxHtml::listDataEx(VComBase::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'vcombase'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'upi'); ?>
		<?php echo $form->dropDownList($model, 'upi', GxHtml::listDataEx(UPI::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'upi'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'upiaggregationrulestart'); ?>
		<?php echo $form->dropDownList($model, 'upiaggregationrulestart', GxHtml::listDataEx(UPIAggregationRuleStart::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'upiaggregationrulestart'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'upiaggregationruleresponseof'); ?>
		<?php echo $form->dropDownList($model, 'upiaggregationruleresponseof', GxHtml::listDataEx(UPIAggregationRuleResponseOf::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'upiaggregationruleresponseof'); ?>
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