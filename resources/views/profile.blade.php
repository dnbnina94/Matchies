<!-- autori: Petar Djukic 634/13 i Branislava Ivkovic 125/13 -->
@extends('layouts.layout_basic')

@section('title')
  {{$targetUser->username}}
@stop

@section('csslinks')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
<script src="/bootstrap-3.3.6-dist/js/reportovanjeKorisnika.js"></script>
<script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
@stop

@section('sewingBut')
@parent
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
    @if (!is_null($interakcija))
		    document.getElementById('progressComplete').style.width = "{{$procenat}}%";
		    document.getElementById('progressBarTekst').innerHTML = "{{$procenat}}% Complete";
    @endif
    @if ((!is_null($interakcija) && $procenat == 100) || $targetUser == $user)
      $('#slicice').css("background-image", "url(/app/public/uploads/{{$targetUser->id}}/{{$targetRegUser->photo_link}})");
      $('#slicice1').css("background-image", "url(/app/public/uploads/{{$targetUser->id}}/{{$targetRegUser->photo_link}})");
    @endif
  }
</script>
@stop

@section('onloadfunction') onload="lol(); pullNotifications();" @stop

@section('profileLink')
href = "/profile/{{$user->id}}"
@stop

@section('specialMessage')
<div id="reportBoxContainer">
	<div id="reportBoxRowContainer">
		<div id="reportBoxCellContainer">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="reportBox col-md-4" style="margin-left: 25px; margin-right: 25px">
					<table width="100%" style="margin-bottom: 10px">
						<tr>
							<td style="font-weight: bold; font-size: 16px; color: white">
								Report this user:
							</td>
							<td align="right" style="font-size: 16px; color: white">
								<span class="glyphicon glyphicon-remove" onclick="reportKor1remove()" style="cursor: pointer"></span>
							</td>
						</tr>
					</table>
					Is this user bothering you? Tell us what they did:
					<form name="reportUser" method="post" action="/reportUser">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="reportedUser" value="{{$targetUser->id}}">
            <input type="hidden" id="reportType" name="reportType" value="">
					<div style="padding-bottom:10px"></div>
					<div style="padding-bottom: 8px; border-bottom: 1px solid #B9BAB8">
						<input id="report1" type="radio" name="report" value="report1" checked="checked">
						<label for="report1"><span><span></span></span>Feels like spam</label>
					</div>
					<div style="padding-bottom: 8px; padding-top:10px; border-bottom: 1px solid #B9BAB8">
						<input id="report2" type="radio" name="report" value="report2">
						<label for="report2"><span><span></span></span>This user is sharing inappropriate information</label>
					</div>
					<div style="padding-bottom: 10px; padding-top:10px;">
						<input id="report3" type="radio" name="report" value="report3">
						<label for="report3"><span><span></span></span>Other</label><br/>
						<div style="padding-bottom: 6px"></div>
						<textarea class="form-control"  placeholder="Write down a reason for reporting this user" name="OtherReason" id="otherreason" style="font-size:16px; padding-left: 12px; resize: none"></textarea>
						<div id="greskaReport" style="color: #AE0000; padding-top: 5px"></div>
					</div>
					<button class=" btn" id="subButt1" type="submit" style="background: #383838" onclick="return proveriReport()"><b>Report this user</b></button>
					</form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('settingsBoxContainer')
@parent
@stop

@section('navbar')
@parent
@stop

@section('content')

<div class="container" id="containerDiv">
	<div class="row" id="content" style="padding-top: 3%;">

					<div class="col-md-10 col-md-offset-1" align="center">

						<div class="jumbotron" style="background: rgba(170,170,170, 0.6)">

							<div class="row">
								<div class="col-md-12">
									<div class="jumbotronProfile">
										<div class="row" style="font-weight: bold; color: white; font-size: 16px">
											<div class="col-md-6" align="left" id="levoIme">{{$targetRegUser->name}} {{$targetRegUser->surname}}, {{$years}},
                        @if ($targetRegUser->sex == 'm')
                        <i class="fa fa-mars"></i></div>
                        @endif
                        @if ($targetRegUser->sex == 'f')
                        <i class="fa fa-venus"></i></div>
                        @endif
											<div class="col-md-6" align="right" id="desnoUsername">@
                        {{$targetUser->username}}
                      </div>
										</div>
										<div class="row" style="margin-left: 0px; margin-right: 0px; margin-top: 10px">
                      @if ($targetUser == $user)
                      <div class="col-md-4 nopadding" id="reportButtonDiv">
                        <form action="/edit_profile" name="odlazakNaMenjanjeProfila" method="get">
                          <button class="btn" id="subButt" style="background: #ae0000"><b>Edit your profile</b></button>
                        </form>
                      </div>
                      @endif
                      @if ($user != $targetUser)
                      <div class="col-md-4 nopadding" id="reportButtonDiv">
												<button class=" btn" id="subButt" type="submit" style="background: #383838" onclick="reportKor1()"><b>Report this user</b></button>
											</div>
                      @endif
                        @if (!is_null($interakcija))
                        <div class="col-md-4" id="messageButtonDiv">
                          <a  href="/chat/{{$interakcija->id}}">
                        <button class="btn" id="subButt" type="button" style="background: #AE0000"><b>Send message</b></button>
                      </a>
                        </div>
                        @endif
										</div>
									</div>
								</div>
							</div>

							<div class="row" style="padding-top: 20px;">
								<div class="col-md-5">

									<div class="jumbotronProfile">
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-12 nopadding" align="center">
												<table width="100%" id="slicice">
													<tr>
                            @if ((is_null($interakcija) && $user != $targetUser) || (!is_null($interakcija) && $interakcija->messages < 20))
														      <td width="100%" align="center"><span class="glyphicon glyphicon-lock" id="lock"></span></td>
                            @endif
													</tr>
												</table>

												<table width="100%" id="sliciceTablet">
													<tr>
                            @if (is_null($interakcija) || (!is_null($interakcija) && $interakcija->messages < 20))
														      <td width="40%" id="slicice1" align="center"><span class="glyphicon glyphicon-lock" id="lock"></span></td>
                            @endif
													</tr>
												</table>
												<div style="height: 10px"></div>
                        @if (is_null($interakcija) && $targetUser != $user)
                              <span style="line-height: 16px"> You don't have access to this user's photos. You are not matched with this user.</span>
                        @endif
                        @if (!is_null($interakcija))
                        <table width="100%">
                          <tr>
                            <td id="progressBar" align="center" style="color: white;">
                              <span id="progressBarTekst"></span>
                              <div class="progress" style="margin-bottom: 0px; margin-top: 10px; background: #AED581; height: 10px">
                                  <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08" id="progressComplete">
                                  </div>
                              </div>
                            </td>
                          </tr>
                        </table>
                        @endif
											</div>
										</div>
									</div>

									<div class="jumbotronProfile" style="margin-top: 20px;">
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-6 nopadding" align="left">
												<span style="color: #AE0000; font-weight: bold"> Relationship status:</span>
											</div>
											<div class="col-md-6 nopadding" align="left">
												<span id="relStatusField"> {{$targetRegUser->relationship_status}}</span>
											</div>
										</div>
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-6 nopadding" align="left">
												<span style="color: #AE0000; font-weight: bold"> Education:</span>
											</div>
											<div class="col-md-6 nopadding" align="left">
												<span id="eduStatusField"> {{$targetRegUser->education}} </span>
											</div>
										</div>
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-6 nopadding" align="left">
												<span style="color: #AE0000; font-weight: bold"> Field of work:</span>
											</div>
											<div class="col-md-6 nopadding" align="left">
												<span id="fieldOfWork"> {{$targetRegUser->work}} </span>
											</div>
										</div>
									</div>

								</div>

								<div class="col-md-7" id="kolonaInfo">
									<div class="jumbotronProfile">
										<div class="row">
											<div class="col-md-12" align="center" style="font-weight: bold; color: white">
											<span id="detailsSpan"> {{$targetRegUser->bio}} </span>

											<div class="row UserInfoRows" style="padding-top: 20px">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Likes: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserLikesCol">{{$targetRegUser->likes}}</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Dislikes: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserDislikesCol">{{$targetRegUser->dislikes}}</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Hobbies: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserHobbiesCol">{{$targetRegUser->hobbies}}</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Perfect first date: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFirstDateCol">{{$targetRegUser->firstDate}}</div>
											</div>

											<div class="row UserInfoRows" style="padding-top: 20px">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Favorite quote: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFavQuoteCol">{{$targetRegUser->quote}}</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Favorite song: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFirstDateCol">{{$targetRegUser->song}}</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Longest relationship: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserLongestRelCol">{{$targetRegUser->longest_relationship}}</div>
											</div>
											<div class="row UserInfoRows" style="padding-top: 20px">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Best quality: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserBestQualCol">{{$targetRegUser->best_quality}}</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Worst quality: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserWorstQualCol">{{$targetRegUser->worst_quality}}</div>
											</div>
											</div>
										</div>
									</div>

									<div class="jumbotronProfile" style="margin-top: 20px">
										<table width="100%">
											<tr>
                        @if ($user!=$targetUser && is_null($match_request))
												<td>
                          <form name="neSvidjaMiSe" method="post" action="{{url('/profile/disliked_user')}}">
      											<input type="hidden" name="_token" value="{{ csrf_token() }}">
      											<input type="hidden" name="currentUser" value="{{ $targetRegUser->id }}">
      											<button type="submit" style="background: none; border: none">
      												<span class="glyphicon glyphicon-remove LikeRemove" onclick="promeniRemove()"></span>
      											</button>
      										</form>
                        </td>
                        @endif
                        @if (!is_null($interakcija) && $user!=$targetUser)
                        	<td width="100%" align="left" style="color: #AE0000; padding-left: 10px"><span>You are currently matched with this user. If you want to unmatch with this user, just click the button on the left.</span></td>
                        @endif
                        @if (is_null($interakcija) && is_null($match_request) && $user!=$targetUser)
                        <td width="100%" align="center" style="color: #AE0000"><span id="areYou">Are you interested in this user?</span></td>
                        <td>
                        <form name="svidjaMiSe" method="post" action="{{url('/profile/liked_user')}}">
    											<input type="hidden" name="_token" value="{{ csrf_token() }}">
    												<input type="hidden" name="currentUser" value="{{ $targetRegUser->id }}">
    											<button type="submit" style="background: none; border: none">
    												<span class="glyphicon glyphicon-ok LikeOk" onclick="promeniOk()"></span>
    											</button>
    										</form>
                      </td>
                        @endif
                        @if (!is_null($match_request))
                        <td width="100%" align="center" style="color: #AE0000"><span id="requestSent">Match request sent!</span></td>
                        @endif
                        @if ($user == $targetUser)
                        <td align="center" style="color: #AE0000">
                          These are some details about yourself. Other users can see them by clicking on your profile. You can change these details at any time.
                        </td>
                        @endif
											</tr>
										</table>
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
