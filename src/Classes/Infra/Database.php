<?php

namespace App\Infra;

use PDO;

class Database
{

    private static string $DB_DRIVER      =   'mysql';
    private static string $DB_HOST        =   'localhost';
    private static string $DB_DATABASE    =   'apirest';
    private static string $DB_USER        =   'root';
    private static string $DB_PASS        =   '';
    private PDO $connect;

    public function __construct()
    {
        $this->connect = new PDO(           $this->DB_DRIVER    . ':' .     // Driver
                                'host='   . $this->DB_HOST      . ';' .     // Host 
                                'dbname=' . $this->DB_DATABASE,             // DB Name
                                            $this->DB_USER,                 // DB User
                                            $this->DB_PASS                  // DB Pass
                            );
    }

    private static function createBinds(int $qtd) : string
    { // This method create binds 
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

    private static function formatCondition(array $condition) : string
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

    public static function create(
        string $tableName,
        array $data,
        array $condition
    )
    { // Insert data into database
    }

    public static function read(
        string $tableName,
        array $data,
        array $condition
    )
    { // Read data from data base
        
    }

    public static function update(
        string $tableName,
        array $data,
        array $condition
    )
    { // Update data from database
        // 
    }

    public static function delete(
        string $tableName,
        array $data,
        array $condition
    )
    { // Delete data from database
        
    }

}