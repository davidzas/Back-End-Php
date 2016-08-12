# Back-End-Php
Php back end with oracle intended for angularjs. Works with https://github.com/davidzas/Angular-Ajax-Encrypt

# Installation
1. Download or clone this repository
2. Enter in /classes/Config.php
3. Set the varaibles described below:
``` php
  define('DB_USERNAME', "");
  define('HOST_URL', "");
  define('SCHEMA', "");
  define('DB_PASSWORD', "");
  date_default_timezone_set('America/Bogota');
```

4. Edit the /classes/Security.php file and add a key:
``` php
 $secret_key = 'super aswesome and secure key kappa';
```
5. Yor are done with basic configuration. Now Create a Class by yourself or check the Example Class to see how it works

# Example
Within the classes folder there is a Example Class which use the Connection class called Conexion_OC (i´m spanish). This class DOES NOT CONNECTS until you perform a query or select. You should use the example controller to see how the entire thing calls the respective class and calls a method.


# credits
Gibberish AES https://github.com/ivantcholakov/gibberish-aes-php

# Licence
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
