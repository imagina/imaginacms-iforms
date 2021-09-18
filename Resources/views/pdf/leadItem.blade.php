@php
    $lead=$items->first();
    $form=$lead->form;

@endphp
<h1 style="font-size: 22px">Formulario: {{ $form->title }}</h1>
<h3>Registro #{{$lead->id}}</h3>
@if(isset($lead->assignedTo->id))
<p style="font-size: 16px">
    Asignado a: {{ $lead->assignedTo->present()->fullname }}
</p>
@endif

<table style="width: 100%;border-collapse: collapse;">
    <tbody>
@foreach($lead->values as $index => $field)
    <tr>
    <th style="background-color: #eee;">{{ $index }}</th> <td>{{ $field }}</td>
    </tr>
@endforeach

    </tbody>
</table>
<br>
