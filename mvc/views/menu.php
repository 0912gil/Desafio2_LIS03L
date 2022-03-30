
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" 
                  data-toggle="collapse" data-target="#navbar" 
                  aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Desplegar navegacion</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#">Textil Export</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active"><a href="<?= PATH ?>/Editoriales/index">Inicio</a></li> 
              <?php
                if($_SESSION['login_data']['id_tipo_usuario']==1){

              ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Agregar <span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="<?= PATH ?>/Autores/create">Registrar producto</a></li>
              </ul>
            </li>
            <?php
             }
             ?>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false">Ver<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= PATH ?>/Libros/index">Ver productos</a></li>
              </ul>
            </li>
            
          </ul>
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                 role="button" aria-haspopup="true" 
                 aria-expanded="false"><?=$_SESSION['login_data']['usuario']?><span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= PATH ?>/Usuarios/logout">Cerrar sesión</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
        
