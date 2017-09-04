@php
    $id=str_slug($form->title).rand(1,999);
@endphp

<div class="content-form{{$id}}">
    <div class="formerror"></div>
    <form id="{{$id}}" class="form-inline" action="{{url('/iforms/lead')}}">

        <input type="hidden" name="form_id" value="{{$form->id}}" required="">

        @include('iforms::frontend.form.bt-inline.fields')

        @if(Setting::get('iforms::captcha')=="1")
            <div class="col-sm-offset-2 col-sm-10">
                {!!app('captcha')->display($attributes = ['data-sitekey'=>Setting::get('iforms::api')])!!}
                </br>
                </br>
            </div>

        @endif

        <button type="submit" class="btn btn-primary">{{trans('iforms::form.form.submit')}}</button>
    </form>

</div>
@include('iforms::frontend.form.mainlayout')