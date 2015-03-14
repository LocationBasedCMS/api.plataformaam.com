<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('upi')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->upi0)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('editiontime')); ?>:
	<?php echo GxHtml::encode($data->editiontime); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('latitude')); ?>:
	<?php echo GxHtml::encode($data->latitude); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('longitude')); ?>:
	<?php echo GxHtml::encode($data->longitude); ?>
	<br />

</div>