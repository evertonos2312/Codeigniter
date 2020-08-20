<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $titulo_pagina ?></h1>
    </div>

        <section class="row mt-5 mb-3">
            <div class="col-12 col-sm-12">
                <?= anchor('livros', 'Voltar', ['title' => 'Voltar', 'class' => 'btn btn-primary']) ?>
            </div>
        </section>

        <section class="row">
            <div class="col-12 col-sm-12">
                <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
                <?= $this->session->userdata('msg'); ?>
            </div>
        </section>

        <section class="row">

            <div class="col-6 col-sm-6">
                
                <?= form_open_multipart() ?>
                    <div class="form-group"> 
                        <?= form_label('Título') ?>
                        <?= form_input([
                            'type'          => 'text', 
                            'class'         => 'form-control',
                            'name'          => 'titulo',
                            'placeholder'    => 'Titulo do Livro',
                            'required'      => '']) ?>

                    </div>
                    <div class="form-group"> 
                        <?= form_label('Autor') ?>
                        <?= form_input([
                            'type'          => 'text', 
                            'class'         => 'form-control',
                            'name'          => 'autor',
                            'placeholder'    => 'Autor do Livro',
                            'required'      => '']) ?>

                    </div>
                    <div class="form-group"> 
                        <?= form_label('Preço') ?>
                        <?= form_input([
                            'type'          => 'text', 
                            'class'         => 'form-control',
                            'name'          => 'preco',
                            'placeholder'    => 'Preço do Livro',
                            'required'      => '']) ?>

                    </div>
                    <div class="form-group col-4 col-sm-4"> 
                            <?= form_label('Ativo') ?>
                            <?= form_dropdown('ativo', [ 1 => 'Sim', 0 => 'Não'], 1 , ['class' => 'form-control']); ?>
                    </div>
                    <div class="form-group"> 
                        <?= form_label('Resumo') ?>
                        <?= form_textarea('resumo', '' , ['class' => 'form-control', 'required'      => '']); ?>

                    </div>
                    <div class="form-group"> 
                            <input type="file" name="foto_livro" class="form-control" required="">
                    </div>


                    <?= form_submit('submit', 'Cadastrar livro', ['class' => 'btn btn-success']); ?>
                    

                    

                <?= form_close() ?>
            </div>
        </section>
</main>