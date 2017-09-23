
<p class="notice error"><?= $this->session->flashdata('error_msg') ?></p><br/>

<form id="ServiceRequest" action="<?= current_url() ?>" method='post'>
    <input id="latitude" type="hidden" value="" />
    <input id="longitude" type="hidden" value="" />
</form>

<ul class="s12 m12 l11 collection">
    <li class="collection-item avatar">
        <img src="<?= base_url()?>public/images/default.jpg" alt="" class="left">
        <span class="title">Title</span>
        <p>First Line <br>
            Second Line
        </p>
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
<script>
    function UserLocationAjax() {
        $.ajax({
            type: "POST",
            url: "./servicesMap/closestLocations",
            dataType: "json",
            data:"data="+ '{ "latitude":"'+ latitude.value+'", "longitude": "'+longitude.value+'", "idMap": "'+idMap.value+'" }',

            success:function(data) {
                // when request is successed add markers with results
                add_markers(data);
            }

        });
    }
</script>