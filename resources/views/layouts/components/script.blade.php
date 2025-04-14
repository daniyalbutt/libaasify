<script src="{{ asset('front/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('front/js/popper.min.js') }}"></script>
<script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front/js/slick.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('front/js/simplyCountdown.min.js') }}"></script>
<script src="{{ asset('front/js/aos.js') }}"></script>
<script src="{{ asset('front/js/theme.js') }}"></script>

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

        var stock = 100;
        $(".plus").click(function() {
            var count = parseInt($(this).prev().val());
            if (count < stock) {
                count += 1;
                $(".qty-value").val(count);
            } else {
                // Show toastr notification if stock is full
                toastr.error('Stock is full');
            }
        });


        $(".minus").click(function() {
            var count = parseInt($(this).next().val());
            if (count > 1) {
                count -= 1;
                $(".qty-value").val(count)
            }
        });

        if($(".qty-value").length != 0){

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
        }

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
