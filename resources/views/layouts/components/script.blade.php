<!-- JS Library-->
<script type="text/javascript" src="{{ asset('plugins/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/owl-carousel/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/gmap3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/imagesloaded.pkgd.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/isotope.pkgd.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery.matchHeight-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/slick/slick/slick.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/elevatezoom/jquery.elevatezoom.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC9UyRrFn8cIqD5cAtLYg3aVSNREWuaQQ&callback=initMap"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('front/js/main.js') }}"></script>

<script src="{{ asset('admin/js/toastr.js') }}"></script>
<script src="{{ asset('admin/js/script.js') }}"></script>
<script>
    $('.contactform').submit(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            _token: "{{ csrf_token() }}",
            url: "{{ route('inquiry.submit') }}",
            type: "post",
            ata: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                $('.contactform')[0].reset();
                if (response.status) {
                    toastrShow('Sumbitted', response.message)

                } else {
                    toastrShow('Cannot Submit', response.message)
d
                }
            }
        });
    })
</script>

<script>
    $('#newsletter-btn').click(function() {
        if ($('#newsletter_email').val().length > 0) {
            var requestData = {
                type: 'newsletter',
                email: $('#newsletter_email').val()
            };

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('inquiry.submit') }}",
                type: "post",
                data: JSON.stringify(requestData),
                contentType: "application/json",
                dataType: "json",
                success: function(response) {

                    $('#newsletter_email').val('');
                    if (response.status == true) {
                        toastrShow('Sumbitted', response.message)

                    } else {
                        console.log(response.message);
                        toastrShow('Error', response.message, 'error')

                    }
                },
                error: function(response) {
                    console.log(response);

                    if (response.message) {
                        toastrShow('Error', response.message, 'error')
                    }
                }

            });
        } else {
            toastrShow('Error', 'Email should not be empty', 'error');
        }
    });
</script>

<script>
    $(document).ready(function() {
        var count = 1;
        var stock = parseInt($("#input-qty").attr("max"));
        $(".plus").click(function() {
            if (count < stock) {
                count += 1;
                $(".qty-value").val(count);
            } else {
                // Show toastr notification if stock is full
                toastr.error('Stock is full');
            }
        });


        $(".minus").click(function() {
            if (count > 1) {
                count -= 1;
                $(".qty-value").val(count)
            }
        });

        var input = document.querySelector('.qty-value');

        input.addEventListener('input', function() {
            var value = input.value;

            value = value.replace(/^0+/, '');

            value = value.replace(/\D/g, '');
            if (value.length > 3) {
                value = value.slice(0, 3);
            }
            input.value = value;
        });
        $(".qty-value").on('input', function() {
            var value = parseInt($(this).val());
            if (isNaN(value) || value < 1) {
                count = 1;
            } else if (value > stock) {
                count = stock;
                toastr.error('Stock is full');
            } else {
                count = value;
            }
            $(this).val(count);
        });

    });
</script>

<script>
    @if (\Session::has('success'))
        $.toast({
            heading: 'Sumbitted',
            text: "{{ Session::get('success') }}",
            showHideTransition: 'slide',
            icon: 'success'
        })
    @endif
</script>
