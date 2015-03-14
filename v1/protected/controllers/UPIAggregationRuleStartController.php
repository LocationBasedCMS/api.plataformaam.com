<?php

class UPIAggregationRuleStartController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UPIAggregationRuleStart'),
		));
	}

	public function actionCreate() {
		$model = new UPIAggregationRuleStart;


		if (isset($_POST['UPIAggregationRuleStart'])) {
			$model->setAttributes($_POST['UPIAggregationRuleStart']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'UPIAggregationRuleStart');


		if (isset($_POST['UPIAggregationRuleStart'])) {
			$model->setAttributes($_POST['UPIAggregationRuleStart']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'UPIAggregationRuleStart')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UPIAggregationRuleStart');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UPIAggregationRuleStart('search');
		$model->unsetAttributes();

		if (isset($_GET['UPIAggregationRuleStart']))
			$model->setAttributes($_GET['UPIAggregationRuleStart']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}