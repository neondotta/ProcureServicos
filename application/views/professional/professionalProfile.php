<div class="container row">
    <div class="col s12 perfil">
        <img src="<?= $professional['address_picture'] . $professional['name_picture'] ?>" class="col s4">
        <div class="simple-data col s8">
            <div class="identifier col s9">
                <strong><span><?= $professional['name'] ?></span></strong>
                <?php
                    if($this->session->has_userdata('login')) {
                ?>
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

                <?php
                    }
                ?>

            </div>
            <?php
            if($this->session->has_userdata('login')) {
            ?>
                <?php
                if ($professional['certificate']) {
                    ?>
                    <div class="icon col s3">
                        <i class="small material-icons teal-text">verified_user</i>
                    </div>
                    <?php
                }
                ?>
            <?php
            }
            ?>
        </div>
    </div>
    <?php if($this->session->has_userdata('login')) { ?>
    <div class="col s12 info-professional col s12">
        <a class="waves-effect waves-light btn modal-trigger red darken-1 col s4 margin-r-10" href="#modal1">Contratar</a>
        <?php if ($professional['favorite']) { ?>
            <a class="waves-effect waves-light btn red darken-1 col s4" id="favorite">Favoritar</a>
        <?php } else { ?>
            <a class="waves-effect waves-light btn red-text text-darken-1 btn-border-red-darken-1 col s4" id="favorite">Favoritado</a>
        <?php } ?>
        <div id="modal1" class="modal">
            <div class="modal-content">
                <?php if($this->session->has_userdata('login')) { ?>
                    <h5>Informações para o profissional</h5>

                    <div class="row">
                        <?php echo form_open('ServiceController/insert'); ?>
                            <div class="input-field col s12 m6 l6" id="type_time">
                                <?php
                                $options = [
                                    '2' => 'Atendimento Programado',
                                    '1' => 'Atendimento Urgente(agora)',
                                ];

                                echo form_dropdown('type_time', $options, '', 'id="dropdown_service"');
                                ?>
                            </div>
                            <div class="input-field col s12 m6 l6" id="type_payment">
                                <?php
                                $options = [
                                    '1' => 'Pagamento pelo sistema',
                                    '2' => 'Cartão (crédito)',
                                    '3' => 'Cartão (débito)',
                                    '4' => 'Dinheiro',
                                ];

                                echo form_dropdown('type_payment', $options, '', 'id="dropdown_service"');
                                ?>
                            </div>
                            <?php
                                echo form_hidden([
                                    "professional" => $this->input->get('id')
                                ]);
                            ?>
                            <div id="date-time" class="show-content">
                                <div class="input-field col s6 m6 l6">
                                    <?php
                                        echo form_label("Data:", 'date', 'class="active"');
                                        echo form_input([
                                            "name" => 'date',
                                            "id" => 'date',
                                            "class" => 'validate',
                                            "type" => 'date'
                                        ]);
                                    ?>
                                </div>
                                <div class="input-field col s6 m6 l6">
                                    <?php
                                        echo form_label("Hora:", 'time', 'class="active"');
                                        echo form_input([
                                            "name" => 'time',
                                            "id" => 'time',
                                            "class" => 'validate',
                                            "type" => 'time'
                                        ]);
                                    ?>
                                </div>
                            </div>
                            <div class="input-field col s12 m12 l12">
                                <?php
                                    echo form_label("Descrição:", 'description');
                                    echo form_textarea([
                                        "name" => 'description',
                                        "id" => 'textarea1',
                                        "class" => 'materialize-textarea'
                                    ]);
                                ?>
                            </div>

                            <div class="modal-footer">
                                <?php
                                    echo form_button([
                                        "class" => "modal-action modal-close waves-effect waves-green btn-flat red darken-1 white-text",
                                        "content" => "Contratar",
                                        "id" => "btn-submit",
                                        "type" => "submit"
                                    ]);
                                ?>
                            </div>
                        <?php echo form_close(); ?>

                    </div>

                <?php } else {?>

                    <h5>Para contratar um profissional, será necessário se logar ou se cadastrar.</h5>

                    <div class="modal-footer row">
                        <a href="<?= base_url('UserController/openForm')?>" class="modal-action modal-close waves-effect waves-green btn-flat red darken-1 white-text col s10 text-center">Cadastre-se</a>
                        <a href="<?= base_url('LoginController')?>" class="modal-action modal-close waves-effect waves-green btn-flat blue darken-4 white-text col s6 text-center">Login</a>
                    </div>

                <?php } ?>

            </div>
        </div>
        <?php
        if($this->session->has_userdata('login')) {
            ?>
            <ul class="collection with-header col s12 no-padding no-overflow" id="rating-professional">
                <li class="collection-header blue darken-4 white-text padding-5"> Avaliação Professional</li>
                <li class="padding-5 flex-center">
                    <div id="circle-rating" class="col s3">
                        <span class="col s12 no-padding blue-text text-darken-4"><?= $professional['evaluation'] ?></span>
                    </div>
                    <div class="col s8 offset-s1 no-padding">
                        <?php if ($professional['amount_service'] > 0) { ?>
                            <p class="no-padding"><?= $professional['amount_service'] ?> avaliações(s) até o
                                momento.</p>
                        <?php } else { ?>
                            <p class="no-padding">Profissional sem avaliação.</p>
                        <?php } ?>
                    </div>
                </li>
            </ul>

            <ul class="collection with-header col s12 no-padding no-overflow" id="rating-professional">
                <li class="collection-header blue darken-4 white-text padding-5">Categorias profissionais</li>
                <?php
                foreach ($categories as $value) {
                    ?>
                    <li class="collection-item categories">
                        <span><?= $value['category'] ?></span>
                    </li>
                    <?php
                }
                ?>
            </ul>
        <?php
        }
        ?>
    </div>
    <?php } ?>

</div>

<script>
    $(document).ready(function(){
        $('.modal').modal();

        $('#textarea1').trigger('autoresize');

        $('#type_time').on('change', function() {
            if($('#dropdown_service').val()) {
                $('#date-time').toggleClass("show-content hide-content");
            }
        });

        $('#date').on('blur', function () {
            if(Date.now() > $('#date')['0'].valueAsNumber){
                $( "#date" ).removeClass("valid").addClass("invalid");
                submit.setAttribute("disabled","disabled");
            }else{
                $( "#date" ).removeClass("invalid").addClass("valid");
                submit.removeAttribute("disabled");
            }
        });

        $('#favorite').on('click', function () {

            const professionalId = <?php echo $this->input->get('id'); ?>;
            $.ajax({
                type: "POST",
                url: document.location.origin + "/index.php/UserController/favoriteProfessional",
                data: {
                    'professional': professionalId
                },
                success: function(){
                    if($('#favorite').text() == 'Favoritar') {
                        $('#favorite').text('Favoritado').removeClass().addClass('waves-effect waves-light btn modal-trigger red-text text-darken-1 white btn-border-red-darken-1 col s4');
                    } else {
                        $('#favorite').text('Favoritar').removeClass().addClass('waves-effect waves-light btn modal-trigger red darken-1 col s4');
                    }
                }
            });
        });

    });
</script>

