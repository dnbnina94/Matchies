<!-- autori: Petar Djukic 634/13 i Branislava Ivkovic 125/13 -->
@extends('layouts.layout_admin')

@section('title')
  {{$targetUser->username}}
@stop

@section('csslinks')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
<script src="/bootstrap-3.3.6-dist/js/upozoravanjeKorisnika.js"></script>
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
        $('#slicice').css("background-image", "url(/app/public/uploads/{{$targetUser->id}}/{{$targetRegUser->photo_link}})");
        $('#slicice1').css("background-image", "url(/app/public/uploads/{{$targetUser->id}}/{{$targetRegUser->photo_link}})");
		}
	</script>

@stop

@section('onloadfunction') onload="lol();"@stop

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
								Warn this user:
							</td>
							<td align="right" style="font-size: 16px; color: white">
								<span class="glyphicon glyphicon-remove" onclick="reportKor1remove()" style="cursor: pointer"></span>
							</td>
						</tr>
					</table>
					<form name="reportUser" method="post" action="/admin/warn_user_from_profile">
            <div style="padding-bottom:10px"></div>
  					Are you sure you want to warn this user?<br><br>
            <input type="hidden" id="user_id" name="user_id" value="">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
  					<button class=" btn" id="subButt1" type="submit" style="background: #ae0000" onclick="return proveriReport()"><b>Warn this user</b></button>
					</form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>

<div id="deleteBoxContainer">
	<div id="deleteBoxRowContainer">
		<div id="deleteBoxCellContainer">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="deleteBox col-md-4" style="margin-left: 25px; margin-right: 25px">
					<table width="100%">
						<tr>
							<td>
							</td>
							<td align="right" style="font-size: 16px; color: white">
								<span class="glyphicon glyphicon-remove" onclick="deleteKorRemove()" style="cursor: pointer"></span>
							</td>
						</tr>
					</table>
					<div class="row">
						<div class="col-md-12" align="center">
							<form name="deleteUser" action="/index_admin" method="post">
								Are you sure you want to delete this user?<br/>
								<div style="padding-bottom:10px"></div>
								<button class=" btn" id="subButt1" type="submit" style="background: #383838"><b>Delete this user</b></button>
							</form>
						</div>
					</div>
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
                        @if ($targetRegUser->sex =='f')
                        <i class="fa fa-venus"></i></div>
                        @endif
											<div class="col-md-6" align="right" id="desnoUsername">@
                        {{$targetUser->username}}
                      </div>
										</div>
										<div class="row" style="margin-left: 0px; margin-right: 0px; margin-top: 10px;">
											<div class="col-md-4 nopadding" id="reportButtonDiv">
                        <form><input type = "hidden" id="userId2" value="{{$targetUser->id}}"></form>
												<button class="btn" id="subButt" style="background: #ae0000" onclick="reportKor1()"><b>Warn this user</b></button>
											</div>
											<div class="col-md-4" id="messageButtonDiv">
												<button class="btn" id="subButt" style="background: #383838" onclick="deleteKorDisplay()"><b>Delete this user</b></button>
											</div>
											<div class="col-md-4 desno" style="color: white; font-size: 18px; padding-right: 0px; padding-left: 0px; padding-top: 5px">
												Number of strikes: <span id="brojWarninga" style="color: #ae0000; font-weight: bold">{{$targetRegUser->number_of_warnings}}</span>
											</div>
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
                            <td width="100%" align="center"></td>
                          </tr>
												</table>

												<table width="100%" id="sliciceTablet">
                          <tr>
                            <td width="40%" id="slicice1" align="center"></td>
                          </tr>
												</table>

                        <div style="height: 10px"></div>
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
