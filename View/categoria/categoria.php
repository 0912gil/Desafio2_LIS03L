<img src="assets/img/logo.png">
<h1 class="page-header">Categoria </h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=producto">Productos</a>
    <a class="btn btn-primary" href="?c=cliente">Cliente</a>
    <a class="btn btn-primary" href="?c=categoria&a=Nuevo">Nueva Categoria</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id_Categoria</th>
            <th style="width:120px;">Nombre</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id_categoria; ?></td>
            <td><?php echo $r->nombre; ?></td>
            <td>
                <a href="?c=categoria&a=Crud&id_categoria=<?php echo $r->id_categoria; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=categoria&a=Eliminar&id_categoria=<?php echo $r->id_categoria; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
