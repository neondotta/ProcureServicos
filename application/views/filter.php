
<h4 class="center">Busca por filtros</h4>
<div class="valign-wrapper">
    <div class="form col s12 m10 l8">
        <div class="row">
            <div class="input-field col s12 m12 l12">
                <?php
                
                echo form_open('ServicesFilter/searchByFilter');

                foreach($category as $c){
                    $options[$c['id']] = $c['category'];                    
                }
                $js = 'id="category" ';
                echo form_dropdown('category',$options,false, $js);
                ?>
            </div>
            
        </div>
    </div>
</div>
<div class="card-panel light-blue col s12">
            <span class="white-text notification" id="info"></span>
</div>
<ul class="collection"></ul>

<script src="<?= base_url() ?>public/js/filters.js"></script>