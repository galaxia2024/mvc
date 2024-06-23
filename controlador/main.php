<?php
//invocamos el archivo
require_once("modelo/main.php");

//usamos el archivo
class modeloController{
    private $model;

    //creamos constructor
    public function __construct(){
        $this->model = new Modelo();
    }

    
    public static function index(){
        $producto = new Modelo();
        $dato = $producto->mostrar("productos","1");
        //mostrar vista
        require_once("vista/main.php");
    }
    
    //nuevo
    public static function nuevo(){
       //mostrar vista
        require_once("vista/nuevo.php");
    }

     //guardar
     public static function guardar(){
       $nombre = $_REQUEST['nombre'];
       $precio = $_REQUEST['precio'];
       $data   = "'".$nombre."',".$precio;
       $producto = new Modelo();
       $dato = $producto->insertar("productos",$data);
       header("location:".urlsite);
     }

     //editar
     public static function editar(){
        $id =$_REQUEST['id'];//recuperamos el id para la consulta
        $producto = new Modelo();
        $dato = $producto->mostrar("productos","id=". $id);
        //mostrar vista
         require_once("vista/editar.php");
     }
      //actualizar
      public static function actualizar(){
        $id = $_REQUEST['id'];
        $nombre = $_REQUEST['nombre'];
        $precio = $_REQUEST['precio'];
        $data   = "nombre='".$nombre."',precio=".$precio;
        $producto = new Modelo();
        $dato = $producto->actualizar("productos",$data,"id=".$id);
        header("location:".urlsite);
      }
     //eliminar
     public static function eliminar(){
        $id =$_REQUEST['id'];//recuperamos el id 
        $producto = new Modelo();
        $dato = $producto->eliminar("productos","id=".$id);
        //regresamos al sitio
        header("location:".urlsite);
     }

}