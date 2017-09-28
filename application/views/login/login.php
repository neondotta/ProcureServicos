
<h2 class="center">Login</h2>
<div class="valign-wrapper">
    <div class="form col s12 m10 l8">
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <?php
                echo form_open('LoginController/authLogin');

                echo form_label("E-mail:", 'email');
                echo form_input([
                    "name" => 'email',
                    "id" => 'email',
                    "class" => 'validate',
                    "maxlength" => 255,
                ]);
                ?>
            </div>
            <div class="input-field col s12 m12 l12">
                <?php
                echo form_label("Senha:", 'password');
                echo form_password([
                    "name" => 'password',
                    "id" => 'password',
                    "class" => 'validate',
                    "maxlength" => 255
                ]);

                echo form_button([
                    "class" => "waves-effect waves-light btn red darken-1",
                    "content" => "Login",
                    "type" => "submit"
                ]);

                echo form_close();
                ?>
            </div>
        </div>
    </div>
</div>