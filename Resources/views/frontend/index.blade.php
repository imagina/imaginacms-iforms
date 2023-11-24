@extends('isite::frontend.layouts.master')

@section('content')
  <div class="form py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
          <div class="card-form">
            <x-iforms::form
              :id="$formId"
              :withTitle="true"
              :title="trans('iforms::forms.form.formDefault.title')"
              colorTitleByClass="text-center mb-2 mb-md-3"
              fontSizeTitle="33"
              :withSubtitle="true"
              colorSubtitleByClass="text-center mb-3"
              fontSizeSubtitle="19"
              :subtitle="trans('iforms::forms.form.formDefault.subtitle')"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

@section("scripts")
  @parent
  <script>
    window.parent.postMessage({
      offsetHeight: document.body.offsetHeight,
      clientHeight: document.body.clientHeight,
      scrollHeight: document.body.scrollHeight,
      formElementId: "{{$formElementId}}"
    }, '*');
  </script>
@endsection
<style>
  .form {
    background: #dedede;
    background: #dfe7e7;
  }

  .form .card-form {
    padding: 30px;
    border-radius: 25px;
    box-shadow: 0px 0px 16px #fff9f97a;
    background-color: #ffffff;
  }

  .form .card-form .title-section {
    color: #5555a5;
    font-weight: bold;
  }

  .form .card-form .title-section:before {
    font-family: "Font Awesome 6 Pro";
    content: "\e49a";
    line-height: 1;
    margin-right: 6px;
    font-weight: 300;
  }

  .form .card-form .subtitle-section {
    color: #000000cf;
  }

  .form .card-form form {
    width: 80%;
    margin: auto;
    min-width: 240px;
  }

  .form .card-form form label {
    display: none;
  }

  .form .card-form form .form-control:focus {
    box-shadow: none !important;
  }

  .form .card-form form input,
  .form .card-form form select,
  .form .card-form form textarea {
    margin-bottom: 14px;
    border-radius: 20px !important;
    background-color: #dfe7e754;
    color: #000000cf;
    border: 1px solid #b5b5b5;
    padding: 10px 24px;
    min-height: 47px;
  }

  .form .card-form form input::placeholder,
  .form .card-form form select::placeholder,
  .form .card-form form textarea::placeholder {
    color: #000000cf;
  }

  .form .card-form form .col-sm-12.text-right {
    text-align: center !important;
  }

  .form .card-form form .col-sm-12.text-right button {
    width: 100%;
    border-radius: 40px;
    border: 0;
    background-color: #62c17a;
    margin-top: 20px;
    min-height: 47px;
    color: #000000cf;
    font-size: 20px;
    font-weight: 700;
  }

  .form .card-form form .col-sm-12.text-right button:disabled {
    background-color: #62c17a;
  }

  .form .card-form form .col-sm-12.text-right button:active,
  .form .card-form form .col-sm-12.text-right button:hover {
    background-color: #33bb56 !important;
    color: #000000cf !important;

  }


  @media (max-width: 767.98px) {
    .form .card-form form {
      width: 100%;
    }

    .form .card-form .title-section {
      font-size: 27px !important;
    }

    .form .card-form .subtitle-section {
      font-size: 16px !important;
    }
  }
</style>
