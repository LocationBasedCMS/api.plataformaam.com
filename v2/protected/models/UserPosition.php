<?php

Yii::import('application.models._base.BaseUserPosition');

class UserPosition extends BaseUserPosition
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}