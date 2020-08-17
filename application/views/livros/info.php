<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $titulo ?></h1>
    </div>

        <section class="row">

            <div class="col-12 col-sm-12">
                <?php 
                    echo anchor('site/livros', 'Listar livros', array('title' => 'Listar livros', 'class' =>'btn btn-secondary'))
                ?>
                
                <table class="table table-hover m-topo">
                <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Data Cadastro</th>
                            <th scope="col">Nome do livro</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Preço</th>
                        </tr>
                    </thead>     
                    
                    <tbody>
                            <tr>
                                <td><?php echo $info->id ?></td>
                                <td><?php echo $info->nome_livro ?></td>
                                <td><?php echo $info->autor_livro ?></td>
                                <td><?php echo formataMoeda($info->preco) ?></td>
                                <td><?php echo formataDataBr($info->data_cadastro) ?></td>
                            </tr>
                            <tr>
                                <td colspan="5"><?php echo $info->resumo ?></td>
                            </tr>


                    </tbody>
                </table>
                
            </div>
        </section>
</main>