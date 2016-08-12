<?php

/* 
Copyright (c) 2016 David Tobar alias DavidZas

Permission is hereby granted, free of charge, to any person obtaining a copy of this software
and associated documentation files (the "Software"), to deal in the Software without restriction,
including without limitation the rights to use, copy, modify, merge, publish, distribute,
sublicense, and/or sell copies of the Software, and to permit persons to whom the Software 
is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or
substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('content-type: application/json; charset=utf-8');


require_once dirname(__FILE__) . '/Security.php';

require_once dirname(__FILE__) . '/Printer.php';
$_POST = json_decode(file_get_contents('php://input'), true);
$seguridad = new Security();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['data'])){
        
        $data=$_POST['data'];
        $des=$seguridad->decrypt($data);
        if($des){
            $_POST=  json_decode($des,true);
        }else{
            die("invalid data"); 
        }
    }
} else if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if(isset($_GET['data'])){
        $data=$_GET['data'];    
        $_GET=  json_decode($seguridad->decrypt($data),true);
    }
}else{
    die('invalid method');
}

define('DB_USERNAME', "");
define('HOST_URL', "");
define('SCHEMA', "");
define('DB_PASSWORD', "");
date_default_timezone_set('America/Bogota');
?>


?>