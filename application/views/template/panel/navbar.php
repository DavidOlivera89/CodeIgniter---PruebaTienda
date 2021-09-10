<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">EDI</a>
  <?php if ($this->accesoModel->logueado()): ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <?php endif ?>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <?php if ($this->accesoModel->logueado()): ?>
    <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-keyboard-o" aria-hidden="true"></i> Artículo
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('articulo/listar') ?>"><i class="fa fa-list" aria-hidden="true"></i> Listar</a>
              <a class="dropdown-item" href="<?php echo base_url('articulo/crear') ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-cubes" aria-hidden="true"></i> Categoría
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('categoria/listar') ?>"><i class="fa fa-list" aria-hidden="true"></i> Listar</a>
              <a class="dropdown-item" href="<?php echo base_url('categoria/crear') ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-percent" aria-hidden="true"></i> Promociones
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="<?php echo base_url('promociones/listar') ?>"><i class="fa fa-list" aria-hidden="true"></i> Listar</a>
              <a class="dropdown-item" href="<?php echo base_url('promociones/crear') ?>"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear</a>
            </div>
          </li>          
    </ul>
    <ul class="navbar-nav margin-right">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-user" aria-hidden="true"></i> <?php echo ucfirst($this->session->userdata('username')) ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo base_url('usuario/datos_personales') ?>"><i class="fa fa-info-circle" aria-hidden="true"></i> Datos</a>
          <a class="dropdown-item" href="<?php echo base_url('acceso/modificar') ?>"><i class="fa fa-key" aria-hidden="true"></i> Acceso</a>
          <a class="dropdown-item" href="<?php echo base_url('acceso/salir') ?>"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
        </div>
      </li>
    </ul>
  <?php endif ?>
  </div>
</nav>