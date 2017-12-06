<div class="container row">

<div class="col s12">    
    <ul class="collection with-header">
        <li class="collection-header"><h4>Serviços</h4></li>
        <?php foreach($services as $s) : ?>
            <li class="collection-item avatar">
            <span class="title"><?php echo ucfirst($s['description']);?></span>
    
            <p><?php echo date("d/m/Y", strtotime($s['date']));?> <br>
                <?php echo ucfirst($s['name']);?>   <br>
                <?php echo ucfirst($s['service_status']); ?>
            </p>
            <a href="#modal1" class="secondary-content waves-effect waves-light  modal-trigger"><i class="material-icons">search</i></a>
            </li>  
            <div id="modal1" class="modal">
                <div class="modal-content">
                    <div class="row">
                        <div class="col s9">
                        <h5>Detalhes do Serviço</h5>
                            <strong>Usuário:</strong> <?= ucfirst($s['description']) ?><br>
                            <strong>Data:</strong> <?= date("d/m/Y", strtotime($s['date'])); ?><br>
                            <strong>Horário:</strong> <?= $s['time'] ?><br><br>
                            <br>
                            <input type="text" name="price" id="price" placeholder="Valor do Serviço">
                        </div>
                    </div>
                </div>
            </div>  
        <?php endforeach ?>
    </ul>

    
</div>
</div>
<script>
    $(document).ready(function(){
        $('.modal').modal();
    });
</script>