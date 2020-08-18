<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $titulo ?></h1>
    </div>
        <section class="row mb-2">
            <div class="col-12 col-sm-12 text-right">
            <?php
            echo anchor('usuarios/add', 'Cadastrar Usuário', array(
                'title' => 'Cadastrar Usuário', 'class' => 'btn btn-success'
            ))
            ?>
            
            </div>
        </section>
        <section class="row">
            <div class="col-12 col-sm-12">
            <p>Lista</p>
            </div>
        </section>
</main>