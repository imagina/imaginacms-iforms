{{ csrf_field() }}
<div class="form-group row">
  @foreach($fields as $index => $field)
    <div class="col-12 col-sm-{{ $field->width ?? '12' }} col-style {{$field->name}}">
      @switch($field->present()->type['value'])
        @case('text')
        <label for="input{{$field->name}}" class="py-1 px-0 col-form-label">{{$field->label}}</label>
        <div class="input-frame">
          <div class="input-group flex-nowrap">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->prefix,"type"=>"pre"])
            <input type="text"
                   class="form-control {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                   name="{{$field->name}}"
                   value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                   @endif
                   @if(isset($field->options) && isset($field->options['readonly'])) readonly
                   @endif
                   id="{{$field->options['inputId'] ?? 'input'.$field->name}}"
                   {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->suffix,"type"=>"suf"])
          </div>
          <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        </div>
        @break
        @case('textarea')
        <label for="input{{$field->name}}" class="py-1 px-0 col-form-label">{{$field->label}}</label>
        <div class="input-frame">
          <div class="input-group flex-nowrap">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->prefix,"type"=>"pre"])
            <textarea
                    class="form-control {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                    id="input{{$field->name}}"
                    name="{{$field->name}}"
                    value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                    @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                    @endif
                    @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly="true"
                    @endif
                    placeholder="{{ $field->placeholder ?? '' }}" rows="4"></textarea>
            @include('iforms::frontend.partials.xfix',["xfix" => $field->suffix,"type"=>"suf"])
          </div>
          <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        </div>
        @break
        @case('number')
        <label for="input{{$field->name}}" class="py-1 px-0 col-form-label">{{$field->label}}</label>
        <div class="input-frame">
          <div class="input-group flex-nowrap">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->prefix,"type"=>"pre"])
            <input type="number"
                   class="form-control {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                   name="{{$field->name}}"
                   value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                   @endif
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                   @endif
                   id="input{{$field->name}}"
                   {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->suffix,"type"=>"suf"])
          </div>
          <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        </div>
        @break
        @case('email')
        <label for="input{{$field->name}}" class="py-1 px-0 col-form-label">{{$field->label}}</label>
        <div class="input-frame">
          <div class="input-group flex-nowrap">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->prefix,"type"=>"pre"])
            <input type="email"
                   class="form-control {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                   name="{{$field->name}}"
                   value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                   @endif
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                   @endif
                   id="input{{$field->name}}"
                   {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->suffix,"type"=>"suf"])
          </div>
          <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        </div>
        @break
        @case('select')
        @case('selectmultiple')
        <label for="input{{$field->name}}" class="py-1 px-0 col-form-label">{{$field->label}}</label>
        <div class="input-frame">
          <div class="input-group flex-nowrap">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->prefix,"type"=>"pre"])
            <select {{ $field->present()->type['value']=='selectmultiple'?'multiple':'' }}
                    class="form-control {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                    name="{{$field->name}}"
                    value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                    @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                    @endif
                    @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                    @endif
                    id="input{{$field->name}}"
                    {{$field->required?'required':''}}   data-placeholder="{{ $field->placeholder ?? '' }}"
            >
              @foreach($field->fieldOptions as $option)
                <option value="{{ $option->name ?? $option }}">{{ $option->name ?? $option }}</option>
              @endforeach
            </select>
            @include('iforms::frontend.partials.xfix',["xfix" => $field->suffix,"type"=>"suf"])
          </div>
          <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        </div>
        @break
        @case('radio')
        <label for="input{{$field->name}}" class="py-1 px-0 col-form-label">{{$field->label}}</label>
        <div class="input-frame">
          @foreach($field->fieldOptions as $option)
            <label>
              <input type="radio" name="{{$field->name}}"
                     value="{{ $option->name ?? $option }}"/>&nbsp; {{ $option->name ?? $option }} &nbsp;&nbsp;
            </label>
          @endforeach
          <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        </div>
        @break
        @case('phone')
        <label for="input{{$field->name}}" class="py-1 px-0 col-form-label">{{$field->label}}</label>
        <div class="input-frame">
          <div class="input-group flex-nowrap">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->prefix,"type"=>"pre"])
            <input type="phone"
                   class="form-control {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                   name="{{$field->name}}"
                   value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                   @endif
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                   @endif
                   id="input{{$field->name}}"
                   {{$field->required?'required':''}}  placeholder="{{ $field->placeholder ?? '' }}">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->suffix,"type"=>"suf"])
          </div>
          <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        </div>
        @break
        @case('date')
        <label for="input{{$field->name}}" class="py-1 px-0 col-form-label">{{$field->label}}</label>
        <div class="input-frame">
          <div class="input-group flex-nowrap">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->prefix,"type"=>"pre"])
            <input type="date"
                   class="form-control {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                   name="{{$field->name}}"
                   value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                   @endif
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                   @endif
                   id="input{{$field->name}}"
                   {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->suffix,"type"=>"suf"])
          </div>
          <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        </div>
        @break
        @case('file')
        <label for="input{{$field->name}}" class="sel-label-{{$field->name}} py-1 px-0 col-form-label d-flex flex-row align-items-center">
          <span class="btn-primary px-1 px-sm-2 py-1 text-sm"
          style="cursor: pointer; font-size: 13px; white-space: nowrap;">
            {{$field->label}}
          {{!empty($field->rule_accept) ? "(".$field->rule_accept.")" : "" }}
          </span>
          <span class="selected{{$field->name}} d-block ml-2 text-gray" style="font-size: 12.5px; line-height: 1;"></span>
        </label>

        <div class="input-frame">
          <div class="input-group flex-nowrap">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->prefix,"type"=>"pre"])
            <input type="file"
                   {{ !empty($field->rule_accept)? "accept=".$field->rule_accept : ""}}
                   class="d-none form-control-file border-0 {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                   name="{{$field->name}}"
                   id="input{{$field->name}}"
                   {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
            @include('iforms::frontend.partials.xfix',["xfix" => $field->suffix,"type"=>"suf"])
          </div>
          <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        </div>
          <script>
            window.addEventListener('DOMContentLoaded', () => {
              $('input#input{{$field->name}}').change(function () {
                let filename = this.files.length > 0 ? this.files[0].name : "{{ $field->placeholder ?? '' }}";
                $('.selected{{$field->name}}').text(filename);
              });
            });
          </script>
        @break
        @default
        <label class="py-1 px-0 col-form-label">{{$field->label}}</label>
        <div class="input-frame">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="input{{$field->name}}"
                   value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                   @endif
                   @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled @endif
            />
            <label class="form-check-label" for="input{{$field->name}}">
              {{ $field->placeholder }}
            </label>
          </div>
        </div>
      @endswitch
    </div>
  @endforeach
</div>
