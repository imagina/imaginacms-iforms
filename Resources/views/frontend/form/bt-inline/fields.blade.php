<?php
$fields = $form->fields;
?>

{{ csrf_field() }}

<?php
$fields = $form->fields;
?>
{{ csrf_field() }}
<div class="row">
@foreach($fields as $index => $field)
        <div class="col-12 col-sm-4">
            <div class="form-group row">
        @switch($field->present()->type['value'])
            @case('text')
                <label class="col-3 col-form-label" for="input{{$field->name}}">{{$field->label}}</label>
                <div class="col-9">
                <input type="text" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}" />
                </div>
            @break

            @case('textarea')
                <label class="col-3 col-form-label" for="input{{$field->name}}">{{$field->label}}</label>
                <div class="col-9">
                    <textarea class="form-control" name="{{$field->name}}" placeholder="{{ $field->placeholder ?? '' }}"
                              rows="4"></textarea>
                </div>
            @break
            @case('number')
                <label class="col-3 col-form-label" for="input{{$field->name}}">{{$field->label}}</label>
                <div class="col-9">
                    <input type="number" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
                </div>
            @break
            @case('email')
                <label class="col-3 col-form-label" for="input{{$field->name}}">{{$field->label}}</label>
                <div class="col-9">
                    <input type="email" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}" />
                </div>
            @break
            @case('select')
            @case('selectmultiple')
                <label class="col-3 col-form-label" for="input{{$field->name}}">{{$field->label}}</label>
                  <div class="col-9">
                    @php
                        $options = json_decode($field->selectable)
                    @endphp
                    <select {{ $field->present()->type['value']=='selectmultiple'?'multiple':'' }} class="form-control my-1 mr-sm-2" name="{{$field->name}}"
                        id="input{{$field->name}}" {{$field->required?'required':''}}   data-placeholder="{{ $field->placeholder ?? '' }}"
                    >
                    @foreach($options as $option)
                        <option value="{{ $option->name }}">{{ $option->name  }}</option>
                    @endforeach
                    </select>
                </div>
            @break
            @case('radio')
                <label class="col-2 col-form-label" for="input{{$field->name}}">{{$field->label}}</label>
                  <div class="col-10">
                    @php
                        $options = json_decode($field->selectable)
                    @endphp
                    @foreach($options as $k=>$option)
                        <input class="form-check-input" id="input{{$field->name}}{{ $k }}" type="radio" name="{{$field->name}}" value="{{ $option->name }}"/>
                        <label for="input{{$field->name}}{{ $k }}" class="form-check-label">{{ $option->name  }}</label>
                    @endforeach
                  </div>
            @break
            @case('phone')
                  <label class="col-4 col-form-label" for="input{{$field->name}}">{{$field->label}}</label>
                  <div class="form-8">
                    <input class="form-control" type="phone" name="{{$field->name}}"
                           id="input{{$field->name}}" {{$field->required?'required':''}}   placeholder="{{ $field->placeholder ?? '' }}" />
                  </div>
            @break
            @case('date')
                <label class="col-3 col-form-label" for="{{$field->name}}">{{$field->label}}</label>
                <div class="col-9">
                    <input type="date" class="form-control" name="{{$field->name}}"
                       id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}" />
                </div>                        &nbsp;&nbsp;
            @break
            @default
                <label class="col-3 col-form-label">{{$field->label}}</label>
                <div class="col-9">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="input{{$field->name}}">
                        <label class="form-check-label" for="input{{$field->name}}">
                            {{ $field->placeholder }}
                        </label>
                    </div>
                </div>
        @endswitch
            </div>
        </div>
@endforeach
</div>
