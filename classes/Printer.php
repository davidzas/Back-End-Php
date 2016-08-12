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

class Printer {

    function __construct() {
        
    }

    public static function success($datos = "") {
        if (is_array($datos)) {
            self::imprimir($datos);
        } else {
            self::imprimir(array("success" => true, "msg" => "Operación Exitosa"));
        }
    }

    public static function error($error = "Error desconocido") {
        if (is_array($error)) {
            self::imprimir(array("success" => false, "msg" => "Ver error", "error" => $error));
        } else {
            self::imprimir(array("success" => false, "msg" => $error));
        }
    }

    public static function datos($datos = array(),$success=true) {
        if (!$success) {
            self::imprimir($datos);
        } else {
            self::imprimir(array("success" => true, "datos" => $datos));
        }
    }

    private function imprimir($var,$kill=false) {
        
        $var = json_encode($var);
        $seguridad=new Security();
        echo json_encode(array("data"=>$seguridad->encrypt($var)));
        //die();
    }

}

?>