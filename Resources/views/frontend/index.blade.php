@extends('isite::frontend.layouts.master')

@section('content')
  <hr>
  <div class="form py-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <x-iforms::form :withTitle="true" :withSubtitle="true" :id="$formId"/>
        </div>
      </div>
    </div>
  </div>
  <hr>
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

