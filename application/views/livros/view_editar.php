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
                'placeholder'   => 'Titulo do Livro',
                'value'         => $query->titulo]) ?>
            

        </div>
        <div class="form-group"> 
            <?= form_label('Autor') ?>
            <?= form_input([
                'type'          => 'text', 
                'class'         => 'form-control',
                'name'          => 'autor',
                'placeholder'    => 'Autor do Livro',
                'value'         => $query->autor]) ?>

        </div>
        <div class="form-group"> 
            <?= form_label('Preço') ?>
            <?= form_input([
                'type'          => 'text', 
                'class'         => 'form-control',
                'name'          => 'preco',
                'placeholder'    => 'Preço do Livro',
                'value'         => $query->preco]) ?>

        </div>
        <div class="form-group col-4 col-sm-4"> 
                <?= form_label('Ativo') ?>
                <?= form_dropdown('ativo', [ 1 => 'Sim', 0 => 'Não'], ($query->ativo == 1 ? 1 : 0) , ['class' => 'form-control']); ?>
        </div>
        <div class="form-group"> 
            <?= form_label('Resumo') ?>
            <?= form_textarea('resumo', $query->resumo, ['class' => 'form-control']); ?>
        </div>

        <div class="form-group">
            <img src="<?= base_url('upload/' . $query->img)?>" alt="<?= $query->titulo ?>" class="img-fluid img-livro-ismweb" style="width: 250px;">
        </div> 
        <div class="form-group"> 
            <button type="button" class="btn btn-outline-secondary mb-2 btn-trocar-imagem"><i class="fa fa-refresh"></i> Imagem</button>
            <button type="button" class="btn btn-outline-danger mb-2 btn-cancelar-imagem"><i class="fa fa-undo"></i> Cancelar</button>
            <input type="file" name="foto_livro" class="form-control input-file-form-livros-ismweb hide" required="" disabled="">
        </div>

        <?= form_hidden('id_livro', $query->id); ?>
        <?= form_submit('submit', 'Atualizar livro', ['class' => 'btn btn-success']); ?>
        

        

    <?= form_close() ?>
</div>
</section>
</main>