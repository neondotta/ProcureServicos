
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
                            <strong>Horário:</strong> <?= $s['time'] ?><br><br>
                            <strong>Descrição:</strong> <?= $s['description'] ?><br><br>
                            <strong> <?= $s['service_status'] ?></strong><br><br>
                            <input type="hidden" id="serviceId" value="<?= $s['serviceId'] ?>">
                            <label for="price">Valor do serviço:</label>
                            <input type="text" name="price" id="price" readonly placeholder="Valor do Serviço" value="<?= $s['value'] ?>">
                            <a class="waves-effect waves-light btn modal-trigger green darken-1 col s4" id="userAccept" >Aceitar Valor</a>                            
                        </div>
                    </div>
                </div>
            </div>  
      
            <?php endforeach ?>
    
</div>
</div>
<script src="<?= base_url() ?>public/js/service.js"></script>