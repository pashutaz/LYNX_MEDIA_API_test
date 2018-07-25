<?php
/**
 * Created by PhpStorm.
 * User: pashutaz
 * Date: 23/07/2018
 * Time: 21:39
 */

require_once ('connection.php');

$paths = explode('/', $_SERVER['REQUEST_URI']);
array_shift($paths);

if ($paths[0]=='api') {

    $date = date("Y-m-d H:i:s");
    $table = $paths[1];
    $key = $paths[2];
    $arg1 = $paths[3];
    $arg2 = $paths[4];

    if (!empty($key) && strlen($key)<=25) {

        $database = new Database();
        $link = $database->connect();

        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $query = "SELECT * from `" . $table . "` WHERE `key` = '". $key ."'";
                $result = $link->query($query);
                $array_for_json=[];
                while ($row = $result->fetch_assoc()){
                    $array_for_json[] = $row;
                }
                header("HTTP/1.0 200 OK");
                header('Content-type: application/json');
                echo json_encode($array_for_json);
                break;

            case 'POST':
                if (!empty($arg1) && strlen($arg1)<=255) {
                    $query = "INSERT INTO `" . $table . "`(`name`, `key`, `created_at`, `updated_at`) values ('" . $arg1 . "', '" . $key . "', '" . $date . "', '" . $date . "' )";
                    $result = $link->query($query);
                    header("HTTP/1.0 201 Created");
                }else{
                    header("HTTP/1.0 400 Bad Request");
                }
                break;

            case 'PUT':
                if ((!empty($arg1) && filter_var($arg1,FILTER_VALIDATE_INT)) && (!empty($arg2) && strlen($arg2)<=255)){
                    $query = "UPDATE `" . $table . "` SET `name` = '" . $arg2 . "', `updated_at` = '" . $date . "' WHERE `id` = '" . $arg1 . "' AND `key` = '". $key ."' LIMIT 1";
                    $result = $link->query($query);
                    header("HTTP/1.0 200 OK");
                }else{
                    header("HTTP/1.0 400 Bad Request");
                }
                break;

            case 'DELETE':
                if (!empty($arg1) && filter_var($arg1,FILTER_VALIDATE_INT)) {
                    $query = "DELETE FROM `" . $table . "` WHERE `id` = '" . $arg1 . "' AND `key` = '" . $key . "' LIMIT 1";
                    $result = $link->query($query);
                    header("HTTP/1.0 200 OK");
                }else{
                    header("HTTP/1.0 400 Bad Request");
                }
                break;

            default:
                header("HTTP/1.0 405 Method Not Allowed");
                break;
        }
    }else{
        header("HTTP/1.0 403 Forbidden");
    }
}