<img src="assets/img/logo.png">
<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=categoria">Categoria</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-categoria" action="?c=categoria&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>Codigo de Categoria</label>
      <input type="text" name="id_categoria" value="<?php echo $prod->id_categoria; ?>" class="form-control"/>
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $prod->nombre; ?>" class="form-control" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-categoria").submit(function(){
            return $(this).validate();
        });
    })
</script>
