<p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>

<form id="ServiceRequest" action="<?= current_url() ?>" method='post'>

    <div class="form-group">
        <label class="control-label">ServiceType:</label>
        <select name="Service_type" class="form-control" id="idMap">
            <option>--all--</option>
            <option value="1" selected>Service One</option>
            <option value="2">Service Two</option>
        </select>
    </div>

    <div class="form-group">
        <!-- provider_counter service id  !-->
        <label for="provider_counter" class="control-label">Usuários Próximos :</label>
        <div class="text-lg-center alert-danger" id="info"></div>
        <!-- display map  !-->
        <div id="map" style="height: 600px; width:800px;"></div>
        <!-- current latituide and longtuide  !-->
        <input id="idUser" name="id" type="hidden" value="" />
        <input id="latitude" type="hidden" value="" />
        <input id="longitude" type="hidden" value="" />
        <button type="button" onclick="RelatedLocationAjax();">Mostrar usuários</button>
    </div>

    <div id='submit_button'>
        <input class="btn btn-success" type="submit" name="submit" value="add comment"/>
    </div>
</form>

<script src="<?= base_url() ?>public/js/jquery-3.2.1.min.js"></script>
<!--script src="<?= base_url() ?> public/js/geocomplete.min.js"></script -->

<script
        src="https://maps.googleapis.com/maps/api/js?libraries=places&en=pt-br&key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY">
</script>
<script src="<?= base_url() ?>public/js/googleMaps.js"></script>
<!--script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWX5CTUo9pl2mXPJ9x4-uL2XF-0HH5IOw=initialize">
</script -->

<!-- script src="https://maps.googleapis.com/maps/api/js?libraries=places&en=pt-br&key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY"></script -->