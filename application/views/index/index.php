<div class="container medium">
    <div class="row ">
        <form id="ServiceRequest" action="<?= current_url() ?>" method='post'>
            <!-- current latituide and longtuide  !-->
            <input id="idUser" name="id" type="hidden" value="" />
            <input id="latitude" type="hidden" value="" />
            <input id="longitude" type="hidden" value="" />
            <button type="button" class="waves-effect waves-light btn" onclick="UserLocationAjax();">
                <i class="material-icons left">group</i>Procurar usuários</button>
            <a href="<?=base_url()?>index.php/servicesMap" class="waves-effect waves-light btn">
                <i class="material-icons left">map</i>Show Map</a>
        </form>
        <div class="card-panel light-blue">
            <span class="white-text notification" id="info"></span>
        </div>

        <ul class="collection"></ul>

    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY"></script>
<script src="<?= base_url() ?>public/js/googleMaps.js"></script>