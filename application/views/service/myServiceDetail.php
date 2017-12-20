<?php $readonly = ''; $disabled = ''; ?>
<div class="container row">

<div class="col s12">    
        <?php foreach($result as $s) : 
                if($s['serviceStatus'] != 5) {
                    $disabled = 'disabled';
                }
        ?>
       
            <div class="">
                <div>
                    <div class="row">
                        <div class="col s9">
                        <h5 >Detalhes do Serviço</h5>
                            <strong>Usuário:</strong> <?= ucfirst($s['name']) ?><br>
                            <strong>Data:</strong> <?= date("d/m/Y", strtotime($s['date'])); ?><br>
                            <strong>Horário:</strong> <?= $s['time'] ?><br>
                            <strong>Endereço:</strong> <?= $s['street'].', '.$s['number'].' / '.$s['complement'].' - '.$s['city']?><br><br>
                            <strong>Descrição:</strong> <?= $s['description'] ?><br><br>
                            <strong> <?= $s['service_status'] ?></strong><br><br>
                            <input type="hidden" id="serviceId" value="<?= $s['serviceId'] ?>">
                            <label for="price">Valor do serviço:</label>
                            <input type="text" name="price" id="price" readonly placeholder="Valor do Serviço" value="<?= $s['value'] ?>">
                            <?php if ($s['serviceStatus'] == 3) : ?>
                            <a class="waves-effect waves-light btn modal-trigger green darken-1 col s5" id="userAccept" >Aceitar Valor</a>                            
                            <?php elseif($s['serviceStatus'] == 6): ?>
                            <a class="waves-effect waves-light btn modal-trigger red darken-1 col s5" id="confirmFinish"> Finalizar Serviço </a> 
                            <?php elseif($s['serviceStatus'] == 5): ?>
                            <a class="waves-effect waves-light btn modal-trigger green darken-1 col s5" <?=$disabled?> id="confirmService">Confirmar Início</a> 
                            
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>  
      
            <?php endforeach ?>
    
</div>
</div>
<div id="modal1" class="modal">
            <div class="modal-content">
                <h5 class="center-align">Avaliação do Serviço</h5><br>
                <div class="row">
                    <div class="col s12 center-align">
                        <form action="">
                        <input class="star star-5" id="star-5-2" type="radio" name="star"/>
                        <label class="star star-5" for="star-5-2"></label>
                        <input class="star star-4" id="star-4-2" type="radio" name="star"/>
                        <label class="star star-4" for="star-4-2"></label>
                        <input class="star star-3" id="star-3-2" type="radio" name="star"/>
                        <label class="star star-3" for="star-3-2"></label>
                        <input class="star star-2" id="star-2-2" type="radio" name="star"/>
                        <label class="star star-2" for="star-2-2"></label>
                        <input class="star star-1" id="star-1-2" type="radio" name="star"/>
                        <label class="star star-1" for="star-1-2"></label><br>
                        <div class="input-field col s12">
                            <textarea id="description" class="materialize-textarea"></textarea>
                            <label for="textarea1">Registre sua opinião</label>
                        </div>
                        <a class="waves-effect waves-light btn modal-trigger green darken-1 col s12" id="serviceRating" >Enviar</a>    
                        </form>
                    </div>
                </div>
            </div>
</div>
<script src="<?= base_url() ?>public/js/service.js"></script>
<script>
    $(document).ready(function(){
        $('.modal').modal();          
    });
</script>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?= base_url('public/css/stars.css')?>" type="text/css">