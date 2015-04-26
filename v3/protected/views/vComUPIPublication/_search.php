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
		<?php echo $form->dropDownList($model, 'user', GxHtml::listDataEx(User::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'vcombase'); ?>
		<?php echo $form->dropDownList($model, 'vcombase', GxHtml::listDataEx(VComBase::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'upi'); ?>
		<?php echo $form->dropDownList($model, 'upi', GxHtml::listDataEx(UPI::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'upiaggregationrulestart'); ?>
		<?php echo $form->dropDownList($model, 'upiaggregationrulestart', GxHtml::listDataEx(UPIAggregationRuleStart::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'upiaggregationruleresponseof'); ?>
		<?php echo $form->dropDownList($model, 'upiaggregationruleresponseof', GxHtml::listDataEx(UPIAggregationRuleResponseOf::model()->findAllAttributes(null, true)), array('prompt' => Yii::t('app', 'All'))); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'latitude'); ?>
		<?php echo $form->textField($model, 'latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'longitude'); ?>
		<?php echo $form->textField($model, 'longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'currentTime'); ?>
		<?php echo $form->textField($model, 'currentTime'); ?>
	</div>

	<div class="row buttons">
		<?php echo GxHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
