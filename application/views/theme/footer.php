
<script src="<?= base_url('public/js/validForms.js')?>"></script>
<script>
    $(document).ready(function() {

        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
        $('.button-collapse').sideNav('hide');

        setTimeout(function() {
            $("#card-alert").slideToggle(500);
        }, 3000);


        $('#search-professional').on("click", function () {
           $('#filter-professional').toggleClass("show-content hide-content");
        });

        $('select').material_select();
            
        $('.lever').on("click", function () {
            $.ajax({
                type: "POST",
                url: "./index.php/UserController/statusUser",
                dataType: "json"
            });
        });

        $.ajax({
            type: "POST",
            url: document.location.origin + "/index.php/UserController/checkStatus",
            success: function(data){
                jQuery('#statusUser').material_select();
                if (data == false) {
                    console.log('sucesso');
                    jQuery('#statusUser').material_select();
                    return jQuery('#statusUser').removeAttr('checked').change();
                }
                console.log('sucesso2');
                return jQuery('#statusUser').attr('checked', 'checked').change();

            }
        });


    });


</script>

</body>
</html>