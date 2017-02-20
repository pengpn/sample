<?php
/**
 * Created by PhpStorm.
 * User: pnpeng
 * Date: 2017/2/20
 * Time: 16:47
 */
function get_db_config()
{
    if (getenv('IS_IN_HEROKU')){
        $url = parse_url(getenv("DATABASE_URL"));

        return $db_config = [
          'connection' => 'pgsql',
            'host' => $url["host"],
            'database' => substr($url["path"],1),
            'username' => $url["user"],
            'password' => $url["pass"],
        ];
    } else {
        return $db_config = [
            'connetion' => env('DB_CONNECTION', 'mysql'),
            'host' => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'forge'),
            'username'  => env('DB_USERNAME', 'forge'),
            'password'  => env('DB_PASSWORD', ''),
        ];
    }
}