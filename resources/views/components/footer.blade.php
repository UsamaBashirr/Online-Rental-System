<div id="footer" class="container-fluid pb-0 mb-0 justify-content-center text-light">
    <footer>
        <div class="row my-5 justify-content-center py-5">
            <div class="col-11">
                <div class="row ">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                        <h3 class="text-muted mb-md-0 mb-5 bold-text">Rental System</h3>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-3 mb-lg-4 bold-text "><b>MENU</b></h6>
                        <ul class="list-unstyled">
                            <li>Home</li>
                            <li>About</li>
                            <li>Contact</li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b>ADDRESS</b></h6>
                        <p class="mb-1">GTS Chowk, Gujrat</p>
                        <p>Punjab, Pakistan</p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                        <p class="social text-muted mb-0 pb-0 bold-text"> <span class="mx-2"><i class="fa fa-facebook"
                                    aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square"
                                    aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter"
                                    aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-instagram"
                                    aria-hidden="true"></i></span> </p><small class="rights"><span>&#174;</span> Rental
                            System All Rights Reserved.</small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                        <h6 class="mt-55 mt-2 text-muted bold-text"><b>Muneeb Ur Rehman</b></h6><small> <span><i
                                    class="fa fa-envelope" aria-hidden="true"></i></span> muneeb@gmail.com</small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3 ">
                        <h6 class="text-muted bold-text"><b>Muhammad Zubair</b></h6><small><span><i
                                    class="fa fa-envelope" aria-hidden="true"></i></span> zubair@gmail.com</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- Footer Section End -->




<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ URL::asset('js/mixitup.min.js') }}"></script>
<script src="{{ URL::asset('js/main.js') }}"></script>
<script src="{{ URL::asset('js/popper.js') }}"></script>
<script src="{{ URL::asset('/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('js/font.js') }}"></script>

<script>
    (function($) {

        "use strict";

        var fullHeight = function() {

            $('.js-fullheight').css('height', $(window).height());
            $(window).resize(function() {
                $('.js-fullheight').css('height', $(window).height());
            });

        };
        fullHeight();

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });

    })(jQuery);
</script>

<script>
    $(document).ready(function() {

        // Counter
        $('.counter').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

    });
</script>

<script>
    // Nav
    (function($) {
        $(function() {
            $('nav ul li a:not(:only-child)').click(function(e) {
                $(this).siblings('.nav-dropdown').toggle();
                $('.dropdown').not($(this).siblings()).hide();
                e.stopPropagation();
            });
            $('html').click(function() {
                $('.nav-dropdown').hide();
            });
            $('#nav-toggle').click(function() {
                $('nav ul').slideToggle();
            });
            $('#nav-toggle').on('click', function() {
                this.classList.toggle('active');
            });
        });
    })(jQuery);
</script>
</body>

</html>
