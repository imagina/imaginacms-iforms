@section('scripts-owl')
  @parent
  <style>
    #loading-form {
      display: none;
      position: absolute;
      background-color: rgba(0, 0, 0, 0.6);
      z-index: 1000000;
      width: 100%;
      height: 100%;
    }

    .lds-spinner {
      color: #fff;
      display: block;
      position: relative;
      width: 64px;
      height: 64px;
      margin: auto;
      background: #fff;
      top: 50%;
    }
  </style>
  <script>

      $(document).ready(function () {
          var formid = '#{{$formId}}';
          $(formid).submit(function (event) {
              event.preventDefault();
              var info = objectifyForm($(this).serializeArray());
              var submitEvent = '{{ $submitEvent ?? '' }}';
              if(submitEvent != ''){
                window.livewire.emit(submitEvent, info);
              }else {
                $.ajax({
                  type: 'POST',
                  url: $(this).attr('action'),
                  dataType: 'json',
                  data: {attributes: info},
                  beforeSend: function (data) {
                    $('#loading-form').css('display', 'block');
                  },
                  success: function (data) {
                    $('#loading-form').css('display', 'none');
                    $(".content-form{{$formRand}}").html('<p class="alert bg-primary" role="alert"><span>' + data.data + '</span> </p>');

                  },
                  error: function (data) {
                    $('#loading-form').css('display', 'none');
                    var errors = JSON.parse(data.responseJSON.errors);
                    for (var x in errors) {
                      $(".content-form{{$formRand}} .formerror").append('<p class="alert alert-danger" role="alert"><span>' + errors[x] + '</span> </p>');
                    }

                  }
                });
              }
          });
      });
  </script>
@endsection
@once
    @section('scripts-owl')
        @parent
        <script>
          function objectifyForm(formArray) {//serialize data function

            var returnArray = {};


            for (var i = 0; i < formArray.length; i++) {
              var $obj = $("[name='"+formArray[i]['name']+"'] option:selected");
              var $val = []
              if($obj.length>0) {
                $obj.each(function() {
                  $val.push($(this).val());
                });
                returnArray[formArray[i]['name']] = $val.join(', ');
              }else{
                returnArray[formArray[i]['name']] = formArray[i]['value'];
              }
            }
            return returnArray;
          }
        </script>
    @stop
@endonce
