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
              colorTitleByClass="text-center mb-2 mb-md-3"
              fontSizeTitle="33"
              :withSubtitle="true"
              colorSubtitleByClass="text-center mb-3"
              fontSizeSubtitle="19"
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

