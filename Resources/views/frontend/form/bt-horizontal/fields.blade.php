<?php $fields = json_decode($form->fields)?>


@foreach($fields as $index => $field)


    <div class="form-group">
        @if($field->type != "textarea" && $field->type != "select" && $field->type != "checkbox" && $field->type != "radio")
            <label for="{!!$field->name!!}" class="col-sm-2 control-label">{!!$field->label!!} </label>
            <div class="col-sm-10">
                <input type="{!!$field->type!!}" class="form-control" name="{!!$field->name!!}" id="input{!!$field->name!!}" required placeholder="{!! $field->description or '' !!}">
            </div>
        @elseif($field->type == "textarea")
            <label for="{!!$field->name!!}" class="control-label col-sm-2">{!!$field->label!!}</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="{!!$field->name!!}" rows="4"></textarea>
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


