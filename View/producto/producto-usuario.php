<img src="assets/img/logo.png">
<h1 class="page-header">Producto </h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Codigo Producto</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Descripcion</th>
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
            <td><?php echo $r->precio; ?></td>
            <td><?php echo $r->existencias; ?></td>
            <td>
                <a href="?c=producto&a=Crud&id_producto=<?php echo $r->id_producto; ?>">Comprar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
