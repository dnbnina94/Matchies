<!-- autor: Petar Djukic 634/13 -->
@extends('layouts/layout_basic')

@section('title')
  Edit location
@stop

@section('csslinks')
  <link href="/bootstrap-3.3.6-dist/css/homepage1.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
@stop

@section('javascriptlinks')
  <script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/validacijaEditProfile.js"></script>
	<script src="/bootstrap-3.3.6-dist/js/menjanjeLozinke.js"></script>
  <script src="/bootstrap-3.3.6-dist/js/picEdit.js"></script>
@stop

@section('javascriptFunctions')
  <script>
  $(window).on('resize', function () {
    var pikseli = $("#slicice").width();
    $("#slicice").css("height", pikseli);
    var pikseli2 = $("#slicice1").width();
    $("#sliciceTablet").css("height", pikseli2);
  });
</script>

<script>
  function lol() {
    var pikseli = $("#slicice").width();
    $("#slicice").css("height", pikseli);
    var pikseli2 = $("#slicice1").width();
    $("#sliciceTablet").css("height", pikseli2);

  /*
    var pikseli = document.getElementById('slicice').clientWidth;
    document.getElementById('slicice').style.height = pikseli;

    var pikseli2 = document.getElementById('slicice1').clientWidth;
    document.getElementById('sliciceTablet').style.height = pikseli2;
    */
  }
</script>
@stop

@section('onloadfunction')
  onload="lol(); pullNotifications();"
@stop

@section('content')

  <div class="container" id="containerDiv">
  	<div class="row" id="content" style="padding-top: 3%;">


  					<div class="col-md-10 col-md-offset-1" align="center">

  						<div class="jumbotron" style="background: rgba(170,170,170, 0.6)">
  							<div class="row">
  								<div class="col-md-4 levaKolonaEditProfile">
  									<div class="jumbotronProfile">
  										<table id="editProfileMenu">
  											<tr>
  												<td class="editProfileCol">
  													<a href="/edit_profile" class="editProfileLink">Basic information</a>
  												</td>
  											</tr>
  											<tr>
  												<td class="editProfileCol">
  													<a href="/edit_location" class="editProfileLink">Location</a>
  												</td>
  											</tr>
  											<tr>
  												<td class="editProfileCol">
  													<a href="/edit_picture" class="editProfileLink" style="color: #AE0000">Pictures</a>
  												</td>
  											</tr>
  											<tr>
  												<td class="editProfileCol">
  													<a href="/edit_details" class="editProfileLink">Details</a>
  												</td>
  											</tr>
  											<tr>
  												<td class="editProfileCol" style="border: none">
  													<a href="/delete_account" class="editProfileLink">Delete your account</a>
  												</td>
  											</tr>
  										</table>
  									</div>
  									<div class="jumbotronProfile" style="margin-top: 20px; text-align: center; color: white; font-size: 16px">
  										You can use this section to edit your profile. The only things you cannot edit are your username and date of birth.<br/><br/>
  										Make sure to enter the correct information.
  									</div>
  								</div>

  								<div class="col-md-8 desnaKolonaEditProfile">
  									<div class="jumbotronProfile" style="padding-left: 20px; padding-right: 20px; font-size: 16px">

  										<div class="row">
                        <div class="col-md-12">
                          <table width="100%" id="slicice" style="margin-top: 10px">
                            <tr>
                              <td align="left" valign="middle" style="padding-left: 10px; padding-right: 10px;">
                              </td>
                              <td width="100%" style="text-align: center">
                              </td>
                              <td align="right" valign="middle" style="padding-right: 10px; padding-left: 10px;">
                              </td>
                            </tr>
                          </table>

                          <table width="100%" id="sliciceTablet" style="margin-top: 10px">
                            <tr>
                              <td align="left" valign="middle" style="padding-left: 10px; padding-right: 10px; width: 30%; background: rgba(170,170,170,0.2)">
                              </td>
                              <td width="40%" id="slicice1" style="text-align: center; background: url('app/public/uploads/{{Auth::user()->id}}/{{App\Registered_user::where('id', '=', Auth::user()->id )->first()->photo_link}}');
                              -webkit-background-size: cover;
                              -moz-background-size: cover;
                              -o-background-size: cover;
                              background-size: cover;
                              ">
                              </td>
                              <td align="right" valign="middle" style="padding-right: 10px; padding-left: 10px; width: 30%; background: rgba(170,170,170,0.2)">
                              </td>
                            </tr>
                          </table>
                          <div class="row" style="color: #AE0000; display: none; padding-left:20px;" id="greskaSlika1" align="left">

                            <span class="text-left" id="picturelabel1"></span>

                          </div>
                        </div>
                      </div>

  										<div class="row" style="padding-top: 20px; padding-bottom: 7px">
                        <div class="col-md-6"></div>
  											<div class="col-md-3 levaKolonaEditProfile" style="text-align: center">
                          <form name="editovanjeSlike" action="{{ url('/save_picture') }}" onsubmit="return promeniSliku();" method="post" enctype="multipart/form-data">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="input-group image-preview" style="background: #AE0000; border-radius: 5px">
                                    <span class="input-group-btn">
                                    <div class="btn btn-default image-preview-input" style="border: none; background: rgba(0,0,0,0); padding-bottom: 10px" >
                                      <span class="glyphicon glyphicon-folder-open" style="font-size: 16px; color: white"></span>
                                      <span class="image-preview-input-title" style="font-size: 16px; color: white; font-weight: bold">Edit picture</span>
                                      <input type="file" accept="image/*" id="file" name="file" onchange="readURL();" />
                                    </div>
                                    </span>
                          </div>
                        </div>
  											<div class="col-md-3 desnaKolonaEditProfile">
  												  <button class="btn" id="subButt" name="submitButton" type="submit" style="font-weight: bold">Save</button>
                            </div>
  												</form>


  										</div>
  									</div>
  								</div>
  							</div>
  						</div>


  					</div>

  	</div>



  </div><!-- /.container -->
@stop

@section('footer')
  <div style="height: 30px;" id="divche"></div>
@parent
@stop
