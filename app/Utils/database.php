<?php

// Espace de nom
namespace MVC\Utils\DB;

// On utilisera la classe PDO et sa classe d'exceptions PDOException
use PDO, PDOException;

// Classe en Singleton ne pouvant juste être appelée 
// statiquement par la méthode getInstance()
class Database
{

    private PDO $cnx;
    private static $connect = null;

    private function __construct()
    {
        global $conf;
        // DSN : Data Source Name
        // 'mysql:host=localhost;dbname=oop'
        try {
            $this->cnx = new PDO(
                'mysql:host=' . $conf['db']['host'] . ';dbname=' . $conf['db']['database'],
                $conf['db']['user'],
                $conf['db']['password'],
                [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
            );
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $message = 'Une Erreur est survenue ! ' . $e->getMessage() . '<hr>';
            die($message);

        }
    }

    public static function getInstance(): ?Database
    {
        if (is_null(self::$connect)) {
            self::$connect = new Database;
        }
        return self::$connect;
    }

    public function requete($sql, $fetchmode = 'fetchAll')
    {
        try {
            $result = $this->cnx->query($sql, PDO::FETCH_ASSOC)->{$fetchmode}();
        } catch (PDOException $e) {
            $message = 'Une Erreur est survenue ! ' . $e->getMessage() . '<hr>';
            die($message);
        }
        return $result;
    }

    public function inserer($table, $data) : bool
    {

        // On récupère les nom de champs dans les clés du tableau
        $fields = array_keys($data);

        // On récupère les valeurs
        $values = array_values($data);

        // On construit la chaine des paramètres ':p0,:p1,:p2,...'
        $params = [];
        foreach ($values as $key => $value) {
            array_push($params, ':p' . $key);
        }
        $params_str = implode(',', $params);

        // On prépare la requête
        $reqInsert = 'INSERT INTO ' . $table . '(' . implode(',', $fields) . ')';
        $reqInsert .= ' VALUES(' . $params_str . ')';

        $prepared = $this->cnx->prepare($reqInsert);
        // On lie les données à la reqête
        foreach ($values as $key => $value) {
            $format = PDO::PARAM_STR;
            $format = match (gettype($value)) {
                'NULL' => PDO::PARAM_NULL,
                'integer' => PDO::PARAM_INT,
                'boolean' => PDO::PARAM_BOOL,
                default => PDO::PARAM_STR,
            };
            $prepared->bindParam(':p' . $key, $values[$key], $format);
        }
        // On exécute la requête et on revoie le résultat
        return $prepared->execute();
    }

}






