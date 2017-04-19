<div class="content-form">
   <form id="{{$form->title}}" class="form-horizontal" action="{{url('/iforms/lead')}}">
      <input type="hidden" name="form_id" value="{{$form->id}}" required="">
      @include('iforms::frontend.form.bt-nolabel.fields')
      @if(Setting::get('iforms::captcha')=="1")
         <div class="g-recaptcha" data-sitekey="{{Setting::get('iforms::api') or ''}}"></div>
      @endif
      <div class="form-group">
         <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">{{trans('iforms::forms.forms.submit')}}</button>
         </div>
      </div>
   </form>

   </div>
@section('scripts-owl')
   @parent
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
               $(".content-form").html('<p class="alert bg-primary" role="alert"><span>{{trans("iforms::forms.forms.sent")}}</span> </p>')
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
