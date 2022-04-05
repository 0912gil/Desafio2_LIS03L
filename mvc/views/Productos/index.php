<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <?php
        include '../cabecera.php';
    ?>
</head>
<body>
<?php
        include '../menu.php';
    ?>

<div class="container">
            <h1 class="page-header text-center">Ingresar Productos</h1>
            <div class="row">
                <div class="col-md-12">
                <a type="button" class="btn btn-primary btn-md" href="<?=PATH?>/Libros/create"> Nuevo libro</a>
                <a href="#addnew" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Agregar Producto</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover table-responsive table-condensed" id="tabla">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th style="width: 25%">Nombre</th>
                            <th>Descripcion</th>
                            <th>Imagen</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                        </tr>
                    </thead>
                    <tbody>     
                    <?php

                    foreach($producto as $product){
                        $cod=$product['codigo_libro'];
                    ?>
                            <tr>
                                <td><?=$product['id_producto']?></td>
                                <td><?=$product['nomre']?></td>
                                <td><?=$product['descripcion']?></td>
                                <td><?=$product['imagen']?></td>
                                <td><?=$product['id_categoria']?></td>
                                <td><?=$product['precio']?></td>
                                <td><?=$product['existencias']?></td>
                                <td>
                                    <a data-toggle="tooltip" title="Detalles"  class="btn btn-default btn-circle" href="javascript:void(0)" onclick="detalles('<?=$codigo?>')"><span class="glyphicon glyphicon-book"></span></a>
                                    <a title="Editar" class="btn btn-primary btn-circle" href="#"><span class="glyphicon glyphicon-edit"></span></a>
                                    <a title="Eliminar"  class="btn btn-danger btn-circle" href="delete/<?=$libro['codigo_libro']?>"><span class="glyphicon glyphicon-trash"></span></a>
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
                
<!-- Bootstrap modal -->
<div class="modal fade" id="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="titulo-modal"></h3>
            </div>
            <div class="modal-body form">
                <ul class="list-group">
                    <li class="list-group-item"><b>Nombre del producto: </b> <span id="nombre"></span></li>
                    <li class="list-group-item"> <b>Descripción: </b> $<span id="descripcion"></span></li>
                    <li class="list-group-item"> <b>Imagen: </b> <span id="imagen"></span></li>
                    <li class="list-group-item"> <b>Categoria: </b> <span id="id_categoria"></span></li>
                    <li class="list-group-item"> <b>Precio: </b> <span id="precio"></span></li>
                    <li class="list-group-item"> <b>Existencias: </b> <span id="existencias"></span></li>
                </ul>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->

<script>
    $(document).ready(function () {
        $('#tabla').DataTable();
    });
    
    function detalles(id){
        $.ajax({
            url:"<?=PATH?>/Productos/details/"+id,
            type:"GET",
            dataType:"JSON",
            success:function(datos){
                $('#nombre').text(datos.nombre);
                $('#descripcion').text(datos.descripcion);
                $('#imagen').text(datos.imagen);
                $('#id_categoria').text(datos.id_categoria);
                $('#precio').text(datos.precio);
                $('#existencias').text(datos.existencias);
                $('#modal').modal('show');
                $('.titulo-modal').text(datos.nombre);
            }
        })
    }
    
   
</script>


    </body>
</html>