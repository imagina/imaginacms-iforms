@extends('iforms::frontend.emails.mainlayout')

@section('content')
<h1>{{ $form->title }}</h1>

@foreach($form->fields as $field)
    <p><strong>{{ $field['label'] }}:</strong> {{ $data[$field['name']] }} </p>
@endforeach
@stop