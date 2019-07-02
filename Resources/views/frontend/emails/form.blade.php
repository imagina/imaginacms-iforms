@if(View::exists('email.plantilla'))

    @extends('email.plantilla')
@else
    @extends('iforms::frontend.emails.mainlayout')
@endif

@section('content')
    <div id="contend-mail" class="p-3">
        <h1>{{ $form->title }}</h1>
        <br>
        <div style="margin-bottom: 5px">
            @foreach($form->fields as $field)
                <p class="px-3"><strong>{{ $field['label'] }}:</strong> {{ $data[$field['name']] }} </p>
            @endforeach
            @if(config('asgard.iforms.config.referer'))

                <p class="px-3"><strong>{{ trans('iforms::common.referer') }}:</strong> {{ $data['referer'] }} </p>

            @endif
        </div>
    </div>
@stop