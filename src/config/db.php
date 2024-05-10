<?php
class db {

    private $dbhost = 'a2nlmysql39plsk.secureserver.net:3306';
    private $dbuser = 'cheemsits';
    private $dbpass = 'c@iu#499POM.s';
    private $dbname = 'cwdb';

    public function connect() {
        $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname; charset=utf8";
        $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
        $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConnection;
    }
    
}

?>