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
                
       
       public function  restEvents(){
           
            $this->onRest('model.hidden.properties', function() {
                return ['password','user0.password','user.password'];
            });
           
           $this->onRest('req.cors.access.control.allow.origin', function() {
                return ['http://painelpedagogico.plataformaam.com']; //List of sites allowed to make CORS requests 
            });
            
            $this->onRest('req.cors.access.control.allow.methods', function() {
                return ['GET', 'POST', 'PUT', 'DELETE']; //List of allowed http methods (verbs) 
            });
            
            $this->onRest('req.cors.access.control.allow.headers', function($application_id) {
                 return ["X_REST_CORS",'HTTP_X_REST_USERNAME','HTTP_X_REST_PASSWORD'];
            });
            
       }
  
}