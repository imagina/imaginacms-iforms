@extends('isite::frontend.layouts.master')

@section('content')
  <div class="form">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <x-iforms::form :withTitle="true" :withSubtitle="true" :id="$formId"/>
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

