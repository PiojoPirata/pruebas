
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function reemplazacaracter($cadena)
    {
        $original= array(
                        "1"=>"á",
                        "2"=>"é",
                        "3"=>"í",
                        "4"=>"ó",
                        "5"=>"ú",
                        "6"=>"ñ",
                        "7"=>"º",
                        "8"=>"\"",
                        );
        $reemplazo= array(
                        "1"=>"a",
                        "2"=>"e",
                        "3"=>"i",
                        "4"=>"o",
                        "5"=>"u",
                        "6"=>"n",
                        "7"=>" ",
                        "8"=>" ",
                        );
        $count = count($original);
        
        for ($i=1;$i<=$count;$i++){
            if ($i==7){
                $find = $original[$i]; 
                $repl = $reemplazo[$i];
                $cadena = str_replace ($find, $repl, utf8_encode($cadena));    
            }else{
                $find = $original[$i]; 
                $repl = $reemplazo[$i];
                $cadena = str_replace ($find, $repl, $cadena);    
            }
            
        }
         return $cadena;
    }
