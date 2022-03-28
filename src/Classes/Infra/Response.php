<?php

    namespace App\Infra;

    class Response
    {
        public static function json( $message ) : void
        { // Print json format message
            if( is_array($message) || is_string($message) ){
                echo json_encode( $message );
            }else{
                echo json_encode("Apenas Array e String!");
            }
        }
    }
    