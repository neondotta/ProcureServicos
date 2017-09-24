
<form id="ServiceRequest" action="<?= current_url() ?>" method='post'>
    <label for="provider_counter" class="control-label">Usuários Próximos :</label>
    <div class="text-lg-center alert-danger" id="info"></div>
    <!-- current latituide and longtuide  !-->
    <input id="idUser" name="id" type="hidden" value="" />
    <input id="latitude" type="hidden" value="" />
    <input id="longitude" type="hidden" value="" />
    <button type="button" class="waves-effect waves-light btn" onclick="UserLocationAjax();">Mostrar usuários</button>
    <a href="<?=base_url()?>index.php/servicesMap" class="waves-effect waves-light btn">Mostrar Mapa</a>
</form>

<ul class="s12 m12 l11 collection"></ul>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY"></script>
<script src="<?= base_url() ?>public/js/googleMaps.js"></script>