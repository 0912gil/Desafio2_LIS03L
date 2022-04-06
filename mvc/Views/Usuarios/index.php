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
/*
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
            <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Agregar Producto</a>
            
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
                    foreach ($producto  as $productos) {
                                        
                            ?>
                            <tr>
                                <td><?=$productos['id_producto']?></td>
                                <td><?=$productos['nombre']?></td>
                                <td><?=$productos['descripcion']?></td>
                                <td><img src="img/<?=$productos['imagen']?>" alt="" style="margin-right:30px;max-width:100%;"></td>
                                <td>
                                    <br>
                                    <a href="#create" data-toggle="modal" class="btn btn-success">Editar</a><br><br>
                                    <a href="#delete_<?=$row->codigo?>" data-toggle="modal" class="btn btn-danger">Eliminar</a><br><br>
                                </td>
                            </tr>
                            <?php include('borrar_producto.php');?>
                            <?php include('editar_producto.php');?>
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