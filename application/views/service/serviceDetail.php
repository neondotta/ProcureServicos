<?php $readonly = ''; $disabled = ''; ?>
<div class="container row">

<div class="col s12">    
        <?php foreach($result as $s) : ?>
            <div id="modal<?= $s['id'] ?>" class="">
                <div class="modal-content">
                    <div class="row">
                        <div class="col s9">
                        <h5>Detalhes do Serviço</h5>
                            <strong>Usuário:</strong> <?= ucfirst($s['name']) ?><br>
                            <strong>Data:</strong> <?= date("d/m/Y", strtotime($s['date'])); ?><br>
                            <strong>Horário:</strong> <?= $s['time'] ?><br>
                            <?php if ($s['serviceStatus'] != 0 || $s['serviceStatus'] != 3): 
                                $readonly = "readonly";
                                $disabled = 'disabled'
                            ?>
                                <strong>Endereço:</strong> <?= $s['street'].', '.$s['number'].' / '.$s['complement'].' - '.$s['city']?><br><br>
                            <?php endif ?>
                            <strong>Descrição:</strong> <?= $s['description'] ?><br><br>
                            
                            <strong> <?= $s['service_status'] ?></strong><br><br>
                            <input type="hidden" id="serviceId" value="<?= $s['serviceId'] ?>">
                            <label for="price">Valor do serviço:</label>    
                            <input type="text" name="price" id="price" placeholder="Valor do Serviço"   value="<?= $s['value'] ?>">

                            <?php if ($s['serviceStatus'] == 0 || $s['serviceStatus'] == 3) : ?>
                            <a class="waves-effect waves-light btn modal-trigger red darken-1 col s4" id="accept">Aceitar Serviço</a>  
                            <?php elseif($s['serviceStatus'] == 1): ?>
                            <a class="waves-effect waves-light btn modal-trigger red darken-1 col s4" id="finishService">Finalizar Serviço</a> 
                            <?php elseif($s['serviceStatus'] == 4): ?>
                            <a class="waves-effect waves-light btn modal-trigger green darken-1 col s4" id="startService">Iniciar Serviço</a>                                 
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>  
      
            <?php endforeach ?>
    
</div>
</div>
<script src="<?= base_url() ?>public/js/service.js"></script>