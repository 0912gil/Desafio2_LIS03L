<img src="assets/img/logo.png">
<h1 class="page-header">
    <?php echo $prod->id_categoria  != null ? $prod->nombre: 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=categoria">Cliente</a></li>
  <li class="active"><?php echo $prod->id_categoria != null ? $prod->nombre: 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-categoria" action="?c=categoria&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_categoria" value="<?php echo $prod->id_categoria; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $prod->nombre; ?>" class="form-control" placeholder="Ingrese nombre del Cliente" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-categoria").submit(function(){
            return $(this).validate();
        });
    })
</script>
