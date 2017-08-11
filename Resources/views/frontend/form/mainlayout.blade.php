
@yield('content')
@section('scripts-owl')

    <script>
        $(document).ready(function () {
            var formid = '#{{$id}}';
            $(formid).submit(function (event) {
                // Stop form from submitting normally
                event.preventDefault();

                // Get some values from elements on the page:
                var $form = $(this).serializeArray(),

                    url = $(this).attr("action");

                // Send the data using post
                var posting = $.post(url, $form);

                // Put the results in a div
                posting.done(function (response) {
                    var content = response.status;

                    if (content == "success") {
                        $(".content-form").html('<p class="alert bg-primary" role="alert"><span>{{trans("iforms::form.form.sent")}}</span> </p>')
                    }
                    else if(content == "fail") {
                        $.each(response.data,function (index, value) {
                            $(".content-form .formerror").append('<p class="alert alert-danger" role="alert"><span>' + value + '</span> </p>');
                        });

                    }
                    else {
                        $(".content-form .formerror").append('<p class="alert bg-primary" role="alert"><span>' + response.message + '</span> </p>')
                    }

                });

            });
        })
    </script>

    @parent
@endsection