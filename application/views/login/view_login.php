<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <title><?php echo $titulo ?></title>
            
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url('dist/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

        <link href="<?php echo base_url('dist/bootstrap/css/dashboard.css') ?>" rel="stylesheet">
        
        <link href="<?php echo base_url('css/login.css') ?>" rel="stylesheet">
        
    </head>

    <body>
        <div class="container">
            <?= $this->session->flashdata('erro_login'); ?>
            <form action="" class="form-signin" method="POST">
                <h2 class="form-signin-heading">Acesse sua Conta</h2>
                <label for="inputEmail" class="sr-only">Endereço de E-mail</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Endereço de E-mail" required autofocus>
                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            </form>

    </div>

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('dist/bootstrap/js/bootstrap.min.js') ?>"></script>   
    </body>
</html>