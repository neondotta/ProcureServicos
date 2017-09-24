
<form id="ServiceRequest" action="<?= current_url() ?>" method='post'>
    <label for="provider_counter" class="control-label">Usuários Próximos :</label>
    <div class="text-lg-center alert-danger" id="info"></div>
    <!-- current latituide and longtuide  !-->
    <input id="idUser" name="id" type="hidden" value="" />
    <input id="latitude" type="hidden" value="" />
    <input id="longitude" type="hidden" value="" />
    <button type="button" class="waves-effect waves-light btn-large" onclick="UserLocationAjax();">Mostrar usuários</button>
</form>

<ul class="s12 m12 l11 collection">
    <li class="collection-item avatar">
        <img src="<?= base_url()?>public/images/default.jpg" alt="" class="left">
        <span class="title" id="nameProfessional"></span>
        <p id="emailProfessional">1</p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
    </li>
    <li class="collection-item avatar">
        <img src="<?= base_url()?>public/images/default.jpg" alt="" class="left">
        <span class="title">Title</span>
        <p>First Line <br>
            Second Line
        </p>
        <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
    </li>
</ul>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY"></script>
<script src="<?= base_url() ?>public/js/googleMaps.js"></script>