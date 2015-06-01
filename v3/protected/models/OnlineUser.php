<?php

Yii::import('application.models._base.BaseOnlineUser');

class OnlineUser extends BaseOnlineUser
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}