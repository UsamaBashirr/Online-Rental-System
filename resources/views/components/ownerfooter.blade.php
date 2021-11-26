<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Rental System</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>


<!-- Js Plugins -->
<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>
<script src="{{ URL::asset('js/all.min.js') }}"></script>
<script src="{{ URL::asset('js/ownermain.js') }}"></script>

<script>
    $(document).ready(function() {

        // Category
        $('#category').on('change', function() {

            var catid = this.value;
            $.ajax({
                url: 'show_subcategories/' + catid,
                type: 'get',
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    string = "";
                    $.each(data, function(i, v) {

                        string += "<option value=" + v['id'] + ">" + v['name'] +
                            "</option>"
                    });
                    $('#subcategory').html(string);

                }

            });
        });


    });
</script>
</body>

</html>
