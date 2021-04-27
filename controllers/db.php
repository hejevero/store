<?php
class Connection{
    private $server;
    private $host;
    private $user;
    private $pass;
    public $connection;
    private function __construct(){
        $this->server = DB_NAME;
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->pass = DB_PASS;
        $connection = mysqli($this->host,$this->user,$this->pass,$this->name);
        $connection->set_charset("utf-8");
    }
    public static function publicMessage($state = "not", $message = null){
        if($message == "ok"){
            $_SESSION["publicMessage"] = "Proceso realizado sin problemas (".$message.").";
            return true;
        }
        $_SESSION["publicMessage"] = "Problemas en el proceso (".$message.").";
        return false;
    }
    public static function validateQuery($query){
        if($query){
            return self::publicMessage("ok");
        }
        return self::publicMessage("not");
    }
    public static function completeSearch($table){
        $query = $connection->query("SELECT * FROM $table");
        if(self::validateQuery($query)){
            return $query->fetch_all(MYSQLI_ASSOC);
        }
    }
    public static function conditionSearch($table, $condition){
        $query = $connection->query("SELECT * FROM $table WHERE $condition ;");
        return self::validateQuery($query);
    }
    public static function conditionInsert($table, $condition){
        $query = $connection->query("INSERT INTO $table VALUES ($condition);");
        return self::validateQuery($query);
    }
    public static function conditionUpdate($table, $value, $condition){
        $query = $connection->query("UPDATE $table SET $value WHERE $condition");
        return self::validateQuery($query);
    }
}
?>