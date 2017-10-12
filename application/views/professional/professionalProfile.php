<div class="container row">
    <div class="col s12 perfil">
        <img src="<?= $professional['address_picture'] . $professional['name_picture'] ?>" class="col s4">
        <div class="simple-data col s8">
            <div class="identifier col s9">
                <strong><span><?= $professional['name'] ?></span></strong>
                <span><?= $professional['email'] ?></span>
                <span class="flex-center">

                    <?php
                        if ($professional['invoice']) {
                    ?>
                            Nota Fiscal: <i class="material-icons teal-text">check_circle</i>
                    <?php
                        } else {
                    ?>
                            Nota Fiscal: <i class="material-icons teal-text">block</i>
                    <?php
                        }
                    ?>
                </span>
            </div>
            <div class="icon col s3">
                <i class="small material-icons teal-text">verified_user</i>
            </div>
        </div>
    </div>
    <div class="col s12 info-professional col s12">
        <a class="waves-effect waves-light btn modal-trigger red darken-1 col s4" href="#modal1">Contratar</a>

        <div id="modal1" class="modal">
            <div class="modal-content">
                <?php if($this->session->has_userdata('login')) { ?>

                    <h4>Informações para o profissional</h4>

                <div class="modal-footer">
                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red darken-1 white-text">Contratar</a>
                </div>

                <?php } else {?>

                    <h4>Para contratar um profissional, será necessário se logar ou se cadastrar.</h4>

                    <div class="modal-footer">
                        <a href="<?= base_url('LoginController')?>" class="modal-action modal-close waves-effect waves-green btn-flat red darken-1 white-text">Login</a>
                        <a href="<?= base_url('UserController/openForm')?>" class="modal-action modal-close waves-effect waves-green btn-flat red darken-1 white-text">Cadastre-se</a>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $('.modal').modal();
    });
</script>

