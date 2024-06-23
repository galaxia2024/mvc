<?php
//traer el header
require_once("layouts/header.php");
?>

<!--vista para eliminar ,editar y agregar un producto --> 
<a style="margin-bottom: 10px; " class="btn" href="main.php?m=nuevo">AGREGAR PRODUCTOS</a>
<!-- vista para las tablas --> 
<table >
    <tr> 
        <td>ID   </td>
        <td>NOMBRE  </td>
        <td>PRECIO  </td>
        <td>ACCIÓN  </td>
    </tr>
    <tbody>
    <?php 
            if(!empty($dato)) { // Inicia el bloque if
                foreach($dato as $key => $value) {
                    foreach($value as $v) {?>
                        <tr>
                            <td><?php echo $v['id']?></td>
                            <td><?php echo $v['nombre']?></td>
                            <td><?php echo $v['precio']?></td>
                            <td> <!--Implementamos los botones-->
                                <a class="btn" href="index.php?m=editar&id=<?php echo $v['id']?>">EDITAR</a>
                                <a class="btn" href="index.php?m=eliminar&id=<?php echo $v['nombre']?>"
                                onclick="return confirm('Estas seguro que deseas eliminar?'); false">ELIMINAR</a>
                            </td>
                        </tr>
                    <?php } // Termina el bucle foreach
                } // Termina el bucle foreach
            } 
            
            else { // Inicia el bloque else
        ?>
            <tr>
                <td colspan="4">NO HAY REGISTROS</td>
            </tr>
        <?php } // Termina el bloque else ?>
    </tbody>
</table>
<?php
require_once("layouts/footer.php");