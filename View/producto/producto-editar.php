<img src="assets/img/logo.png">
<h1 class="page-header">
    <?php echo $prod->id_producto != null ? $prod->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=producto">Productos</a></li>
  <li class="active"><?php echo $prod->id_producto != null ? $prod->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-producto" action="?c=producto&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_producto" value="<?php echo $prod->id_producto; ?>" />

    <div class="form-group">
        <label>Nombre </label>
        <input type="text" name="nombre" value="<?php echo $prod->nombre; ?>" class="form-control" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Descripcion </label>
        <input type="text" name="descripcion" value="<?php echo $prod->descripcion; ?>" class="form-control" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Existencias</label>
        <input type="text" name="existencias" value="<?php echo $prod->existencias; ?>" class="form-control"  data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Precio Unitario</label>
        <input type="text" name="precio" value="<?php echo $prod->precio; ?>" class="form-control"  data-validacion-tipo="requerido|min:20" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })
</script>
