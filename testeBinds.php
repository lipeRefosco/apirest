<?php

function createBinds(int $qtd) : string
    {
        $bindsCreated = '';

        for ($i=0; $i < $qtd; $i++) { 
            if( $i === 0 ){
                $bindsCreated .= '?';
            }else{
                $bindsCreated .= ', ?';
            }
        }

        return $bindsCreated;
    }

echo createBinds(5);