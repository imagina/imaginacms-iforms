@section('scripts-owl')
    <script>
        $(document).ready(function () {
            var formid = '#{{$id}}';
            $(formid).submit(function (event) {
                event.preventDefault();
                var $form = $(this).serializeArray(),
                    url = $(this).attr("action");
                var posting = $.post(url, $form);
                posting.done(function (response) {
                    var content = response.status;

                    if (content == "success") {
                        $(".content-form{{$options['rand']}}").html('<p class="alert bg-primary" role="alert"><span>{{trans("iforms::form.form.sent")}}</span> </p>');
                    }
                    else if(content == "fail") {
                        $.each(response.data,function (index, value) {
                            $(".content-form{{$options['rand']}} .formerror").append('<p class="alert alert-danger" role="alert"><span>' + value + '</span> </p>');
                        });
                    }
                    else {
                        $(".content-form{{$options['rand']}} .formerror").append('<p class="alert bg-primary" role="alert"><span>' + response.message + '</span> </p>');
                    }

                });

            });
        })
    </script>

    @parent
@endsection