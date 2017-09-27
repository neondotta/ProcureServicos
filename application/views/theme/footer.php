<script>
    $(document).ready(function() {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
        $('.button-collapse').sideNav('hide');

        setTimeout(function() {
            $("#card-alert").slideToggle(500);
        }, 3000);

    });
</script>

</body>
</html>