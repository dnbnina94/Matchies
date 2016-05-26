@extends('layouts.layout_moderator')

@section('title')
Searching
@stop

@section('csslinks')
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link href="bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
<script src="bootstrap-3.3.6-dist/js/upozoravanjeKorisnika.js"></script>
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
		var imgArray = new Array();

		imgArray[0] = new Image();
		imgArray[1] = new Image();
		imgArray[2] = new Image();

		imgArray[0].src = "images/fuckingThomas/kek.jpg";
		imgArray[1].src = "images/fuckingThomas/funny.jpg";
		imgArray[2].src = "images/fuckingThomas/meh.jpg";

		var slikaIterator = 0;

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

			$('#slicice').css("background-image", "url("+imgArray[slikaIterator].src+")");
			$('#slicice1').css("background-image", "url("+imgArray[slikaIterator].src+")");
		}

		function sledeca() {
			if (slikaIterator == imgArray.length-1)
				slikaIterator = 0;
			else
				slikaIterator++;

			$('#slicice').css("background-image", "url("+imgArray[slikaIterator].src+")");
			$('#slicice1').css("background-image", "url("+imgArray[slikaIterator].src+")");
		}

		function prethodna() {
			if (slikaIterator == 0)
				slikaIterator = imgArray.length-1;
			else
				slikaIterator--;

			$('#slicice').css("background-image", "url("+imgArray[slikaIterator].src+")");
			$('#slicice1').css("background-image", "url("+imgArray[slikaIterator].src+")");
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
								Warn this user:
							</td>
							<td align="right" style="font-size: 16px; color: white">
								<span class="glyphicon glyphicon-remove" onclick="reportKor1remove()" style="cursor: pointer"></span>
							</td>
						</tr>
					</table>
					Choose a reason for warning this user:
					<form name="reportUser" method="post" action="/profile_4">
					<div style="padding-bottom:10px"></div>
					<div style="padding-bottom: 8px; border-bottom: 1px solid white">
						<input id="report1" type="radio" name="report" value="report1" checked="checked">
						<label for="report1"><span><span></span></span>Feels like spam</label>
					</div>
					<div style="padding-bottom: 8px; padding-top:10px; border-bottom: 1px solid white">
						<input id="report2" type="radio" name="report" value="report2">
						<label for="report2"><span><span></span></span>This user is sharing inappropriate information</label>
					</div>
					<div style="padding-bottom: 10px; padding-top:10px;">
						<input id="report3" type="radio" name="report" value="report3">
						<label for="report3"><span><span></span></span>Other</label><br/>
						<div style="padding-bottom: 6px"></div>
						<textarea class="form-control"  placeholder="Write down a reason for warning this user" name="OtherReason" id="otherreason" style="font-size:16px; padding-left: 12px; resize: none"></textarea>
						<div id="greskaReport" style="color: #AE0000; padding-top: 5px"></div>
					</div>
					<button class=" btn" id="subButt1" type="submit" style="background: #ae0000" onclick="return proveriReport()"><b>Warn this user</b></button>
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
										<div class="row" style="margin-left: 0px; margin-right: 0px; margin-top: 10px;">
											<div class="col-md-4 nopadding" id="reportButtonDiv">
												<button class="btn" id="subButt" type="submit" style="background: #ae0000" onclick="reportKor1()"><b>Report this user</b></button>
											</div>
											<div class="col-md-8 desno" style="color: white; font-size: 18px; padding-right: 0px; padding-left: 0px; padding-top: 5px">
												Number of strikes: <span id="brojWarninga" style="color: #ae0000; font-weight: bold">2</span>
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
															<span class="glyphicon glyphicon-chevron-left" style="font-size: 20px; cursor: pointer" id="strelica1" onclick="prethodna()"></span>
														</td>
														<td width="100%" align="center" id="lockCol"></td>
														<td align="right" valign="middle" style="padding-right: 10px; padding-left: 10px; background: rgba(174,174,174,0.2)">
															<span class="glyphicon glyphicon-chevron-right" style="font-size: 20px; cursor: pointer" id="strelica2" onclick="sledeca()"></span>
														</td>
													</tr>
												</table>

												<table width="100%" id="sliciceTablet">
													<tr>
														<td align="left" valign="middle" style="padding-left: 10px; padding-right: 10px; width: 30%; background: rgba(170,170,170,0.2)">
															<span class="glyphicon glyphicon-chevron-left" style="font-size: 20px; cursor: pointer" id="strelica1" onclick="prethodna()"></span>
														</td>
														<td width="40%" id="slicice1" align="center"></td>
														<td align="right" valign="middle" style="padding-right: 10px; padding-left: 10px; width: 30%; background: rgba(170,170,170,0.2)">
															<span class="glyphicon glyphicon-chevron-right" style="font-size: 20px; cursor: pointer" id="strelica2" onclick="sledeca()"></span>
														</td>
													</tr>
												</table>
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
