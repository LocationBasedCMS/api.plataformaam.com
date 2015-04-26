<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('user')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->user0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('vcombase')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->vcombase0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('upi')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->upi0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('upiaggregationrulestart')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->upiaggregationrulestart0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('upiaggregationruleresponseof')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->upiaggregationruleresponseof0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('latitude')); ?>:
	<?php echo GxHtml::encode($data->latitude); ?>
	<br />
	<?php /*
	<?php echo GxHtml::encode($data->getAttributeLabel('longitude')); ?>:
	<?php echo GxHtml::encode($data->longitude); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('currentTime')); ?>:
	<?php echo GxHtml::encode($data->currentTime); ?>
	<br />
	*/ ?>

</div>