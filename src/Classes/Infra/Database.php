<?php

namespace App\Infra;

use PDO;

class Database
{

    private static string $DB_DRIVER      =   'mysql';
    private static string $DB_HOST        =   'localhost';
    private static string $DB_DATABASE    =   'apirest';
    private static string $DB_USER        =   'root';
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