<?php

class VComUserRoleController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VComUPIPublication'),
		));
	}

	public function actionCreate() {
		$model = new VComUPIPublication;


		if (isset($_POST['VComUPIPublication'])) {
			$model->setAttributes($_POST['VComUPIPublication']);

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
		$model = $this->loadModel($id, 'VComUPIPublication');


		if (isset($_POST['VComUPIPublication'])) {
			$model->setAttributes($_POST['VComUPIPublication']);

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
			$this->loadModel($id, 'VComUPIPublication')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VComUPIPublication');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VComUPIPublication('search');
		$model->unsetAttributes();

		if (isset($_GET['VComUPIPublication']))
			$model->setAttributes($_GET['VComUPIPublication']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}