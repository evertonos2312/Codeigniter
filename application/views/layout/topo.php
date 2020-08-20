<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
    <title><?= $titulo_site ?></title>
        
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('dist/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

    <link href="<?php echo base_url('dist/bootstrap/css/dashboard.css') ?>" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css"/>
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style type="text/css">
      .m-topo {
        margin-top: 20px;
      }
    </style>
</head>


<body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Curso Codeigniter</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <?php
                  echo anchor('login/sair','Sair', array('title' =>'Sair', 'class' => 'nav-link'));
                ?>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <?php
              echo anchor('/','Principal', array('title' =>'Dashboard', 'class' => 'nav-link'))
              ?>
          </li>
          <li class="nav-item">
              <?php
              echo anchor('livros','Livros', array('title' =>'Livros', 'class' => 'nav-link'))
              ?>
          </li>
          <li class="nav-item">
              <?php
              echo anchor('usuarios','Lista de Usuários', array('title' =>'Lista de Usuários', 'class' => 'nav-link'))
              ?>
          </li>
        </ul>

       
      </div>
    </nav>
