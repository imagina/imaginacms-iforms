<div class="content-form">

   <form id="{{$form->title}}" class="form-inline" action="{{URL::to('/iforms/lead')}}">

      <input type="hidden" name="form_id" value="{{$form->id}}" required="">

      @include('iforms::frontend.form.bt-inline.fields')
      
      <button type="submit" class="btn btn-primary">Enviar</button>
   </form>
   </div>

@section('scripts')
<script>

   $(document).ready(function(){

      var formid='#{{$form->title}}';

      $( formid ).submit(function( event ) {

         // Stop form from submitting normally

         event.preventDefault();
         // Get some values from elements on the page:

         var $form =  $(this).serializeArray(),
                 url = $(this).attr( "action" );
         // Send the data using post

         var posting = $.post( url, $form );

         // Put the results in a div

         posting.done(function( data ) {

            var content =  data.status;
            if(content=="success"){

               $(".content-form").html('<p class="alert bg-primary" role="alert"><span>Registro Enviado</span> </p>')
            }

            else {

               $(".content-form").html('<p class="alert bg-primary" role="alert"><span>'+data.msg+'</span> </p>')
            }
         });

      });

   })

</script>

@parent

@endsection