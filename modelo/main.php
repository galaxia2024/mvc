<?php

//definimos la clase modelo 
class Modelo{//dentro creamos variables
    private $Modelo;
    private $datos;
    private $db;//gestionar la base de datos

    //creamos constructor
    public function __construct(){
        $this->Modelo = array();
        //conexion a la base de datos
        //variables que reciben es mysql y dbname
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=mvc',"root","");
            echo "Conexión exitosa a la base de datos<br>";
        } catch (PDOException $e) {
            echo "Error en la conexión: " . $e->getMessage() . "<br>";
           }
    }

    //metodos
    public function insertar($tabla, $data){//recibe el name de tabla y la consulta
        $consulta="insert into ".$tabla." values(null,". $data .")";
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
    }

     public function mostrar($tabla,$condicion){
        $consul="select * from ".$tabla." where ".$condicion.";";
        $resu=$this->db->query($consul);
        while($filas = $resu->FETCHALL(PDO::FETCH_ASSOC)) {
             $this->datos[]=$filas;
        }
        return $this->datos;
    } 
    
    //metodo para modificar la tabla
    public function actualizar($tabla, $data, $condicion){       
        $consulta="update ".$tabla." set ". $data ." where ".$condicion;
        $resultado=$this->db->query($consulta);
        if ($resultado) {
            return true;
        }else {
            return false;
        }
    }

     //metodo para eliminar un registro
     public function eliminar($tabla, $condicion){
        $eli = "delete from " . $tabla . " where " . $condicion;
        $res = $this->db->query($eli);
        if ($res) {
            return true; 
        } else {
            return false;
        }
    }
    
}