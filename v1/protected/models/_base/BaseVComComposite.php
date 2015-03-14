<?php

/**
 * This is the model base class for the table "VComComposite".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "VComComposite".
 *
 * Columns in table "VComComposite" available as properties of the model,
 * followed by relations of table "VComComposite" available as properties of the model.
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $virtualspace
 * @property integer $vcomcomposite
 * @property integer $createruser
 *
 * @property VComBase[] $vComBases
 * @property VirtualSpace $virtualspace0
 * @property VComComposite $vcomcomposite0
 * @property VComComposite[] $vComComposites
 * @property VComUserRole[] $vComUserRoles
 */
abstract class BaseVComComposite extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'VComComposite';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'VComComposite|VComComposites', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('id, name, virtualspace', 'required'),
			array('id, virtualspace, vcomcomposite, createruser', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>100),
			array('description', 'safe'),
			array('description, vcomcomposite, createruser', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, description, virtualspace, vcomcomposite, createruser', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'vComBases' => array(self::HAS_MANY, 'VComBase', 'vcomcomposite'),
			'virtualspace0' => array(self::BELONGS_TO, 'VirtualSpace', 'virtualspace'),
			'vcomcomposite0' => array(self::BELONGS_TO, 'VComComposite', 'vcomcomposite'),
			'vComComposites' => array(self::HAS_MANY, 'VComComposite', 'vcomcomposite'),
			'vComUserRoles' => array(self::HAS_MANY, 'VComUserRole', 'vcomcomposite'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'description' => Yii::t('app', 'Description'),
			'virtualspace' => null,
			'vcomcomposite' => null,
			'createruser' => Yii::t('app', 'Createruser'),
			'vComBases' => null,
			'virtualspace0' => null,
			'vcomcomposite0' => null,
			'vComComposites' => null,
			'vComUserRoles' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('virtualspace', $this->virtualspace);
		$criteria->compare('vcomcomposite', $this->vcomcomposite);
		$criteria->compare('createruser', $this->createruser);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}