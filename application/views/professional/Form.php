<div class="valign-wrapper">
    <div class="form col s12 m10 l8">
        <div class="row">
            <?php echo form_open('ProfessionalController/insert'); ?>
            <div class="input-field col s12 m12 l12">
                <?php

                echo form_label("CNPJ:", 'cnpj');
                echo form_input([
                    "name" => 'cnpj',
                    "id" => 'cnpj',
                    "class" => 'validate',
                    "maxlength" => 255
                ]);
                ?>
            </div>
            <div class="input-field col s12 m12 hide-content" id="nota-fiscal">
                <?php
                    $options = [
                        '' => 'Você disponibiliza nota fiscal?',
                        '0' => 'NÃO',
                        '1' => 'SIM',
                    ];

                    echo form_dropdown('invoice', $options);
                ?>
            </div>
            <div class="input-field col s12 m12 l12">
                <?php
                    $options = [];
                    $options[] = 'Suas categorias de serviço';
                    foreach ($categories as $key => $value) {
                        $options[$value['id']] = $value['category'];
                    }

                    echo form_dropdown('categorias[]', $options, '','multiple');
                ?>
            </div>
            <div class="input-field col s12">
                <?php
                echo form_button([
                    "class" => "waves-effect waves-light btn red darken-1",
                    "content" => "Cadastrar",
                    "id" => "btn-submit",
                    "type" => "submit"
                ]);


                ?>
            </div>

            <?php echo form_close(); ?>
        </div>
    </div>
</div>