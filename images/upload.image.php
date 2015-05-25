<?php

/**************************************************************************
 *   Algoritmo
 * 
 * 
 *    IF ( Verificar Login e Password &&   Verificar envio do arquivo )
 *      Renomear arquivo ($arquivo,$novoNome)
 *      Salvar Arquivo($arquivo) 
 *      IF( TestarArquivoSalvo )
 *          Salvar( Tablea = Images,  { url : $novoNome } )
 *          Retornar json( { url : $novoNome } ) 
 *      ELSE
 *          Retornar json { error: 'Falha ao salvar arquivo'  } 
 *   ELSE
 *      Retornar json { error: 'Falha no Login/Na recpação do Arquivo'  } 
 *          
 * 
 ******************************************************************************/

ini_set('display_errors', 1);
require_once  '/opt/api.plataformaam.com/upload.config.php';
define("UPLOAD_DIR","./uploads/");
define("URL_SERVER","http://api.plataformaam.com/images/uploads/");


$recieved_headers   =  getallheaders();
$recieved_user      = $recieved_headers['HTTP_X_REST_USERNAME'];
$recieved_password  = $recieved_headers['HTTP_X_REST_PASSWORD'];



$sql_user_test  = 
        "   SELECT count(1)
            FROM `User` 
            WHERE   
                `login` LIKE '$recieved_user' 
                AND `password` LIKE '$recieved_password' ";

//LOGIN TEST
if( mysql_result( mysql_query($sql_user_test), 0, 0) == 1 ){
    //UPLOAD TEST
    if( isset($_FILES['myFile'])){
        //NOVO NOME ARQUIVO ( Para minimizar a colisao md5(login+time)
        $new_file_name = md5($recieved_user.time());
        if( $_FILES['myFile']['type'] == "image jpeg" ){
            $new_file_name .= '.jpeg';
        }elseif( $_FILES['myFile']['type'] == "image png" ){
            $new_file_name .= '.png';
        }elseif( $_FILES['myFile']['type'] == "image bmp" ){
            $new_file_name .= '.bmp';
        }else{
            $new_file_name .= '.jpg';
        }        
        
        //MOVENDO O ARQUIVO         
        try{
            if( move_uploaded_file($_FILES['myFile']['tmp_name'], UPLOAD_DIR.$new_file_name) ){
                $sql_image_register = 
                        "INSERT INTO `db_central`.`Image` 
                        (`url`) 
                        VALUES ('".URL_SERVER.$new_file_name."') ";
                mysql_query($sql_image_register);
                if(mysql_affected_rows() == 1 ){
                    echo json_encode( array( 'url' => URL_SERVER.$new_file_name ) );
                }else{
                    echo json_encode(array("error" => "invalid register to  ". URL_SERVER.$new_file_name  ));
                }
            
            //REGISTRA O ARQUIVO SALVO
            }else{
                    echo json_encode(array("error" => "invalid move ". $_FILES['myFile']['tmp_name'] ));
            }
        } catch (Exception $e) {    
                    echo json_encode(array(
                        "error" => "invalid move (Exception) ".$e->getMessage(), 
                        "message" => $e->getMessage(), 
                        "trace" => $e->getTrace(), 
                    ));

            
        }
        
        
        
    }else{
        echo json_encode(array("error" => " 'myFile' not found" ));
    }
    
}else{
    echo json_encode(array("error" => "invalid user/password " ));
}
exit;







/*
if( isset($_FILES['myFile'])){
    
    $file_name =  $recieved_headers['HTTP_X_REST_USERNAME'].time().'code'.rand(0,1000);
    if( $_FILES['myFile']['type'] = "image jpeg" ){
        $file_name = $file_name .'.jpg';
    }
    $new_name = $uploaddir.basename($file_name);
    //{"myFile":{"name":"IMG_20121231_012328.jpg","type":"image jpeg","tmp_name":"\/tmp\/phptwmRwO","error":0,"size":1523305}}
   
    
    $data = json_encode( array("url" => $new_name ) );
    
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://api.plataformaam.com/v3/index.php/api/Image");
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers_to_send);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch) ;
    curl_close($ch);
    
    
   
    $result_array = json_decode($result);
    //var_dump($result_array);
    //{"success":"true","message":"Record Created","data":{"totalCount":"1","image":{"id":"32","url":"data"}}}
    if( $result_array->success ){
        //REGISTRO GERADO
        $move_result = move_uploaded_file($_FILES['myFile']['tmp_name'], $new_name);
        $result['move'] =$move_result;
        $result['data'] = $data;
        exit(json_encode($result_array));
        
        
    }else{
        $result['error'] = 'error - Não foi possível salvar a imgaem.';
        
    }
    
    
    
    
}else{
    $result['error'] = 'File not send -try "myFile" with a multipart form';
}
echo json_encode($result);    



*/