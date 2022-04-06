<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Administración</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    </style>
    <!-- JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<style>
    td{
        vertical-align: middle;
        text-align: center;
    }
</style>
</head>
<body>

<?php
    //if(($_POST['user']!=""&&$_POST['user']=="admin" &&$_POST['pass']!="" && $_POST['pass']=="textil123")||$_GET['exito']==1){
        
    //}
    //else{
        //header('Location: login.php?failed=1');
    //}
?>

<div class="container">
    <h1 class="page-header text-center">Ingresar Productos</h1>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <a href="create" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Agregar Producto</a>
            
            <table class="table table-bordered table-striped" style="margin-top:20px;">
                <thead>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Existencia</th>
                </thead>
                <tbody>
                    <?php
                   foreach($productos as $producto){
                    $id=$producto['id_producto'];
                ?>
                        <tr>
                            <td><?=$producto['id_producto']?></td>
                            <td><?=$producto['nombre']?></td>
                            <td><?=$producto['descripcion']?></td>
                            <td><?=$producto['imagen']?></td>
                            <td><?=$producto['precio']?></td>
                            <td><?=$producto['existencias']?></td>
                            <td><?=$producto['estado']?></td>
                            <td>
                                <a data-toggle="tooltip" title="Detalles"  class="btn btn-default btn-circle" href="javascript:void(0)" onclick="detalles('<?=$id?>')"><span class="glyphicon glyphicon-book"></span></a>
                                <a title="Editar" class="btn btn-primary btn-circle" href="#"><span class="glyphicon glyphicon-edit"></span></a>
                                <a title="Eliminar"  class="btn btn-danger btn-circle" href="delete/<?=$producto['id_producto']?>"><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                        </tr>
                        <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<?php
if(isset($_GET['exito'])){

?>
<script>
    alertify.success('Acción exitosa');
</script>
<?php
}
?>
    <footer style="background-color: rgba(0, 0, 0, 0.05); padding: 1.5em 0px; font-size:1.1em;" class="text-center">
		<b>TextilExport</b> - Universidad Don Bosco - Lenguajes Interpretados en el Servidor 03L - Desafío 1
	</footer>
</body>
</html>