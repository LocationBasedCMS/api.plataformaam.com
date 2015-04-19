<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
        
        
        
        public function filters()
        {
                return array(
                    'accessControl', // perform access control for CRUD operations
                    array(
                        'ext.starship.restfullyii.filters.ERestFilter + 
                        REST.GET, REST.PUT, REST.POST, REST.DELETE, REST.OPTIONS'
                    ),
                );
        }

        public function actions()
        {
        
            return array(
                'REST.'=>'ext.starship.restfullyii.actions.ERestActionProvider',
            );
        }
        
        
        public function restEvents()
        {
            $this->onRest('model.hidden.properties', function() {
                return ['password','user0.password','user.password'];
            });
            
            //TO-DO
            //Definir usuários com acesso aos métodos REST
            //This assumes you have created these roles (REST-GET, REST-PUT, REST-POST, REST-DELETE):
            $this->onRest('req.auth.uri', function($uri, $verb) {
                return true;
                
                switch ($verb) {
                    case 'GET':
                        return Yii::app()->user->checkAccess('REST-GET');
                        break;
                    case 'POST':
                        return Yii::app()->user->checkAccess('REST-POST');
                        break;
                    case 'PUT':
                        return Yii::app()->user->checkAccess('REST-PUT');
                        break;
                    case 'DELETE':
                        return Yii::app()->user->checkAccess('REST-DELETE');
                        break;
                    case 'OPTIONS':
                        return Yii::app()->user->checkAccess('REST-OPTIONS');
                        break;                    
                    default:
                        return false;
                        break;
                    }
                });
                

            $this->onRest('req.cors.access.control.allow.origin', function() {
                return ["http://painelpedagogico.plataformaam.com"]; //List of sites allowed to make CORS requests 
            });
            
            $this->onRest('req.cors.access.control.allow.headers', function() {
                return [
                    'Origin, Access-Control-Request-Method, X_REST_CORS,X-Requested-With,Content-Type,HTTP_X_REST_USERNAME,HTTP_X_REST_PASSWORD,http_x_rest_username, 
    http_x_rest_password, usexdomain, x_rest_cors, accept'
                ];
            });            
            
            $this->onRest('req.cors.access.control.allow.methods', function() {
                return ['GET', 'POST', 'PUT', 'DELETE','OPTIONS']; //List of allowed http methods (verbs) 
            });            
            
            $this->onRest('config.application_id', function() {
                 return 'REST';
            });
        }

        public function accessRules()
        {
                return array(
                    array('allow', 'actions'=>array('REST.GET', 'REST.PUT', 'REST.POST', 'REST.DELETE'),
                    'users'=>array('*'),
                    ),
                    array('deny',  // deny all users
                        'users'=>array('*'),
                    ),
                );
        }        
        
  
}