<div class="container row">

<div class="col s12">    
    <ul class="collection with-header">
        <li class="collection-header"><h4>Solicitações de Serviços</h4></li>

        <?php
        if(!is_null($services)) :
        foreach($services as $s) : 
        ?>
            <li class="collection-item avatar">
            <span class="title"><?php echo ucfirst($s['description']);?></span>
    
            <p><?php echo date("d/m/Y", strtotime($s['date']));?> <br>
                <?php echo ucfirst($s['name']);?>   <br>
                <?php echo ucfirst($s['service_status']); ?>
            </p>
            <a href="<?= base_url().'ServiceController/viewService/'.$s['id'] ?>" class="secondary-content waves-effect waves-light  modal-trigger"><i class="material-icons">search</i></a>
            </li>  
            
        <?php endforeach ;
        endif;
        ?>
    </ul>

    
</div>
</div>
<script src="<?= base_url() ?>public/js/service.js"></script>