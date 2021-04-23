<?php
if(isset($_GET["form"])){
    Path::incModules($_GET["form"]);
}else{
    Path::incModules();
}
?>