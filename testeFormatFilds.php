<?php


function formatFilds( array $rawFilds) : string
    {
        if( count($rawFilds) ){

            $formatedFilds = '';

            for( $i = 0; $i < count($rawFilds); $i++ ){
                if( $i === count($rawFilds) - 1){
                    $formatedFilds .= $rawFilds[$i];
                }else{
                    $formatedFilds .= $rawFilds[$i] . ', ';
                }
            }
            return $formatedFilds;
        }else{
            return '';
        }
    }


echo formatFilds([0, 'asdasd', 'teste']);