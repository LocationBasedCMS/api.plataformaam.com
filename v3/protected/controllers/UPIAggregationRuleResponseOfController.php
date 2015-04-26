<?php

class UPIAggregationRuleResponseOfController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UPIAggregationRuleResponseOf'),
		));
	}

	public function actionCreate() {
		$model = new UPIAggregationRuleResponseOf;


		if (isset($_POST['UPIAggregationRuleResponseOf'])) {
			$model->setAttributes($_POST['UPIAggregationRuleResponseOf']);

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
		$model = $this->loadModel($id, 'UPIAggregationRuleResponseOf');


		if (isset($_POST['UPIAggregationRuleResponseOf'])) {
			$model->setAttributes($_POST['UPIAggregationRuleResponseOf']);

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
			$this->loadModel($id, 'UPIAggregationRuleResponseOf')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UPIAggregationRuleResponseOf');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UPIAggregationRuleResponseOf('search');
		$model->unsetAttributes();

		if (isset($_GET['UPIAggregationRuleResponseOf']))
			$model->setAttributes($_GET['UPIAggregationRuleResponseOf']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}