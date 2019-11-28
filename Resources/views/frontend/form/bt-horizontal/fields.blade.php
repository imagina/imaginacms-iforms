<?php
$fields = $form->fields;
?>
{{ csrf_field() }}
@foreach($fields as $index => $field)

  <div class="form-group">
    @switch($field->type)
      @case(1)
      <label for="{{$field->name}}" class="col-sm-2 control-label">{{$field->label}} </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="{{$field->name}}"
               id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder or '' }}">
      </div>
      @break

      @case(2)
      <label for="{{$field->name}}" class="col-sm-2 control-label">{{$field->label}} </label>
      <div class="col-sm-10">
                    <textarea class="form-control" name="{{$field->name}}" placeholder="{{ $field->placeholder or '' }}"
                              rows="4"></textarea>
      </div>
      @break
      @case(3)
      <label for="{{$field->name}}" class="col-sm-2 control-label">{{$field->label}} </label>
      <div class="col-sm-10">
        <input type="number" class="form-control" name="{{$field->name}}"
               id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder or '' }}">
      </div>
      @break
      @case(4)
      <label for="{{$field->name}}" class="col-sm-2 control-label">{{$field->label}} </label>
      <div class="col-sm-10">
        <input type="email" class="form-control" name="{{$field->name}}"
               id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder or '' }}">
      </div>
      @break
      @case(10)
      <label for="{{$field->name}}" class="col-sm-2 control-label">{{$field->label}} </label>
      <div class="col-sm-10">
        <input type="phone" class="form-control" name="{{$field->name}}"
               id="input{{$field->name}}" {{$field->required?'required':''}}   placeholder="{{ $field->placeholder or '' }}">
      </div>
      @break
      @case(11)
      <label for="{{$field->name}}" class="col-sm-2 control-label">{{$field->label}} </label>
      <div class="col-sm-10">
        <input type="date" class="form-control" name="{{$field->name}}"
               id="input{{$field->name}}" {{$field->required?'required':''}} placeholder="{{ $field->placeholder or '' }}">
      </div>
      @break

      @default
      <div class="checkbox col-sm-10">
        <label>
          <input name="{!!$field['name']!!}" type="checkbox"
                 {{$field->required?'required':''}}>{!!sprintf(trans('iforms::form.form.terms'),url($field['description']))!!}
        </label>
      </div>
    @endswitch

  </div>
@endforeach




