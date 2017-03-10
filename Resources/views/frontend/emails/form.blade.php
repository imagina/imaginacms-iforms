
<h1>{{ $form->title }}</h1>
<br>
@foreach($form->fields as $field)
    <p><strong>{{ $field['label'] }}:</strong> {{ $data[$field['name']] }} </p>
@endforeach