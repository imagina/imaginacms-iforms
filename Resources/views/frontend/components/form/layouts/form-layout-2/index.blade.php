<div id="formLayout2" class="content-form{{$formId}} position-relative">
  @include('iforms::frontend.components.form.layouts.titles',array('layout'=>'formLayout2'))
  <div class="formerror"></div>
    <x-isite::edit-link link="/iadmin/#/form/fields/{{$form->id}}"
                        :tooltip="trans('iforms::common.editLink.tooltipForm')"/>
  <form id="{{$formId}}" class="w-100 overflow-hidden" action="{{route('api.iforms.leads.create')}}">

    <input type="hidden" name="form_id" value="{{$form->id}}" required="">

    @include('iforms::frontend.components.form.layouts.form-layout-2.fields')

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

    <x-isite::captcha :formId="$formId"/>
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
