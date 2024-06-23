<?php
//requerir una sola vez al archivo config.php
require_once("config.php");
//phpinfo();
//var_dump(urlsite); -->comprobar como esta el sitio
require_once("controlador/main.php");

if(isset($_GET['m'])): //existe valor?
    //existe metodo de ese valor?
    if(method_exists("modeloController",$_GET['m'])):
        modeloController::{$_GET['m']}();
    endif;
else:  //sino por default muestra este metodo
    modeloController::index();
    endif;
