<?php

namespace App\Infra;

use PDO;

class Database
{

    private string $DB_DRIVER      =   'mysql';
    private string $DB_HOST        =   'localhost';
    private string $DB_DATABASE    =   'apirest';
    private string $DB_USER        =   'root';
    private string $DB_PASS        =   '';
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
    { // Will format condition to SQL format
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

    private static function formatFilds( array $rawFilds) : string
    { // Will format the filds to SQL format
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

    public function create(
        string $tableName,
        array $data,
        array $condition
    )
    { // Insert data into database
        
        // Raw data
        $dataFilds = array_keys($data);
        $dataValues = array_values($data);
        
        // Formated Data 
        $dataBinds = self::createBinds( count($dataValues) );
        $fildsFormated = self::formatFilds($dataFilds);
        $whereFormated = self::formatCondition( $condition );

        // INSERT INTO `tableName` (`id`, `name`, `description`, `price`, `cat_id`) VALUES (dataValues) WHERE ;
        $sql = "INSERT INTO $tableName ($fildsFormated) VALUES ($dataBinds) $whereFormated;";
        
        $statement = $this->connect->prepare($sql);
        $statement->execute($dataValues);
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