@extends('layouts.layout_basic')

@section('title')
Searching
@stop

@section('csslinks')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
<script src="bootstrap-3.3.6-dist/js/reportovanjeKorisnika.js"></script>
<script src="bootstrap-3.3.6-dist/js/openSettings.js"></script>
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
    var pikseli = document.getElementById('slicice').clientWidth;
    document.getElementById('slicice').style.height = pikseli;

    var pikseli2 = document.getElementById('slicice1').clientWidth;
    document.getElementById('sliciceTablet').style.height = pikseli2;
  }
</script>
@stop

@section('onloadfunction') onload="lol() "@stop


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
					<form name="reportUser" method="post" action="/profile_1">
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
											<div class="col-md-6" align="left" id="levoIme">Thomas Appleby, 23, <i class="fa fa-mars"></i></div>
											<div class="col-md-6" align="right" id="desnoUsername">@ThomasA</div>
										</div>
										<div class="row" style="margin-left: 0px; margin-right: 0px; margin-top: 10px">
											<div class="col-md-4 nopadding" id="reportButtonDiv">
												<button class=" btn" id="subButt" type="submit" style="background: #383838" onclick="reportKor1()"><b>Report this user</b></button>
											</div>
											<div class="col-md-4 nopadding" id="messageButtonDiv">
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
														<td align="left" valign="middle" style="padding-left: 10px; padding-right: 10px; background: rgba(174,174,174,0.2)">
															<span class="glyphicon glyphicon-chevron-left" style="font-size: 20px; cursor: pointer" id="strelica1"></span>
														</td>
														<td width="100%" align="center"><span class="glyphicon glyphicon-lock" id="lock"></span></td>
														<td align="right" valign="middle" style="padding-right: 10px; padding-left: 10px; background: rgba(174,174,174,0.2)">
															<span class="glyphicon glyphicon-chevron-right" style="font-size: 20px; cursor: pointer" id="strelica2"></span>
														</td>
													</tr>
												</table>

												<table width="100%" id="sliciceTablet">
													<tr>
														<td align="left" valign="middle" style="padding-left: 10px; padding-right: 10px; width: 30%; background: rgba(170,170,170,0.2)">
															<span class="glyphicon glyphicon-chevron-left" style="font-size: 20px; cursor: pointer" id="strelica1"></span>
														</td>
														<td width="40%" id="slicice1" align="center"><span class="glyphicon glyphicon-lock" id="lock"></span></td>
														<td align="right" valign="middle" style="padding-right: 10px; padding-left: 10px; width: 30%; background: rgba(170,170,170,0.2)">
															<span class="glyphicon glyphicon-chevron-right" style="font-size: 20px; cursor: pointer" id="strelica2"></span>
														</td>
													</tr>
												</table>
												<div style="height: 10px"></div>
												<span style="line-height: 16px"> You don't have access to this user's photos. You are not matched with this user.</span>
											</div>
										</div>
									</div>

									<div class="jumbotronProfile" style="margin-top: 20px;">
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-6 nopadding" align="left">
												<span style="color: #AE0000; font-weight: bold"> Relationship status:</span>
											</div>
											<div class="col-md-6 nopadding" align="left">
												<span id="relStatusField"> In a relationship</span>
											</div>
										</div>
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-6 nopadding" align="left">
												<span style="color: #AE0000; font-weight: bold"> Education:</span>
											</div>
											<div class="col-md-6 nopadding" align="left">
												<span id="eduStatusField"> High School </span>
											</div>
										</div>
										<div class="row" style="margin: 0 !important; color: white">
											<div class="col-md-6 nopadding" align="left">
												<span style="color: #AE0000; font-weight: bold"> Field of work:</span>
											</div>
											<div class="col-md-6 nopadding" align="left">
												<span id="fieldOfWork"> Student </span>
											</div>
										</div>
									</div>

								</div>

								<div class="col-md-7" id="kolonaInfo">
									<div class="jumbotronProfile">
										<div class="row">
											<div class="col-md-12" align="center" style="font-weight: bold; color: white">
											<span id="detailsSpan"> I'm an exchange student from UK and I came to Belgrade this year. I have a girlfriend, and I'm here to make friends. </span>

											<div class="row UserInfoRows" style="padding-top: 20px">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Likes: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserLikesCol">Parties, electronic music, music festivals.</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Dislikes: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserDislikesCol">I don't like shy people.</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Hobbies: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserHobbiesCol">Sleeping and eating.</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Perfect first date: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFirstDateCol">/</div>
											</div>

											<div class="row UserInfoRows" style="padding-top: 20px">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Favorite quote: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFavQuoteCol">"Don't worry, be happy"</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Favorite song: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserFirstDateCol">Chris Brown - Beautiful People</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Longest relationship: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserLongestRelCol">2 months</div>
											</div>
											<div class="row UserInfoRows" style="padding-top: 20px">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Best quality: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserBestQualCol">I'm kind and I'm very adventurous.</div>
											</div>
											<div class="row UserInfoRows">
												<div class="col-md-5 UserInfoRowsCol1" style="font-weight: bold; color: #AE0000">Worst quality: </div>
												<div class="col-md-7 UserInfoRowsCol2" style="color: white; font-weight: normal;" id="UserWorstQualCol">I'm lazy.</div>
											</div>
											</div>
										</div>
									</div>

									<div class="jumbotronProfile" style="margin-top: 20px">
										<table width="100%">
											<tr>
												<td><span class="glyphicon glyphicon-remove LikeRemove"></span></td>
												<td width="100%" align="center" style="color: #AE0000"><span id="areYou">Are you interested in this user?</span></td>
												<td><span class="glyphicon glyphicon-ok LikeOk"></span></td>
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
