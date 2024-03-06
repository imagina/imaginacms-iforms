<div id="formLayout3" class="content-form{{$formId}} position-relative">
  @include('iforms::frontend.components.form.layouts.titles',array('layout'=>'formLayout3'))
  <div class="formerror"></div>
    <x-isite::edit-link link="/iadmin/#/form/fields/{{$form->id}}"
                        :tooltip="trans('iforms::common.editLink.tooltipForm')"/>
  <form id="{{$formId}}" class="form-horizontal overflow-hidden" action="{{route('api.iforms.leads.create')}}">
    <input type="hidden" name="form_id" value="{{$form->id}}" required="">

    @include('iforms::frontend.components.form.layouts.form-layout-3.fields')
    <div class="col-sm-12">
      <x-isite::captcha :formId="$formId"/>
    </div>
    <div class="w-100 {{$buttonAlign}}">
        <button type="submit"
                class="{{$buttonClass}}">
            @if($buttonIcon) <i class="{{$buttonIcon}}"></i> @endif
            {{ $form->submit_text ?? $buttonText }}
        </button>
    </div>
  </form>
</div>
@include('iforms::frontend.components.form.layouts.mainlayout')

<style>
    #formLayout3 .form-group .col-style {
        margin-bottom: 10px;
    }
</style>