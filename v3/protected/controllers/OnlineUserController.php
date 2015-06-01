<?php

class OnlineUserController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'OnlineUser'),
		));
	}

	public function actionCreate() {
		$model = new OnlineUser;


		if (isset($_POST['OnlineUser'])) {
			$model->setAttributes($_POST['OnlineUser']);

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
		$model = $this->loadModel($id, 'OnlineUser');


		if (isset($_POST['OnlineUser'])) {
			$model->setAttributes($_POST['OnlineUser']);

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
			$this->loadModel($id, 'OnlineUser')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('OnlineUser');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new OnlineUser('search');
		$model->unsetAttributes();

		if (isset($_GET['OnlineUser']))
			$model->setAttributes($_GET['OnlineUser']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}