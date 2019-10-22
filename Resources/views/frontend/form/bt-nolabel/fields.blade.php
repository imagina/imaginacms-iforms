<?php
$fields = array();
if(isset($form) && is_array($form->fields)) $fields = $form->fields;
?>
{{ csrf_field() }}
@if(Setting::get('iforms::trans')=="1")
    <div class="form-group">
        @if($field['type'] != "textarea" && $field['type'] != "select" && $field['type'] != "checkbox" && $field['type'] != "radio"&& $field['type']!="terms")
            <div class="col-sm-12">
                <input type="{!!$field['type']!!}" class="form-control" name="{!!$field['name']!!}" id="input{!!$field['name']!!}" required placeholder="{{trans('icustom::iforms.field.'.$field['name'])}}">
            </div>
        @elseif($field['type'] == "textarea")
            <div class="col-sm-12">
                <textarea class="form-control" name="{!!$field['name']!!}" placeholder="{{ trans('icustom::iforms.field.'.$field['name']) }}" rows="4"></textarea>
            </div>
        @elseif($field['type'] == "select")
        @elseif($field['type'] == "checkbox"||$field['type'] == "radio")
            <div class="{!!$field['type']!!}">
                <label>
                    <input  name="{!!$field['name']!!}" type="{!!$field['type']!!}" value="{!!$field['name']!!}">
                    {!!$field['label']!!}
                </label>
            </div>
        @elseif($field['type'] == "terms")
            <div class="checkbox col-sm-10">
                <label>
                    <input name="{!!$field['name']!!}" type="checkbox" required>{!!sprintf(trans('iforms::form.form.terms'),url($field['description']))!!}
                </label>
            </div>

        @endif
    </div>
@else
    @foreach($fields as $index => $field)
        <div class="form-group">
            @if($field['type'] != "textarea" && $field['type'] != "select" && $field['type'] != "checkbox" && $field['type'] != "radio"&& $field['type']!="terms")
                <div class="col-sm-12">
                    <input type="{!!$field['type']!!}" class="form-control" name="{!!$field['name']!!}" id="input{!!$field['name']!!}" required placeholder="{{$field['label']}}">
                </div>
            @elseif($field['type'] == "textarea")
                <div class="col-sm-12">
                    <textarea class="form-control" name="{!!$field['name']!!}" placeholder="{{ $field['label'] }}" rows="4"></textarea>
                </div>
            @elseif($field['type'] == "select")
            @elseif($field['type'] == "checkbox"||$field['type'] == "radio")
                <div class="{!!$field['type']!!}">
                    <label>
                        <input  name="{!!$field['name']!!}" type="{!!$field['type']!!}" value="{!!$field['name']!!}">
                        {!!$field['label']!!}
                    </label>
                </div>
            @elseif($field['type'] == "terms")
                <div class="checkbox col-sm-10">
                    <label>
                        <input name="{!!$field['name']!!}" type="checkbox" required>{!!sprintf(trans('iforms::form.form.terms'),url($field['description']))!!}
                    </label>
                </div>
            @endif
        </div>
    @endforeach
@endif



