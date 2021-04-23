<?php
class Query extends Connection{
    public function __construct(){
        parent::__construct();
    }
    public static function select($table, $firstCol = null, $firstVal = null, $cond = null, $secondCol = null, $secondVal = null){
        if(secondCol != null){
            $query = parent::conditionSearch($table, $firstCol."=".$firstVal." ".$cond." ".$secondCol."=".$secondVal);
            return $query;
        }
        $query = parent::conditionSearch($table, $firstCol."=".$firstVal);
        return $query;
    }
    public static function insert($table){}
    public static function update($table){}
    public static function delete($table){}
}
?>