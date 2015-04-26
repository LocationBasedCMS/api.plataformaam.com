<?php

class VComUserRoleController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'VComUserRole'),
		));
	}

	public function actionCreate() {
		$model = new VComUserRole;


		if (isset($_POST['VComUserRole'])) {
			$model->setAttributes($_POST['VComUserRole']);
			$relatedData = array(
				'users' => $_POST['VComUserRole']['users'] === '' ? null : $_POST['VComUserRole']['users'],
				);

			if ($model->saveWithRelated($relatedData)) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'VComUserRole');


		if (isset($_POST['VComUserRole'])) {
			$model->setAttributes($_POST['VComUserRole']);
			$relatedData = array(
				'users' => $_POST['VComUserRole']['users'] === '' ? null : $_POST['VComUserRole']['users'],
				);

			if ($model->saveWithRelated($relatedData)) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'VComUserRole')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('VComUserRole');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new VComUserRole('search');
		$model->unsetAttributes();

		if (isset($_GET['VComUserRole']))
			$model->setAttributes($_GET['VComUserRole']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}