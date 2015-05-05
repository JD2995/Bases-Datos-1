<?php
// esta funcion es la que usamos en la separacion de los datos obtenidos como resultado de consultas a la base de datos
// el objetivo es retornar una lista con datos
// los parametros son un string y un delimitador, el objetivo de la funcion es separar los datos segun el delimitador que se le pase como parametro
function getCSVValues($string, $separator=",")

	{
	    $elements = explode($separator, $string);
	    for ($i = 0; $i < count($elements); $i++) {
	        $nquotes = substr_count($elements[$i], '"');
	        if ($nquotes %2 == 1) {
	            for ($j = $i+1; $j < count($elements); $j++) {
	                if (substr_count($elements[$j], '"') %2 == 1) { // Look for an odd-number of quotes
	                    // Put the quoted string's pieces back together again
	                    array_splice($elements, $i, $j-$i+1,
	                        implode($separator, array_slice($elements, $i, $j-$i+1)));
	                    break;
	                }
	            }
	        }
	        if ($nquotes > 0) {
	            // Remove first and last quotes, then merge pairs of quotes
	            $qstr =& $elements[$i];
	            $qstr = substr_replace($qstr, '', strpos($qstr, '"'), 1);
	            $qstr = substr_replace($qstr, '', strrpos($qstr, '"'), 1);
	            $qstr = str_replace('""', '"', $qstr);
	        }
	    }
	    return $elements;
	}
?>