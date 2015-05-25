<?php

class ImageController extends GxController {


	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'Image'),
		));
	}

	public function actionCreate() {
		$model = new Image;


		if (isset($_POST['Image'])) {
                    
                        $rnd = rand(0,9999);  // generate random number between 0-9999
			$model->setAttributes($_POST['Image']);

                        $uploadedFile=CUploadedFile::getInstance($model,'image');
                        $fileName = "{$rnd}-{$uploadedFile}";               // random number + file name
                        $model->url = $fileName;                            // Acertado a URL
                        
			if ($model->save()) {
                            $uploadedFile->saveAs(Yii::app()->basePath.'/../images/'.$fileName); // image will uplode to rootDirectory/images/
                            
                            
                            if (Yii::app()->getRequest()->getIsAjaxRequest())
                                    Yii::app()->end();
                            else
                                    $this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'Image');


		if (isset($_POST['Image'])) {
                        $_POST['Image']['image'] = $model->url;  //Obtem o nome da imagem a ser sobreescrita
			$model->setAttributes($_POST['Image']);

                        $uploadedFile=CUploadedFile::getInstance($model,'image');   //Salva a imagem em uma variável.
                        
			if ($model->save()) {
                                if(!empty($uploadedFile))  // check if uploaded file is set or not
                                {
                                    $uploadedFile->saveAs(Yii::app()->basePath.'/../images/'.$model->url);
                                }
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Image')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('Image');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new Image('search');
		$model->unsetAttributes();

		if (isset($_GET['Image']))
			$model->setAttributes($_GET['Image']);

		$this->render('admin', array(
			'model' => $model,
		));
	}
        


}