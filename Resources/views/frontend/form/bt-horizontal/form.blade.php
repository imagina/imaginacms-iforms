@extends('iforms::frontend.form.mainlayout')
@php
    $id=str_slug($form->title).rand(1,999);
@endphp
@section('content')
<div class="content-form">
    <div class="formerror"></div>
    <form id="{{$id}}" class="form-horizontal" action="{{url('/iforms/lead')}}">
        <input type="hidden" name="form_id" value="{{$form->id}}" required="">

        @include('iforms::frontend.form.bt-horizontal.fields')



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
@stop