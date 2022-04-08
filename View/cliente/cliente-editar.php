<img src="assets/img/logo.png">
<h1 class="page-header">
    <?php echo $prod->correo  != null ? $prod->nombres." ".$prod->apellidos : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=cliente">Cliente</a></li>
  <li class="active"><?php echo $prod->correo != null ? $prod->nombres." ".$prod->apellidos : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-cliente" action="?c=cliente&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="correo" value="<?php echo $prod->correo; ?>" />

    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="nombres" value="<?php echo $prod->nombres; ?>" class="form-control" placeholder="Ingrese nombre del Cliente" />
    </div>

    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" name="apellidos" value="<?php echo $prod->apellidos; ?>" class="form-control" placeholder="Ingrese apellido del Cliente" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="telefono" value="<?php echo $prod->telefono; ?>" class="form-control" placeholder="Ingrese telefono" />
    </div>

    <div class="form-group">
        <label>Direccion</label>
        <input type="text" name="direccion" value="<?php echo $prod->direccion; ?>" class="form-control" placeholder="Ingrese Direccion"  />
    </div>

    <div class="form-group">
        <label>N° de tarjeta</label>
        <input type="text" name="tarjeta" value="<?php echo $prod->numero_tarjeta; ?>" class="form-control" placeholder="Ingrese el numero de la tarjeta"  />
    </div>

    <div class="form-group">
        <label>Contraseña Nueva</label>
        <input type="text" name="contraseña" value="<?php echo $prod->contraseña; ?>" class="form-control" placeholder="Ingrese contraseña"  />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-cliente").submit(function(){
            return $(this).validate();
        });
    })
</script>
