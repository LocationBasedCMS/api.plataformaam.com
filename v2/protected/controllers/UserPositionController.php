<?php

class UserPositionController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'UserPosition'),
		));
	}

	public function actionCreate() {
		$model = new UserPosition;


		if (isset($_POST['UserPosition'])) {
			$model->setAttributes($_POST['UserPosition']);

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
		$model = $this->loadModel($id, 'UserPosition');


		if (isset($_POST['UserPosition'])) {
			$model->setAttributes($_POST['UserPosition']);

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
			$this->loadModel($id, 'UserPosition')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('UserPosition');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new UserPosition('search');
		$model->unsetAttributes();

		if (isset($_GET['UserPosition']))
			$model->setAttributes($_GET['UserPosition']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        
        public function restEvents()
        {  
        
            
            $this->onRest('model.sort', function() {
                return isset($_GET['sort'])? $_GET['sort']: '[{"property":"currentTime","direction":"DESC"}]';
            });

            $this->onRest('model.limit', function() {
                return 100;
            }); 
            
           
        }        

}