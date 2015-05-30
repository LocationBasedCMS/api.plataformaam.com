<?php

/**************************************************************************
 *   Algoritmo
 *   
 *   $positionss = SELECT * POsition+User DATE > TIMExxx
 *   foreach( $positions )
 *          Busca VCLoc em que se encontra 
 *   Insere  $positions -> onlineUSer
 * 
 * 
 * 
 *  
 *          
 * 
 ******************************************************************************/

ini_set('display_errors', 1);
define("TIME_REFERENCE", 1);

require_once  '/opt/api.plataformaam.com/upload.config.php';

$time_reference = TIME_REFERENCE;
//Adiciona novas posições 
$sql_insert_positions = "
    INSERT IGNORE INTO OnlineUser (
        user, 
        user_name, 
        content, 
        latitude,
        longitude, 
        time, 
        composite, 
        composite_name,
        base, 
        base_name,
        upi ,
        upi_type
    
    )    
    SELECT 
        u.id as user, 
        u.name as user_name, 
        up.content, 
        up.latitude,
        up.longitude, 
        up.currentTime, 
        up.vcomcomposite as composite, 
        c.name as composite_name,
        up.vcombase as base, 
        b.name as base_name,
        up.upi as upi ,
        p.upitype as upi_type
    FROM 
          `UserPosition` up 
        INNER JOIN 
            User u ON u.id = up.user 
        LEFT JOIN
                VComComposite c 
        ON c.id = up.vcomcomposite
        LEFT JOIN
                VComBase b
        ON b.id = up.vcombase
        LEFT JOIN
            UPI p 
	ON p.id = up.upi
    WHERE up.currentTime >= DATE_SUB(NOW(), INTERVAL $time_reference HOUR)
    ";
mysql_query($sql_insert_positions);
$count_insert = mysql_affected_rows();

//Delete posições antigas
$sql_delete_old_positions = "
    DELETE
    FROM `OnlineUser`
    WHERE
      `time` <= DATE_SUB(NOW(), INTERVAL $time_reference HOUR)
";
mysql_query($sql_delete_old_positions);
$count_delete = mysql_affected_rows();
echo  json_encode(
    array(
        "posicoes" => array(
            "inserted" => $count_insert,
            "deleted" => $count_delete,
        )
    )
);





        
        

