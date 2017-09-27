
<div class="row">
    <div class="col s12">
        <div class="row">
            <div class="input-field col s12 m12 l6">
                <?php echo form_open_multipart('UserController/insert');

                    echo form_label("Nome:", 'name');
                    echo form_input([
                        "name" => 'name',
                        "id" => 'name',
                        "class" => 'validate',
                        "maxlength" => 255,
                    ]);
                ?>
            </div>
            <div class="input-field col s12">
                <?php
                    echo form_label("Cpf:", 'cpf');
                    echo form_input([
                        "name" => 'cpf',
                        "id" => 'cpf',
                        "class" => 'validate',
                        "maxlength" => 11,
                    ]);
                ?>
            </div>
            <div class="input-field col s6">
                <?php
                    echo form_label("CEP:", 'cep');
                    echo form_input([
                        "name" => 'cep',
                        "id" => 'cep',
                        "class" => 'validate',
                        "maxlength" => 255,
                    ]);
                ?>
            </div>
            <div class="input-field col s6">
                <?php
                    echo form_label("Nation:", 'nation');
                    echo form_input([
                        "name" => 'nation',
                        "id" => 'nation',
                        "class" => 'validate',
                        "maxlength" => 255,
                    ]);
                ?>
            </div>
            <div class="input-field col s3">
                <?php
                    echo form_label("Country:", 'country');
                    echo form_input([
                        "name" => 'country',
                        "id" => 'country',
                        "class" => 'validate',
                        "maxlength" => 2,
                    ]);
                ?>
            </div>
            <div class="input-field col s9">
                <?php
                    echo form_label("City:", 'city');
                    echo form_input([
                        "name" => 'city',
                        "id" => 'city',
                        "class" => 'validate',
                        "maxlength" => 255,
                    ]);
                ?>
            </div>
            <div class="input-field col s9">
                <?php
                    echo form_label("Street:", 'street');
                    echo form_input([
                        "name" => 'street',
                        "id" => 'street',
                        "class" => 'validate',
                        "maxlength" => 255,
                    ]);
                ?>
            </div>
            <div class="input-field col s3">
                <?php
                    echo form_label("Number:", 'number');
                    echo form_input([
                        "name" => 'number',
                        "id" => 'number',
                        "class" => 'validate',
                        "maxlength" => 255,
                    ]);
                ?>
            </div>
            <div class="input-field col s12">
                <?php
                    echo form_label("Complement:", 'complement');
                    echo form_input([
                        "name" => 'complement',
                        "id" => 'complement',
                        "class" => 'validate',
                        "maxlength" => 255,
                    ]);
                ?>
            </div>
            <div class="input-field col s6">
                <?php
                    $checkEmail = [
                        "data-error" => 'wrong',
                        "data-success" => 'right'
                    ];
                    echo form_label("E-mail:", 'email', $checkEmail);
                    echo form_input([
                        "name" => 'email',
                        "id" => 'email',
                        "class" => 'validate',
                        "maxlength" => 255,
                        "type" => 'email',
                    ]);
                ?>
            </div>
            <div class="input-field col s6">
                <?php
                    echo form_label("Password:", 'password');
                    echo form_input([
                        "name" => 'password',
                        "id" => 'password',
                        "class" => 'validate',
                        "maxlength" => 255,
                    ]);
                ?>
            </div>


            <?php
                echo form_button([
                    "class" => "waves-effect waves-light btn",
                    "content" => "Login",
                    "type" => "submit"
                ]);

                echo form_close();
            ?>
        </div>
    </div>
</div>
