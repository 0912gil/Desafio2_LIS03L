<img src="assets/img/logo.png">
<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=producto">Productos</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-producto" action="?c=producto&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Código Producto</label>
      <input type="text" name="id_producto" value="<?php echo $prod->id_producto; ?>" class="form-control" placeholder="Ingrese Código Producto" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Nombre Producto</label>
        <input type="text" name="nombre" value="<?php echo $prod->nombre; ?>" class="form-control" placeholder="Ingrese nombre producto" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Descripción del Producto</label>
        <input type="text" name="descripcion" value="<?php echo $prod->descripcion; ?>" class="form-control" placeholder="Ingrese descripción producto" data-validacion-tipo="requerido|min:240" />
    </div>

    <div class="form-group">
        <label>Imagen en linea</label>
        <input type="text" name="imagen" value="<?php echo $prod->imagen; ?>" class="form-control" placeholder="Ingrese el enlace del producto" data-validacion-tipo="requerido|min:240" />
    </div>

    <div class="form-group">
        <label>Categoria</label>
        <input type="text" name="id_categoria" value="<?php echo $prod->id_categoria; ?>" class="form-control" placeholder="Ingrese la categoria del producto" data-validacion-tipo="requerido|min:240" />
    </div>

    <div class="form-group">
        <label>Precio Unitario</label>
        <input type="text" name="precio" value="<?php echo $prod->precio; ?>" class="form-control" placeholder="Ingrese precio unitario" data-validacion-tipo="requerido|min:20" />
    </div>

    
    <div class="form-group">
        <label>Existencias</label>
        <input type="text" name="existencias" value="<?php echo $prod->existencias; ?>" class="form-control" placeholder="Ingrese las existencias del producto" data-validacion-tipo="requerido|min:240" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-producto").submit(function(){
            return $(this).validate();
        });
    })
</script>
