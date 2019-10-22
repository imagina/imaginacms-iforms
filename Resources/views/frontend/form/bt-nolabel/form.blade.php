@php
    $id=str_slug($form->title).$options['rand'];;
@endphp

<div class="content-form{{$options['rand']}}">
    <div class="formerror"></div>
    <form id="{{$id}}" class="form-horizontal" action="{{url('/iforms/lead')}}">
        <input type="hidden" name="form_id" value="{{$form->id}}" required="">

        @include('iforms::frontend.form.bt-nolabel.fields')

        @if(Setting::get('iforms::captcha')=="1")
            <div class="col-sm-offset-2 col-sm-10">
                {!!app('captcha')->display($attributes = ['data-sitekey'=>Setting::get('iforms::api')])!!}
                </br>
            </div>
        @endif
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">{{trans('iforms::form.form.submit')}}</button>
            </div>
        </div>
    </form>

</div>

@include('iforms::frontend.form.mainlayout')