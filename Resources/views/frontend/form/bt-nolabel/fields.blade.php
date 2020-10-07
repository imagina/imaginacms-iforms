<?php
$fields = $form->fields;
?>
{{ csrf_field() }}
@foreach($fields as $field)

    <div class="form-group">
        @switch($field->present()->type['value'])
            @case('text')
            <div class="col-sm-12">
                <input type="text" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            </div>
            @break

            @case('textarea')
            <div class="col-sm-12">
                    <textarea class="form-control" name="{{$field->name}}" placeholder="{{ $field->placeholder ?? '' }}"
                              rows="4"></textarea>
            </div>
            @break
            @case('number')
            <div class="col-sm-12">
                <input type="number" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            </div>
            @break
            @case('email')
            <div class="col-sm-12">
                <input type="email" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            </div>
            @break
            @case('select')
            @case('selectmultiple')
            <div class="col-sm-12">
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
            </div>
            @break
            @case('radio')
            <div class="col-sm-12">
                @php
                    $options = json_decode($field->selectable)
                @endphp
                @foreach($options as $option)
                    <label>
                        <input type="radio" name="{{$field->name}}" value="{{ $option->name }}"/>&nbsp; {{ $option->name  }} &nbsp;&nbsp;
                    </label>
                @endforeach
            </div>
            @break
            @case('phone')
            <div class="col-sm-12">
                <input type="phone" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}}   placeholder="{{ $field->placeholder ?? '' }}">
            </div>
            @break
            @case('date')
            <div class="col-sm-12">
                <input type="date" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            </div>
            @break

            @default
            <div class="checkbox col-sm-12">
                <label>
                    <input name="{!!$field['name']!!}" type="checkbox"
                            {{$field->required?'required':''}}>{!!sprintf(trans('iforms::form.form.terms'),url($field->description))!!}
                </label>
            </div>
        @endswitch

    </div>
@endforeach



