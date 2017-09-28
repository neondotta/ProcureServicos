<p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>

<form id="ServiceRequest" action="<?= current_url() ?>" method='post'>

    <div class="form-group">
        <!-- provider_counter service id  !-->
        <button type="button" class="waves-effect waves-light btn col s4" onclick="RelatedLocationAjax();">
                <span class="hide-on-med-and-down">
                    <i class="material-icons left">group</i>
                    USUÁRIO
                </span>
            <i class="material-icons hide-on-large-only">group</i>
        </button>
        <div class="card-panel light-blue col s12">
            <span class="white-text notification" id="info"></span>
        </div>
        <!-- display map  !-->
        <div id="map" class="google-map col s10"></div>
        <!-- current latituide and longtuide  !-->
        <input id="latitude" type="hidden" value="" />
        <input id="longitude" type="hidden" value="" />

    </div>

    <div id='submit_button'>
        <input class="btn btn-success" type="submit" name="submit" value="add comment"/>
    </div>
</form>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY"></script>
<script src="<?= base_url() ?>public/js/googleMaps.js"></script>

<!--script src="<?= base_url() ?> public/js/geocomplete.min.js"></script -->
<!--script async defer
        src="https://maps.googleapis.com/maps/api/js?libraries=places&en=pt-br&key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY">
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWX5CTUo9pl2mXPJ9x4-uL2XF-0HH5IOw=initialize">
</script -->
<!-- script src="https://maps.googleapis.com/maps/api/js?libraries=places&en=pt-br&key=AIzaSyDNyLsAhFt4hIZKeNJYC244jPPayM0GhrY"></script -->