<?php
require 'Dev.php';
require 'userSystem.php';
class DataBaseClass
{
    private $pdo;
    public $info;
    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=docker-mysql-1;dbname=user_db", 'root', 'password');
        $this->StartServer();
    }

    public function StartServer(){
        $sqlCreateTable = 'CREATE TABLE IF NOT EXISTS `userSystem` ( `id` int AUTO_INCREMENT, `login` varchar(120), `password` varchar(120), PRIMARY KEY(`id`));';
        $this->pdo->exec($sqlCreateTable);
    }

    public function insertInformation($login, $password){
        $sqlInsert = 'INSERT INTO `userSystem` (`id`, `login`, `password`) VALUES (NULL, \''.$login.'\', \''.$password.'\');';
        $this->pdo->exec($sqlInsert);
    }

    public function selectTable(){
        $unbufferedResult = $this->pdo->query("SELECT * FROM userSystem");
        $usersList = [];
        foreach ($unbufferedResult->fetchAll() as $user){
            $usersList[] = new userSystem($user['id'], $user['login'], $user['password']);
        }
        return $usersList;
    }
}