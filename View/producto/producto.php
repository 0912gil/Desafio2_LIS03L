<img src="assets/img/logo.png">
<h1 class="page-header">Producto </h1>

<div class="well well-sm text-right">
    
    <a class="btn btn-primary" href="?c=producto&a=Nuevo">Nuevo Producto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Codigo Producto</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Descripcion</th>
            <th style="width:120px;">Imagen</th>
            <th style="width:120px;">Precio</th>
            <th style="width:120px;">Existencias</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_producto; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->descripcion; ?></td>
            <td><img src="data:img/jpg;base 64,<?php echo base64_encode($r->imagen); ?>" alt="" style="margin-right:30px;max-width:100%;"></td>
            <td><?php echo $r->precio; ?></td>
            <td><?php echo $r->existencias; ?></td>
            <td>
                <a href="?c=producto&a=Crud&id_producto=<?php echo $r->id_producto; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=producto&a=Eliminar&id_producto=<?php echo $r->id_producto; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
