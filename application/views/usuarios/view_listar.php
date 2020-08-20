<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?= $titulo_pagina ?></h1>
    </div>
        <section class="row mb-2">
            <div class="col-12 col-sm-12 text-right">
            <?php
            echo anchor('usuarios/adicionar', '<i class="fa fa-plus-square"></i>', array(
                'title' => 'Cadastrar Usuário', 'class' => 'btn btn-success'
            ))
            ?>
            
            </div>
        </section>

        <div class="row">
                <div class="col-12 col-sm-12">
                    <?= $this->session->userdata('msg'); ?>
                </div>
        </div>

        <section class="row">
            <div class="col-12 col-sm-12">
                <table class="table table-hover table-bordered" id="table_isweb_listar">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Nome</th>
                            <th scope="col" class="text-center">E-mail</th>
                            <th scope="col" class="text-center">Ativo</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($usuarios as $row) { ?> 
                            <tr>
                                <th scope="row" class="text-center"><?= $row->nome?></th>
                                <td class="text-center">
                                    <?= $row->email?></td>
                                    <td class="text-center"><?= ($row->ativo == 1 ? '<span class="badge badge-success"><i class="fa fa-unlock"></i></span>' : '<span class="badge badge-danger"><i class="fa fa-lock"></i></span>')?>
                                </td>
                                <td class="text-center">
                                    <?= anchor('usuarios/editar/' . $row->id, '<i class="fa fa-pencil"></i>', array(
                                        'title' => 'Editar', 'class' => 'btn btn-primary'));?>
                                    <?= anchor('usuarios/apagar/' . $row->id, '<i class="fa fa-trash-o"></i>', array(
                                        'onclick'=> "return confirm('Deseja realmente excluir o usuário?')",'title' => 'Apagar', 'class' => 'btn btn-danger'));?>
                                    <?php if($row->ativo == 1){ ?>
                                        <?= anchor('usuarios/inativo/' . $row->id, '<i class="fa fa-lock"></i>', array(
                                        'title' => 'Desativar', 'class' => 'btn btn-info'));?>
                                        <?php } else { ?>
                                            <?= anchor('usuarios/ativo/' . $row->id, '<i class="fa fa-unlock"></i>', array(
                                             'title' => 'Ativar', 'class' => 'btn btn-info'));?>
                                        <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
</main>