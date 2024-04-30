<div class="form-titles">
@if($withTitle)
  <div class="title-section {{$colorTitleByClass}} {{$AlainTitle}} {{$titleClass}}">
    {{$title}}
  </div>
@endif
@if($withSubtitle)
  <div class="subtitle-section {{$colorSubtitleByClass}} {{$AlainSubtitle}} {{$subtitleClass}}">
    {!!$subtitle!!}
  </div>
@endif
</div>
@section('scripts-owl')
  @parent
  <style>
    #{{$layout}} .title-section {
      @if($colorTitleByClass=="text-custom") color: {{$colorTitle}}; @endif
      font-size: {{$fontSizeTitle}}px;
      @if(!empty($titleStyle))
      {!!$titleStyle!!}
      @endif
    }
    #{{$layout}} .subtitle-section {
      @if($colorSubtitleByClass=="text-custom") color: {{$colorSubtitle}}; @endif
      font-size: {{$fontSizeSubtitle}}px;
      @if(!empty($subtitleStyle))
      {!!$subtitleStyle!!}
      @endif
    }
  </style>
@endsection