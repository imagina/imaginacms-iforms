<?php $fields = json_decode($form->fields)?>

{{ csrf_field() }}

@foreach($fields as $index => $field)


    <div class="form-group">
        @if($field->type != "textarea" && $field->type != "select" && $field->type != "checkbox" && $field->type != "radio")
            <div class="col-sm-12">
                <input type="{!!$field->type!!}" class="form-control" name="{!!$field->name!!}" id="input{!!$field->name!!}" required placeholder="{!! $field->label or '' !!}">
            </div>
        @elseif($field->type == "textarea")
            <div class="col-sm-12">
                <textarea class="form-control" name="{!!$field->name!!}" placeholder="{!! $field->label or '' !!}" rows="4"></textarea>
            </div>
        @elseif($field->type == "select")
        @elseif($field->type == "checkbox"||$field->type == "radio")
            <div class="{!!$field->type!!}">
                <label>
                    <input  name="{!!$field->name!!}" type="{!!$field->type!!}" value="{!!$field->name!!}">
                    {!!$field->label!!}
                </label>
            </div>

        @endif
    </div>
   @endforeach


