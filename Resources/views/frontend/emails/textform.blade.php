{{ $form->title }}

@foreach($form->fields as $field)
    {{ $field['label'] }}: {{ $data[$field['name']] }}

@endforeach
