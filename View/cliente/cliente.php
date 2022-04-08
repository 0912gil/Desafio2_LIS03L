<img src="assets/img/logo.png">
<h1 class="page-header">Cliente </h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=producto">Productos</a>
    <a class="btn btn-primary" href="?c=cliente&a=Nuevo">Nuevo Cliente</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Correo</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Apellidos</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Direccion</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->correo; ?></td>
            <td><?php echo $r->nombres; ?></td>
            <td><?php echo $r->apellidos; ?></td>
            <td><?php echo $r->telefono; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td>
                <a href="?c=cliente&a=Crud&correo=<?php echo $r->correo; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=cliente&a=Eliminar&correo=<?php echo $r->correo; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
