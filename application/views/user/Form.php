<div class="valign-wrapper">
    <div class="form col s12 m10 l8">
        <div class="row">
            <?php
                echo form_open_multipart('UserController/insert');
                echo form_input([
                    "type" => 'hidden',
                    "name" => 'latitude',
                    "id" => 'latitude',
                    "class" => 'validate',
                    "maxlength" => 255
                ]);
                echo form_input([
                    "type" => 'hidden',
                    "name" => 'longitude',
                    "id" => 'longitude',
                    "class" => 'validate',
                    "maxlength" => 255
                ]);
            ?>
            <div class="input-field col s12 m12 l12">
                <?php
                    echo form_label("Nome:", 'name');
                echo form_input([
                    "name" => 'name',
                    "id" => 'name',
                    "class" => 'validate',
                    "maxlength" => 255
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
                        "minlength" => 11,
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
                        "maxlength" => 9,
                        "tabindex" => 1
                    ]);
                ?>
            </div>
            <div class="input-field col s6">
                <?php
                    echo form_label("País:", 'nation');
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
                    echo form_label("Estado:", 'country');
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
                    echo form_label("Cidade:", 'city');
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
                    echo form_label("Rua:", 'street');
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
                    echo form_label("Número:", 'number');
                    echo form_input([
                        "name" => 'number',
                        "id" => 'number',
                        "class" => 'validate',
                        "maxlength" => 255,
                        "tabindex" => 2
                    ]);
                ?>
            </div>
            <div class="input-field col s6">
                <?php
                    echo form_label("Complemento:", 'complement');
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
                    echo form_label("Senha:", 'password');
                    echo form_input([
                        "name" => 'password',
                        "id" => 'password',
                        "class" => 'validate',
                        "type" => "password",
                        "maxlength" => 255,
                        "minlength" => 8
                    ]);
                ?>
            </div>
            <div class="input-field col s6">
                <?php
                    echo form_label("Confirme a senha:", 'confirm-password');
                    echo form_input([
                        "name" => 'confirm-password',
                        "id" => 'confirm-password',
                        "type" => "password",
                        "class" => 'validate',
                        "maxlength" => 255,
                        "minlength" => 8
                    ]);
                ?>
            </div>
<!--            <div class="file-field input-field col s12">-->
<!--                <div class="btn col s4">-->
<!--                    <span>Foto</span>-->
<!--                    --><?php
//                        echo form_input([
//                            "name" => 'image',
//                            "id" => 'image',
//                            "type" => 'file'
//                        ]);
//                    ?>
<!--                </div>-->
<!--                <div class="file-path-wrapper col s8">-->
<!--                    --><?php
//                        echo form_input([
//                            "name" => 'image',
//                            "id" => 'image',
//                            "class" => 'file-path validate',
//                            "maxlength" => 255,
//                        ]);
//                    ?>
<!--                </div>-->
<!--            </div>-->
            <div class="input-field col s12">
                <?php
                    echo form_button([
                        "class" => "waves-effect waves-light btn red darken-1",
                        "id" => "btn-submit",
                        "content" => "Cadastrar",
                        "type" => "submit"
                    ]);

                    echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY"></script>
<script src="<?= base_url() ?>public/js/googleMaps.js"></script>
