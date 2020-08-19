<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"><?php echo $titulo ?></h1>
    </div>
        <section class="row">
            <div class="col-12 col-sm-12">
                <?= $this->session->flashdata('msg'); ?>
            </div>
        </section>
        <section class="row">
            <div class="col-4 col-sm-4">
                <?php
                    echo form_open(current_url(), ['id' => 'form', 'name' => 'form', 'class' => '']);

                        echo form_label('Valor', 'valor');
                        echo '<br>';
                        echo form_input(['name' => 'valor', 'autocomplete' => 'off'], set_value('valor'), '');
                        echo '<br>';
                        echo '<hr />';
                        echo '<br>';
                        echo form_submit('submit', 'Enviar');
                    echo form_close();
                ?>
            </div>
        </section>
    </div>
</main>