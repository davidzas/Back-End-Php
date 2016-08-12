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

require_once dirname(__FILE__) . '/Config.php';

class Conexion_OC {

    private $con;

    function __construct() {
        
    }

    private function conectar() {
        if (!$this->con) {
            $this->con = oci_connect(DB_USERNAME, DB_PASSWORD, HOST_URL . '/' . SCHEMA);
            if (!$this->con) {
                $e = oci_error();
                Printer::error("An error occurred during the attempt to connect to the database: " . $e);
            } 
        }
    }

    public function desconectar() {
        if ($this->con) {
            oci_close($this->con);
        }
    }

    public function query($params, $sql) {
        if (!$params || !$sql) {
            return false;
        } else {
            $this->conectar();
            try {
                $stmt = oci_parse($this->con, $sql);

                foreach ($params as $p) {
                    oci_bind_by_name($stmt, $p['name'], $p['value'], $p['length']);
                }
                $r = oci_execute($stmt);
                if ($r) {
                    
                    return true;
                } else {
                    
                    $e = oci_error($stmt);
                    
                    Printer::error($e);
                    return false;
                }
            } catch (Exception $exc) {
                $e = oci_error();
                Printer::error($e);
                return false;
            }
        }
    }

    public function select($sql) {
        $this->conectar();
        $stid = oci_parse($this->con, $sql);
        $rta = array();
        oci_execute($stid);
        while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
            // The data obtained in the query are associated with an array which can be accessed through capitalization according to the columns in the database
            $rta[] = $row;
        }
        if (oci_error()) {
            print_r(oci_error());
        }
        

        return $rta;
    }

    public function excecute($sql) {
        $this->conectar();
        $stid = oci_parse($this->con, $sql);
        $r = oci_execute($stid);
        if ($r) {
            
            return true;
        } else {
            $e = oci_error($stmt);
            
            Printer::error($e);
        }
    }

}

?>
