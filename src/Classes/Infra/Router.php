<?php

    namespace App\Infra;

    class Router
    {
        private static string $wraperEndPoint = 'endpoint';
        private static string $service;
        private static $serviceContent;
        private static string $requestMethod;

        private static array $data;

        public static function handler(
                                        array $endPoint,          // $_GET
                                        array $serverInformation, // $_SERVER
                                        array $dataRequest        // $_REQUEST
                                ) : void
        { // This method set service and requestMethod
            
            self::$service        =  self::setService( $endPoint );
            self::$serviceContent =  self::setServiceContent( $endPoint );
            self::$requestMethod  =  self::setRequestMethod( $serverInformation );
            self::$data           =  self::setData( $dataRequest ); 
        }

        private static function setService( array $endPoint ) : string
        { // Will set service if the class Service exist
            
            // Verify if calling a endpoint
            if( $endPoint[ self::$wraperEndPoint ] === null ){
                Response::json("Endpoint não definido!");
                exit();
            }
            
            // Split the EndPoint
            $route = explode('/', $endPoint[ self::$wraperEndPoint ]);

            if( !isset($route[0]) ){
                Response::json("Servico indefinido!");
                exit();    
            }
            
            return $route[0];

        }

        private static function setServiceContent( array $endPoint )
        {
            $route = explode('/', $endPoint[ self::$wraperEndPoint ]);
            $contentId = $route[1];

            if( is_int($contentId) ){
                return $contentId;
            } else {
                return null;
            }
        }

        private static function setRequestMethod( array $request ) : string
        {

            if( !isset($request['REQUEST_METHOD']) ){
                Response::json('Metodo indefinido!');
                exit();
            }

            return strtolower( $request['REQUEST_METHOD'] );
        }

        private static function setData( array $dataRequest ) : array
        {
            // Filtrar as primeiras keys do array do reques 
            unset($dataRequest[ self::$wraperEndPoint ]);
            
            return $dataRequest;
        }

        private static function verifyService( string $service )
        {
            if(!class_exists($service)){
                Response::json("Serviço inexistente!");
                exit();
            }
        }

        public static function go() : void
        {
            self::verifyService( self::$service );
            
            // Call Service Referenced
            call_user_func_array(
                [
                    'App\\Domain\\Services\\' . // Namespace to all Services
                    self::$service,            // Call Service.
                    self::$requestMethod       // Call Service Method based from Request Method
                ],
                [self::$data]
            );
        

        }

    }