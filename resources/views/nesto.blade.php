<!DOCTYPE html>
<html>
<head></head>
<body>
  @if ( isset ($interestedMen))
    @if($interestedMen != '')
    {{$interestedMen}} <br/>
    @endif
  @endif

  @if ( isset($interestedWomen))
    @if($interestedWomen != '')
    {{$interestedWomen}} <br/>
    @endif
  @endif

  {{$file}} <br/>

</body>
</html>
