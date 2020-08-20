<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $titulo_pagina ?></h1>
    </div>
    <section class="row">
            <div class="col-12 col-sm-12">
                <?= $this->session->userdata('msg') ?>
            </div>
        </section>
    <section class="row mb-2">
            <div class="col-12 col-sm-12 text-right">
            <?php
            echo anchor('livros/adicionar', '<i class="fa fa-plus-square"></i>', array(
                'title' => 'Cadastrar Livro', 'class' => 'btn btn-success'
            ))
            ?>
            
            </div>
        </section>
        <section class="row">
            <div class="col-12 col-sm-12">
                <table class="table table-hover table-bordered" id="table_isweb_listar">
                    <thead>
                        <tr>
                            <th class="text-center">Img</th>
                            <th class="text-center">Título</th>
                            <th class="text-center">Autor</th>
                            <th class="text-center">Preço</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($livros as $livro) { ?>
                            <tr>
                                <td scope="row"><img src="<?= base_url('upload/' . $livro->img)?>" alt="<?= $livro->titulo ?>" class="img-thumbnail" style="width: 50px;"></td>
                                <td class="text-center"><?= $livro->titulo ?></td>
                                <td class="text-center"><?= $livro->autor ?></td>
                                <td class="text-center"><?= $livro->preco ?></td>
                                <td class="text-center"><?= ($livro->ativo == 1 ? '<span class="badge badge-success"><i class="fa fa-unlock"></i></span>' : 
                                '<span class="badge badge-danger"><i class="fa fa-lock"></i></span>') ?></td>
                                <td class="text-center">
                                    <?= anchor('livros/editar/' . $livro->id, '<i class="fa fa-pencil"></i>', 
                                    ['title' => 'Editar', 'class' => 'btn btn-primary']) ?>

                                    <?= anchor('livros/apagar/' . $livro->id, '<i class="fa fa-trash"></i>', 
                                    ['onclick'=> "return confirm('Deseja realmente excluir o livro?')", 'title' => 'Apagar', 'class' => 'btn btn-danger']) ?>
                                    <?php if ($livro->ativo == 1) { ?>
                                        <?= anchor('livros/desativar/' . $livro->id, '<i class="fa fa-lock"></i>', 
                                        ['title' => 'Desativar', 'class' => 'btn btn-info']) ?>
                                    <?php } else { ?>
                                    
                                        <?= anchor('livros/ativar/' . $livro->id, '<i class="fa fa-unlock"></i>', 
                                        ['title' => 'Ativar', 'class' => 'btn btn-info']) ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>  
            </div>
        </section>
</main>