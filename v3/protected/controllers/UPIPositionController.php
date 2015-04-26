<?php

class UPIPositionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UPIPosition'),
		));
	}

	public function actionCreate() {
		$model = new UPIPosition;


		if (isset($_POST['UPIPosition'])) {
			$model->setAttributes($_POST['UPIPosition']);

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
		$model = $this->loadModel($id, 'UPIPosition');


		if (isset($_POST['UPIPosition'])) {
			$model->setAttributes($_POST['UPIPosition']);

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
			$this->loadModel($id, 'UPIPosition')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UPIPosition');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UPIPosition('search');
		$model->unsetAttributes();

		if (isset($_GET['UPIPosition']))
			$model->setAttributes($_GET['UPIPosition']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}