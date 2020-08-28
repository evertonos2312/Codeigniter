<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?= $descricao ?>">
    <meta name="author" content="@everton_silva">
    <title><?= $titulo ?></title>
    <link rel="icon" href="dist/book.ico">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('dist/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><?=$titulo ?></a>
        </div>
    </nav>
     <div class="container">
     <h1 class="mt-2">Livros</h1>
     <hr />
     <?php foreach ($livros as $row) { ?> 
        <div class="media mb-5 mt-5 ">
            <p>
            <img src="<?= base_url('upload/' . $row->img) ?>" class="d-flex mr-3 img-fluid" style="width: 100px; alt="<?= $row->titulo ?>">
            <div class="media-body">
                <h5 class="mt-0"><?= $row->titulo ?></h5>
                <?= $row->resumo ?>
            <hr />
            </div>
            </p>
        </div>
     <?php } ?>
     </div>
</body>
</html>