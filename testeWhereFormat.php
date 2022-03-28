<?php

function formatCondition(array $condition) : string
{
    // Will check if have some item into array
    if( count($condition) ){

        
        $condKeys = array_keys($condition);
        $condValues = array_values($condition);
        $where = '';

        // This for will scan the values checking if they are string 
        for($i = 0; $i < count($condition); $i++){ 
            if( is_string($condValues[$i]) ){
                if($i === count($condition) - 1){
                    $where .= $condKeys[$i] . "='" . $condValues[$i] . "'";
                }else{
                    $where .= $condKeys[$i] . "='" . $condValues[$i] . "' AND ";
                }
            }else{
                if($i === count($condition) - 1){
                    $where .= $condKeys[$i] . "=" . $condValues[$i];
                }else{
                    $where .= $condKeys[$i] . "=" . $condValues[$i] . " AND ";
                }
            }
        }

        return "WHERE $where;";
    }else{
        //
        return '';
    }
}

echo formatCondition([
    "key1" => "Valor 1",
    "key2" => "Valor 2",
    "key3" => "Valor 3",
    "key4" => 3
]);