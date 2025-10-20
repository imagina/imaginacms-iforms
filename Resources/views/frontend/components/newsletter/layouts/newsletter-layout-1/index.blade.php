<div class="newsletter form-content-{{ $form->system_name }} mb-4 position-relative">
    <x-isite::edit-link link="/iadmin/#/form/fields/{{$form->id}}"
                        :tooltip="trans('iforms::common.editLink.tooltipForm')"/>
  <h4 class="title {{$titleClasses}}">{{ $title ?? $form->title }}</h4>
  @if(!empty($description))
  <p class="description {{$descriptionClasses}}">{{ $description }}</p>
  @endif
  <form id="form{{ $form->system_name }}" method="post" action="{{ route('api.iforms.leads.create') }}">
    @foreach($fields as $field)
      <div class="input-group mb-3">
        <input
               type="{{$field->present()->type['value'] ?? 'text'}}"
               class="form-control {{$inputClasses}}"
               placeholder="{{$field->placeholder ?? $field->name}}"
               name="{{$field->name}}"
               required
               aria-label="{{$field->placeholder ?? $field->name}}">
        <div class="input-group-append">
          <button class="{{$buttonClasses}}" type="submit">
            {{ $submitLabel }}
          </button>
        </div>
      </div>
    @endforeach
    @if(!empty($postDescription))
      <p class="post-description {{$postDescriptionClasses}}">{{ $postDescription }}</p>
    @endif
    <x-isite::captcha formId="{{'form'.$form->system_name }}"/>
  </form>
  <div class="formerror"></div>
</div>
@section('scripts-owl')
  @parent
    <script type="text/javascript" defer>
    $(document).ready(function () {
      var formid = '#form{{ $form->system_name }}';
      $(formid).submit(function (event) {
        event.preventDefault();
        var info = objectifyFormSubscription($(this).serializeArray());
        info.form_id = '{{ $form->id }}'
        $.ajax({
          type: 'POST',
          url: $(this).attr('action'),
          dataType: 'json',
          data:  info,
          success: function (data) {
            $(".form-content-{{ $form->system_name }}").html('<p class="alert bg-primary text-white mb-0 mt-3" role="alert"><span>' + data.data + '</span> </p>');
          },
          error: function ( data ) {
            $( '#loading-form' ).css( 'display', 'none' );
            var errors = {};
            var res = data?.responseJSON;

            errors = typeof res === 'object' ? res?.messages : JSON.parse( res?.messages || '' );

            for ( var x in errors ) {
              var messages = JSON.parse( errors[ x ]?.message );
              var message = '';
              for ( var m in messages ) {
                message = !messages[ m ][ 0 ] ? messages[ m ][ 0 ] : '{{trans('iforms::leads.messages.error while sending message')}}';
                $( ".content-form{{$formId}} .formerror" ).append( '<p class="alert alert-danger" role="alert"><span>' + message + '</span> </p>' );
              }
            }
          }
        })
      })
    });

    function objectifyFormSubscription(formArray) {//serialize data function

      var returnArray = {};
      for (var i = 0; i < formArray.length; i++) {
        returnArray[formArray[i]['name']] = formArray[i]['value'];
      }
      return returnArray;
    }
  </script>
@stop
