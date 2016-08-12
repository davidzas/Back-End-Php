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

include_once dirname(__FILE__).'/GiberrishAES.php';
Class Security {

    private $output;
    private $encrypt_method;
    private $key;
    private $iv;

    public function __construct() {
        $this->output = false;

        $this->encrypt_method = "AES-256-CBC";
        $secret_key = '';
        

        // hash
        $this->key =$secret_key;      
        $this->iv = substr(hash('sha256', $secret_iv), 0, 16);
        
    }

    public function encrypt($string) {
        GibberishAES::size(256);
        $this->output = GibberishAES::enc(($string), $this->key);
        $this->output = base64_encode($this->output);
        return $this->output;
    }

    public function decrypt($string) {
        
        GibberishAES::size(256);

        $this->output = GibberishAES::dec(base64_decode($string), $this->key);
        
        return $this->output;
    }

}
