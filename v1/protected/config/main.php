
<?php



// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'WebService RestFul',

	// preloading 'log' component
	'preload'=>array('log'),
        'aliases' => array(
            'RestfullYii' =>realpath(__DIR__ . '/../extensions/starship/restfullyii'),
        ),    

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'ext.giix-components.*', // giix components
	),

    
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		/*
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','192.168.100.101','::1'),
                    
		),
                */
                'gii' => array(
                    'class' => 'system.gii.GiiModule',
                    'generatorPaths' => array(
                            'ext.giix-core', // giix generators
                    ),
                    'password'=>'123456',
                    'ipFilters'=>array('127.0.0.1','192.168.*','192.168.1.105','192.168.25.*','::1'),
        	),
		
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
            
                'urlManager'=>array(
                    'urlFormat'=>'path',
                    'rules'=>require(
                        dirname(__FILE__).'/../extensions/starship/restfullyii/config/routes.php'
                    ),
                ),            
            /*
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
                 * 
                 */
		// uncomment the following to use a MySQL database
		'db'=>require  Yii::app()->basePath.'/opt/api.plataformaam.com/config.php' ,

		'db2'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=db_central',
			'emulatePrepare' => true,
			'username' => 'root',
                    	'password' => 'ERROR',
			'charset' => 'utf8',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning,trace, info',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
                
                'RestfullYii' => [
                    
                    
                    'req.auth.user'=>function() {
                        //return true;
                          if(isset($_SERVER['HTTP_X_REST_USERNAME']) and isset($_SERVER['HTTP_X_REST_PASSWORD'])) {
                              
                              return true;
                              $username = trim($_SERVER['HTTP_X_REST_USERNAME']);
                              $password = trim($_SERVER['HTTP_X_REST_PASSWORD']);
                              Yii::log(" LOG: Tentando Logar $username // $password ");
                              Yii::trace(" TRACE: Tentando Logar $username // $password ");
                              return true;

                              $identity=new UserIdentity($username,$password);
                              
                              if($identity->authenticate()){
                                  Yii::app()->user->login($identity,0);
                                  return true;
                              }
                              else{
                                  return false;
                              }
                          }
                          return false;
                    },
                    'req.auth.ajax.user' => function(){
                        //return true;
                        $requsetHeader = getallheaders ();
                          if(isset($requsetHeader['HTTP_X_REST_USERNAME']) and isset($requsetHeader['HTTP_X_REST_PASSWORD'])) {
                          //if(isset($_SERVER['HTTP_X_REST_USERNAME']) and isset($_SERVER['HTTP_X_REST_PASSWORD'])) {
                              
                              $username = trim($requsetHeader['HTTP_X_REST_USERNAME']);
                              $password = trim($requsetHeader['HTTP_X_REST_PASSWORD']);
                              Yii::log(" LOG: Tentando Logar $username // $password ");
                              Yii::trace(" TRACE: Tentando Logar $username // $password ");                              
                              
                              $identity=new UserIdentity($username,$password);
                              if($identity->authenticate()){
                                  Yii::app()->user->login($identity,0);
                                  return true;
                              }
                              else{
                                  return false;
                              }
                          }
                          return false;
                      },                           
                            
                ]
                
	),
);
