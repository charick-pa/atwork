<?php
    $db_name = 'mysql:host=localhost;dbname=shop_db';
    $db_user = 'root';
    $db_password = '';

    $con = new PDO($db_name,$db_user, $db_password);
    if ($con){
        echo "connected";
    }
    function unique_id(){
        $chars = '0123456789abcdefghijklmnopqrstuvwaABCDFGHIJKLMNOPQRSTUVWXYZ';
        $charLength = strlen($chars);
        $randomSring = '';
        for ($i=0; $i < 20 ; $i++){
            $randomSring.=$chars[mt_rand(0, $charLength - 1)];
        }
        return $randomSring;
    }



?>