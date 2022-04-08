<img src="assets/img/logo.png">
<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=cliente">Cliente</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-cliente" action="?c=usuario&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Correo de inicio de sesion</label>
      <input type="text" name="correo" value="<?php echo $prod->correo; ?>" class="form-control"/>
    </div>

    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombres" value="<?php echo $prod->nombres; ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="<?php echo $prod->apellidos; ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="telefono" value="<?php echo $prod->telefono; ?>" class="form-control"  />
    </div>

    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion" value="<?php echo $prod->direccion; ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label>N° de Tarjeta</label>
        <input type="text" name="tarjeta" value="<?php echo $prod->tarjeta; ?>" class="form-control"/>
    </div>

    <div class="form-group">
        <label>Contraseña</label>
        <input type="text" name="contraseña" value="<?php echo $prod->contraseña; ?>" class="form-control"  />
    </div>
    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>
