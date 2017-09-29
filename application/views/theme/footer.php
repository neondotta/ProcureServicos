<script>
    $(document).ready(function() {
        $(".dropdown-button").dropdown();
        $(".button-collapse").sideNav();
        $('.button-collapse').sideNav('hide');

        setTimeout(function() {
            $("#card-alert").slideToggle(500);
        }, 3000);


        $('.search').click(function () {
           $('.filter-professional').toggleClass("show-content");
        });
    });
</script>

</body>
</html>