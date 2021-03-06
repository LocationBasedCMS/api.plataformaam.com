<?php

class VComUPIAggregationRuleResponseOfController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VComUPIAggregationRuleResponseOf'),
		));
	}

	public function actionCreate() {
		$model = new VComUPIAggregationRuleResponseOf;


		if (isset($_POST['VComUPIAggregationRuleResponseOf'])) {
			$model->setAttributes($_POST['VComUPIAggregationRuleResponseOf']);

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
		$model = $this->loadModel($id, 'VComUPIAggregationRuleResponseOf');


		if (isset($_POST['VComUPIAggregationRuleResponseOf'])) {
			$model->setAttributes($_POST['VComUPIAggregationRuleResponseOf']);

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
			$this->loadModel($id, 'VComUPIAggregationRuleResponseOf')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VComUPIAggregationRuleResponseOf');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VComUPIAggregationRuleResponseOf('search');
		$model->unsetAttributes();

		if (isset($_GET['VComUPIAggregationRuleResponseOf']))
			$model->setAttributes($_GET['VComUPIAggregationRuleResponseOf']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}