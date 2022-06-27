<?php 
$con = mysqli_connect("localhost", "root", "@123", "project");
date_default_timezone_set('America/Sao_Paulo');

if(mysqli_error($con)){
    echo "Erro ao conectar o banco de dados ! ".mysqli_error($con);
}
class UserInfo{

    private static function get_user_agent() {
        return  $_SERVER['HTTP_USER_AGENT'];
    }

    public static function get_ip() {
        $Ip = '';
        if (getenv('HTTP_CLIENT_IP'))
            $Ip = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $Ip = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $Ip = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $Ip = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $Ip = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $Ip = getenv('REMOTE_ADDR');
        else
            $Ip = 'Desconhecido';
        return $Ip;
    }
}

?>