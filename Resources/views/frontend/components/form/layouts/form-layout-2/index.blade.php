<div class="content-form{{$formId}}">
    <div class="formerror"></div>
    <form id="{{$formId}}" class="full-width" action="{{route('api.iforms.leads.create')}}">

        <input type="hidden" name="form_id" value="{{$form->id}}" required="">

        @include('iforms::frontend.components.form.layouts.form-layout-2.fields')

        <x-isite::captcha :formId="$formId" />
        <div class="w-100 text-right">
            <button type="submit" class="btn btn-primary">{{ $form->sumbit_text ?? trans('iforms::forms.form.submit')}}</button>
        </div>
    </form>

</div>
@include('iforms::frontend.components.form.layouts.mainlayout')
