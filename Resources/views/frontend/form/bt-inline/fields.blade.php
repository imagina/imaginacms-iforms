<?php $fields =$form->fields?>

{{ csrf_field() }}

@if(setting('iforms::trans')=="1")
    @foreach($fields as $index => $field)
        <div class="form-group">
            @if($field['type'] != "textarea" && $field['type'] != "select" && $field['type'] != "checkbox" && $field['type'] != "radio")
                <label for="{!!$field['name']!!}" class="">{!!trans('icustom::iforms.field.'.$field['name']!!}: </label>
                <input type="{!!$field['type']!!}" class="form-control" name="{!!$field['name']!!}" id="input{!!$field['name']!!}" required placeholder="{!! trans('icustom::iforms.field.'.$field['description']) or '' !!}">

            @elseif($field['type'] == "textarea")
                <label for="{!!$field['name']!!}" class="">{!!trans('icustom::iforms.field.'.$field['name']!!}: </label>
                <textarea class="form-control" name="{!!$field['name']!!}" rows="4"></textarea>
            @elseif($field['type'] == "select")
            @elseif($field['type'] == "checkbox"||$field['type'] == "radio")
                <div class="{!!$field['type']!!}">
                    <label>
                        <input  name="{!!$field['name']!!}" type="{!!$field['type']!!}" value="{!!$field['name']!!}">
                        {!!$field['label']!!}
                    </label>
                </div>

            @endif
        </div>
    @endforeach
@else
    @foreach($fields as $index => $field)
        <div class="form-group">
            @if($field['type'] != "textarea" && $field['type'] != "select" && $field['type'] != "checkbox" && $field['type'] != "radio")
                <label for="{!!$field['name']!!}" class="">{!!$field['label']!!}: </label>
                <input type="{!!$field['type']!!}" class="form-control" name="{!!$field['name']!!}" id="input{!!$field['name']!!}" required placeholder="{!! trans('icustom::iforms.field.'.$field['description'])or '' !!}">

            @elseif($field['type'] == "textarea")
                <label for="{!!$field['name']!!}" class="">{!!$field['label']!!}: </label>
                <textarea class="form-control" name="{!!$field['name']!!}" rows="4"></textarea>
            @elseif($field['type'] == "select")
            @elseif($field['type'] == "checkbox"||$field['type'] == "radio")
                <div class="{!!$field['type']!!}">
                    <label>
                        <input  name="{!!$field['name']!!}" type="{!!$field['type']!!}" value="{!!$field['name']!!}">
                        {!!$field['label']!!}
                    </label>
                </div>

            @endif
        </div>
    @endforeach
@endif

