<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $titulo ?></h1>
    </div>

        <section class="row">

            <div class="col-12 col-sm-12">
                
                <table class="table table-hover">     
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Data Cadastro</th>
                            <th scope="col">Nome do livro</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($livros as $livro) {
                            echo'
                            <tr>
                            <th scope="row">'. $livro->id .'</th>
                            <td>'. formataDataBr($livro->data_cadastro) .'</td>
                            <td>'. $livro->nome_livro .'</td>
                            <td>'. $livro->autor_livro .'</td>
                            <td>'. formataMoeda($livro->preco) .'</td>
                            <td>'. anchor('site/info/' . $livro->id, 'Info', array('title' => 'Mais Informações', 'class' => 'btn btn-info')) .' '. anchor_popup('site/info/' . $livro->id, 'Info', array('title' => 'Mais Informações', 'class' => 'btn btn-success')) .'</td>
                            </tr>';
                        }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </section>
</main>