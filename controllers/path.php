<?php
class Path{
    static $module;
    public function __construct(){}
    public static function validateModules($module){
        //validar que module este agregado a la lista
        foreach(MODULES as $value){
            if($value[0] == $module){
                return true;
            }
        }
        return false;
    }
    public static function incModules($folder = HOME_PAGE){
        //include segun varaible form
        $validar = self::validateModules($folder);
        if(!$validar){
            $folder = HOME_PAGE;
        }
        self::incSubcontrollers($folder);
        include("./modules".PATH.$folder.PATH.$folder.HOME_FILE.EXT);
    }
    public static function incSubcontrollers($folder){
        //include controlladores de los modulos
        include("./modules/".$folder."/controllers/".$folder."Controllers.php");
    }
    public static function incSubmodules($folder, $file){}
    public static function incControllers($folder){}
}
?>