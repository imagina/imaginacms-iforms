<div id="loading-form">
  <div class="lds-spinner">
    <div class="spinner-border" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</div>
<div id="formLayout1" class="content-form{{$formId}} position-relative">
  @include('iforms::frontend.components.form.layouts.titles',array('layout'=>'formLayout1'))
  <x-isite::edit-link link="/iadmin/#/form/fields/{{$form->id}}"
                      :tooltip="trans('iforms::common.editLink.tooltipForm')"/>
  <div class="formerror"></div>
  <form id="{{$formId}}" class="form-horizontal  overflow-hidden" method="post" action="{{route('api.iforms.leads.create')}}">
    <input type="hidden" name="form_id" value="{{$form->id}}" required="">

  @include('iforms::frontend.components.form.layouts.form-layout-1.fields')
  <!--Validate field terms and conditions-->
  @if(isset($form->options->urlTermsAndConditions))
    <!--Content Terms and Conditions -->
      <div id="contentTermsAndConditions" class="col-12 position-relative mb-3">
        <div id="CheckFormTermsAndConditions" class="pl-4">
          <input type="checkbox" class="form-check-input" required="" id="TermsAndConditions">
          <label class="form-check-label h6" for="TermsAndConditions">
            {!! trans('iforms::forms.form.termsAndConditions', ['urlTermsAndConditions' =>$form->options->urlTermsAndConditions]) !!}
          </label>
        </div>
      </div>
    @endif

    <div class="col-12">
      <x-isite::captcha :formId="$formId"/>
    </div>

    <div class="form-group row mb-0">
      <div class="col-sm-12 {{$buttonAlign}}">
        <button type="submit"
                class="{{$buttonClass}}">
          @if($buttonIcon) <i class="{{$buttonIcon}}"></i> @endif
          {{ $form->submit_text ?? $buttonText }}
        </button>
      </div>
    </div>
  </form>
</div>
@include('iforms::frontend.components.form.layouts.mainlayout')

<style>
    #formLayout1 .form-group .col-style {
        margin-bottom: 10px;
    }
</style>
