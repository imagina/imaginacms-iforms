{{ csrf_field() }}
<div class="form-group row mb-0">
  @foreach($fields as $field)
    <div class="col-12 col-sm-{{ $field->width ?? '12' }} col-style">
      @switch($field->present()->type['value'])
        @case('text')
        @if(!empty($field->prefix) || !empty($field->suffix))
          @if(!empty($field->prefix->value) || !empty($field->suffix->value))
            <div class="input-group flex-nowrap">
              @if(!empty($field->prefix))
                @if(!empty($field->prefix->value))
                   <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0 text-primary">
                                        @if($field->prefix->type=='icon')
                                        <i class="text-primary {{ $field->prefix->value }}"></i>
                                      @else
                                        {{ $field->prefix->value }}
                                      @endif
                                    </span>
                  </div>
                @endif
              @endif
              @endif
              @endif
              <input type="text"
                     class="form-control bg-transparent {{ isset($fieldsParams[$field->name]) ? $fieldsParams[$field->name]['class'] ?? '' :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                     name="{{$field->name}}"
                     value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value']) ?? '' : '' }}"
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                     @endif
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                     @endif
                     id="input{{$field->name}}"
                     {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
                <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
              @if(!empty($field->prefix) || !empty($field->suffix))
                @if(!empty($field->prefix->value) || !empty($field->suffix->value))
                  @if(!empty($field->suffix))
                    @if(!empty($field->suffix->value))
                      <div class="input-group-append">
                                    <span class="input-group-text bg-transparent border-left-0 text-primary">
                                        @if($field->suffix->type=='icon')
                                        <i class="text-primary {{ $field->suffix->value }}"></i>
                                      @else
                                        {{ $field->suffix->value }}
                                      @endif
                                    </span>
                      </div>
                    @endif
                  @endif
            </div>
          @endif
        @endif
        @break

        @case('textarea')
        @if(!empty($field->prefix) || !empty($field->suffix))
          @if(!empty($field->prefix->value) || !empty($field->suffix->value))
            <div class="input-group flex-nowrap">
              @if(!empty($field->prefix))
                @if(!empty($field->prefix->value))
                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0 text-primary">
                                        @if($field->prefix->type=='icon')
                                        <i class="text-primary {{ $field->prefix->value }}"></i>
                                      @else
                                        {{ $field->prefix->value }}
                                      @endif
                                    </span>
                  </div>
                @endif
              @endif
              @endif
              @endif
              <textarea
                class="form-control bg-transparent {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                @endif
                @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                @endif
                name="{{$field->name}}"
                placeholder="{{ $field->placeholder ?? '' }}"
                rows="4" id="input{{$field->name}}"></textarea>
                <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
              @if(!empty($field->prefix) || !empty($field->suffix))
                @if(!empty($field->prefix->value) || !empty($field->suffix->value))
                  @if(!empty($field->suffix))
                    @if(!empty($field->suffix->value))
                      <div class="input-group-append">
                                    <span class="input-group-text bg-transparent border-left-0 text-primary">
                                        @if($field->suffix->type=='icon')
                                        <i class="text-primary {{ $field->suffix->value }}"></i>
                                      @else
                                        {{ $field->suffix->value }}
                                      @endif
                                    </span>
                      </div>
                    @endif
                  @endif
            </div>
          @endif
        @endif
        @break
        @case('number')
        @if(!empty($field->prefix) || !empty($field->suffix))
          @if(!empty($field->prefix->value) || !empty($field->suffix->value))
            <div class="input-group flex-nowrap">
              @if(!empty($field->prefix))
                @if(!empty($field->prefix->value))
                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0 text-primary">
                                        @if($field->prefix->type=='icon')
                                        <i class="text-primary {{ $field->prefix->value }}"></i>
                                      @else
                                        {{ $field->prefix->value }}
                                      @endif
                                    </span>
                  </div>
                @endif
              @endif
              @endif
              @endif
              <input type="number"
                     class="form-control bg-transparent {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                     name="{{$field->name}}"
                     value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                     @endif
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                     @endif
                     id="input{{$field->name}}"
                     {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
                <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
              @if(!empty($field->prefix) || !empty($field->suffix))
                @if(!empty($field->prefix->value) || !empty($field->suffix->value))
                  @if(!empty($field->suffix))
                    @if(!empty($field->suffix->value))
                      <div class="input-group-append">
                                    <span class="input-group-text bg-transparent border-left-0 text-primary">
                                        @if($field->suffix->type=='icon')
                                        <i class="text-primary {{ $field->suffix->value }}"></i>
                                      @else
                                        {{ $field->suffix->value }}
                                      @endif
                                    </span>
                      </div>
                    @endif
                  @endif
            </div>
          @endif
        @endif
        @break
        @case('email')
        @if(!empty($field->prefix) || !empty($field->suffix))
          @if(!empty($field->prefix->value) || !empty($field->suffix->value))
            <div class="input-group flex-nowrap">
              @if(!empty($field->prefix))
                @if(!empty($field->prefix->value))
                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0 text-primary">
                                        @if($field->prefix->type=='icon')
                                        <i class="text-primary {{ $field->prefix->value }}"></i>
                                      @else
                                        {{ $field->prefix->value }}
                                      @endif
                                    </span>
                  </div>
                @endif
              @endif
              @endif
              @endif
              <input type="email"
                     class="form-control bg-transparent {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                     name="{{$field->name}}"
                     value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                     @endif
                     id="input{{$field->name}}"
                     {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
                <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
              @if(!empty($field->prefix) || !empty($field->suffix))
                @if(!empty($field->prefix->value) || !empty($field->suffix->value))
                  @if(!empty($field->suffix))
                    @if(!empty($field->suffix->value))
                      <div class="input-group-append">
                                    <span class="input-group-text bg-transparent border-left-0 text-primary">
                                        @if($field->suffix->type=='icon')
                                        <i class="text-primary {{ $field->suffix->value }}"></i>
                                      @else
                                        {{ $field->suffix->value }}
                                      @endif
                                    </span>
                      </div>
                    @endif
                  @endif
            </div>
          @endif
        @endif
        @break
        @case('select')
        @case('selectmultiple')
        @if(!empty($field->prefix) || !empty($field->suffix))
          @if(!empty($field->prefix->value) || !empty($field->suffix->value))
            <div class="input-group flex-nowrap">
              @if(!empty($field->prefix))
                @if(!empty($field->prefix->value))
                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0 text-primary">
                                        @if($field->prefix->type=='icon')
                                        <i class="text-primary {{ $field->prefix->value }}"></i>
                                      @else
                                        {{ $field->prefix->value }}
                                      @endif
                                    </span>
                  </div>
                @endif
              @endif
              @endif
              @endif
              <select
                {{ $field->present()->type['value']=='selectmultiple'?'multiple':'' }} class="form-control bg-transparent {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                @endif
                @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                @endif
                name="{{$field->name}}"
                id="input{{$field->name}}"
                {{$field->required?'required':''}}   data-placeholder="{{ $field->placeholder ?? '' }}"
              >
                @foreach($field->fieldOptions as $option)
                  <option value="{{ $option->name ?? $option }}">{{ $option->name ?? $option }}</option>
                @endforeach
              </select>
                <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
              @if(!empty($field->prefix) || !empty($field->suffix))
                @if(!empty($field->prefix->value) || !empty($field->suffix->value))
                  @if(!empty($field->suffix))
                    @if(!empty($field->suffix->value))
                      <div class="input-group-append">
                                    <span class="input-group-text bg-transparent border-left-0 text-primary">
                                        @if($field->suffix->type=='icon')
                                        <i class="text-primary {{ $field->suffix->value }}"></i>
                                      @else
                                        {{ $field->suffix->value }}
                                      @endif
                                    </span>
                      </div>
                    @endif
                  @endif
            </div>
          @endif
        @endif
        @break
        @case('radio')
        @foreach($field->fieldOptions as $option)
          <label>
            <input type="radio" name="{{$field->name}}"
                   value="{{ $option->name ?? $option }}"/>&nbsp; {{ $option->name ?? $option }} &nbsp;&nbsp;
          </label>
        @endforeach
      <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
        @break
        @case('phone')
        @if(!empty($field->prefix) || !empty($field->suffix))
          @if(!empty($field->prefix->value) || !empty($field->suffix->value))
            <div class="input-group flex-nowrap">
              @if(!empty($field->prefix))
                @if(!empty($field->prefix->value))
                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0 text-primary">
                                        @if($field->prefix->type=='icon')
                                        <i class="text-primary {{ $field->prefix->value }}"></i>
                                      @else
                                        {{ $field->prefix->value }}
                                      @endif
                                    </span>
                  </div>
                @endif
              @endif
              @endif
              @endif
              <input type="phone"
                     class="form-control bg-transparent {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                     value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                     @endif
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                     @endif
                     name="{{$field->name}}"
                     id="input{{$field->name}}"
                     {{$field->required?'required':''}}   placeholder="{{ $field->placeholder ?? '' }}">
                <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
              @if(!empty($field->prefix) || !empty($field->suffix))
                @if(!empty($field->prefix->value) || !empty($field->suffix->value))
                  @if(!empty($field->suffix))
                    @if(!empty($field->suffix->value))
                      <div class="input-group-append">
                                    <span class="input-group-text bg-transparent border-left-0 text-primary">
                                        @if($field->suffix->type=='icon')
                                        <i class="text-primary {{ $field->suffix->value }}"></i>
                                      @else
                                        {{ $field->suffix->value }}
                                      @endif
                                    </span>
                      </div>
                    @endif
                  @endif
            </div>
          @endif
        @endif
        @break
        @case('date')
        @if(!empty($field->prefix) || !empty($field->suffix))
          @if(!empty($field->prefix->value) || !empty($field->suffix->value))
            <div class="input-group flex-nowrap">
              @if(!empty($field->prefix))
                @if(!empty($field->prefix->value))
                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0 text-primary">
                                        @if($field->prefix->type=='icon')
                                        <i class="text-primary {{ $field->prefix->value }}"></i>
                                      @else
                                        {{ $field->prefix->value }}
                                      @endif
                                    </span>
                  </div>
                @endif
              @endif
              @endif
              @endif
              <input type="date"
                     class="form-control bg-transparent {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                     name="{{$field->name}}"
                     value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                     @endif
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                     @endif
                     id="input{{$field->name}}"
                     {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
                <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
              @if(!empty($field->prefix) || !empty($field->suffix))
                @if(!empty($field->prefix->value) || !empty($field->suffix->value))
                  @if(!empty($field->suffix))
                    @if(!empty($field->suffix->value))
                      <div class="input-group-append">
                                    <span class="input-group-text bg-transparent border-left-0 text-primary">
                                        @if($field->suffix->type=='icon')
                                        <i class="text-primary {{ $field->suffix->value }}"></i>
                                      @else
                                        {{ $field->suffix->value }}
                                      @endif
                                    </span>
                      </div>
                    @endif
                  @endif
            </div>
          @endif
        @endif
        @break
        @case('file')
          <label for="input{{$field->name}}" class="sel-label-{{$field->name}} py-1 col-form-label d-flex flex-row align-items-center">
              <span class="btn-primary px-1 px-sm-2 py-1 text-sm"
                    style="cursor: pointer; font-size: 13px; white-space: nowrap;">
                {{$field->label}}
                {{!empty($field->rule_accept) ? "(".$field->rule_accept.")" : "" }}
              </span>
            <span class="selected{{$field->name}} d-block ml-2 text-gray" style="font-size: 12.5px; line-height: 1;"></span>
          </label>
        @if(!empty($field->prefix) || !empty($field->suffix))
          @if(!empty($field->prefix->value) || !empty($field->suffix->value))
            <div class="input-group flex-nowrap">
              @if(!empty($field->prefix))
                @if(!empty($field->prefix->value))
                  <div class="input-group-prepend">
                                    <span class="input-group-text bg-transparent border-right-0 text-primary">
                                        @if($field->prefix->type=='icon')
                                        <i class="text-primary {{ $field->prefix->value }}"></i>
                                      @else
                                        {{ $field->prefix->value }}
                                      @endif
                                    </span>
                  </div>
                @endif
              @endif
              @endif
              @endif
              <input type="file"
                     {{ !empty($field->rule_accept)? "accept=".$field->rule_accept : ""}}
                     class="d-none form-control bg-transparent {{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['class'] ?? '') :'' }} {{ !empty($field->prefix) ? !empty($field->prefix->value) ? 'border-left-0' : '' : '' }} {{ !empty($field->suffix) ? !empty($field->suffix->value) ? 'border-right-0' : '' : '' }}"
                     name="{{$field->name}}"
                     value="{{ isset($fieldsParams[$field->name]) ? ($fieldsParams[$field->name]['value'] ?? '') : '' }}"
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['disabled'])) disabled
                     @endif
                     @if(isset($fieldsParams[$field->name]) && isset($fieldsParams[$field->name]['readonly'])) readonly
                     @endif
                     id="input{{$field->name}}"
                     {{$field->required?'required':''}} placeholder="{{ $field->placeholder ?? '' }}">
                <small id="{{$field->name}}Help" class="form-text text-muted">{{$field->description}}</small>
              @if(!empty($field->prefix) || !empty($field->suffix))
                @if(!empty($field->prefix->value) || !empty($field->suffix->value))
                  @if(!empty($field->suffix))
                    @if(!empty($field->suffix->value))
                      <div class="input-group-append">
                                    <span class="input-group-text bg-transparent border-left-0 text-primary">
                                        @if($field->suffix->type=='icon')
                                        <i class="text-primary {{ $field->suffix->value }}"></i>
                                      @else
                                        {{ $field->suffix->value }}
                                      @endif
                                    </span>
                      </div>
                    @endif
                  @endif
            </div>
          @endif
        @endif
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
        <div class="checkbox">
          <label>
            <input name="{!!$field['name']!!}" type="checkbox" {{$field->required?'required':''}}>
            <span class="ml-2">{{ $field->placeholder }}</span>
          </label>
        </div>
      @endswitch
    </div>
  @endforeach
</div>
