<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $titulo ?></h1>
    </div>
        <div class="row">
            <div class="col-12 col-sm-12">
                <?php
                   echo validation_errors('<div class="alert alert-danger" role ="alert">', '</div>'); 
                ?>
            </div>
        </div>

        <section class="row">

            <div class="col-4 col-sm-4">
                <?php
                    echo form_open();
                            echo '<div class="form-group">';
                            echo form_label('Nome', 'id_nome');
                            echo form_input(array(
                                'type'=>'text', 
                                'class'=>'form-control', 
                                'name'=>'nome', 
                                'id'=>'id_nome',
                                'autocomplete'=>'off',
                                'placeholde'=>'Nome', 'value' => $query->nome));
                            echo '</div>';
                            
                            echo '<div class="form-group">';
                            echo form_label('E-mail', 'id_email');
                            echo form_input(array(
                                'type'=>'text', 
                                'class'=>'form-control', 
                                'name'=>'email', 
                                'id'=>'id_email',
                                'autocomplete'=>'off', 'value' => $query->email));
                                echo '</div>';

                                echo form_hidden('id', $query->id);
                                
                                
                            echo form_submit('submit', 'Atualizar', array(
                                'class'=>'btn btn-outline-success'
                            ));
                
                    echo form_close();
                ?>
            </div>

        </section>
</main>