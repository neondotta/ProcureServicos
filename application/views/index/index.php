
<div class="container medium">
    <div class="row ">

        <form id="ServiceRequest" action="<?= current_url() ?>" method='post'>
            <!-- current latituide and longtuide  !-->
            <input id="idUser" name="id" type="hidden" value="" />
            <input id="latitude" type="hidden" value="" />
            <input id="longitude" type="hidden" value="" />
        </form>

        <div class="col s12 hide-content" id="filter-professional">
            <div class="input-field col s8">
                <select multiple>
                    <option value="" disabled selected>Profissional</option>
                    <?php foreach ($categories as $c) : ?>
                    <option value="<?php echo $c['id'] ?>"><?php echo $c['category'] ?></option>
                    <?php endforeach ?>
                </select>
                <label>Categoria de profissional</label>
            </div>

            <div class="input-field col s4">
                <select>
                    <option value="" disabled selected>Nota fiscal</option>
                    <option value="1">Sim</option>
                    <option value="2">Não</option>
                </select>
            </div>
        </div>

        <div class="col s12 main-button">

            <button type="button" class="waves-effect waves-light btn col s4 l4 m4 blue darken-4" onclick="UserLocationAjax();">
                <span class="hide-on-med-and-down">
                    <i class="material-icons left">group</i>
                    USUÁRIO
                </span>
                <i class="material-icons hide-on-large-only">group</i>
            </button>

            <a href="<?=base_url()?>ServicesMap" class="waves-effect waves-light btn col s4 l4 m4 blue darken-4">
                <span class="hide-on-med-and-down">
                    <i class="material-icons left">map</i>MAPA
                </span>
                <i class="material-icons hide-on-large-only">map</i>
            </a>

            <button type="button" class="waves-effect waves-light btn col s4 l4 m4 blue darken-4" id="search-professional">
                <span class="hide-on-med-and-down">
                    <i class="material-icons left">search</i>
                    FILTRO
                </span>
                <i class="material-icons hide-on-large-only">search</i>
            </button>

        </div>

        <div class="card-panel light-blue col s12">
            <span class="white-text notification" id="info"></span>
        </div>

        <ul class="collection"></ul>

    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY"></script>
<script src="<?= base_url() ?>public/js/googleMaps.js"></script>
<script src="<?= base_url() ?>public/js/service.js"></script>