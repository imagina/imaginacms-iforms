<?php
$fields = $form->fields;
?>

{{ csrf_field() }}

<?php
$fields = $form->fields;
?>
{{ csrf_field() }}
@foreach($fields as $index => $field)

    <div class="form-group">
        @switch($field->present()->type['value'])
            @case('text')
            <label for="input{{$field->name}}">{{$field->label}} </label>
                <input type="text" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">

            @break

            @case('textarea')
            <label for="input{{$field->name}}">{{$field->label}} </label>
                <textarea class="form-control" name="{{$field->name}}" placeholder="{{ $field->placeholder ?? '' }}"
                              rows="4"></textarea>
            @break
            @case('number')
            <label for="input{{$field->name}}">{{$field->label}} </label>
                <input type="number" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            @break
            @case('email')
            <label for="input{{$field->name}}">{{$field->label}} </label>
                <input type="email" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">

            @break
            @case('select')
            @case('selectmultiple')
            <label for="input{{$field->name}}">{{$field->label}} </label>
                @php
                    $options = json_decode($field->selectable)
                @endphp
                <select {{ $field->present()->type['value']=='selectmultiple'?'multiple':'' }} class="form-control" name="{{$field->name}}"
                        id="input{{$field->name}}" {{$field->required?'required':''}}   placeholder="{{ $field->placeholder ?? '' }}"
                >
                    @foreach($options as $option)
                        <option value="{{ $option->name }}">{{ $option->name  }}</option>
                    @endforeach
                </select>
            @break
            @case('radio')
            <label for="input{{$field->name}}">{{$field->label}}</label>
                @php
                    $options = json_decode($field->selectable)
                @endphp
                @foreach($options as $option)
                    <label>
                        <input id="input{{$field->name}}" type="radio" name="{{$field->name}}" value="{{ $option->name }}"/>&nbsp; {{ $option->name  }} &nbsp;&nbsp;
                    </label>
                @endforeach
            @break
            @case('phone')
            <label for="input{{$field->name}}">{{$field->label}} </label>
                <input type="phone" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}}   placeholder="{{ $field->placeholder ?? '' }}">
            @break
            @case('date')
            <label for="{{$field->name}}" class="col-sm-2 control-label">{{$field->label}} </label>
                <input type="date" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            @break

            @default
            <div class="checkbox">
                <label>
                    <input name="{!!$field['name']!!}" type="checkbox"
                            {{$field->required?'required':''}}>{!!sprintf(trans('iforms::form.form.terms'),url($field->description))!!}
                </label>
            </div>
        @endswitch

    </div>
@endforeach
