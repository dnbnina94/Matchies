@extends('layouts.layout_basic')

@section('title')
Chat!
@stop

@section('csslinks')
  <link href="bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
@stop

@section('javascriptlinks')
	<script src="bootstrap-3.3.6-dist/js/openSettings.js"></script>
@stop

@section('javascriptFunctions')
  <script>
    function skrolaj() {
      var objDiv = document.getElementById("messageBoxContainer");
      objDiv.scrollTop = objDiv.scrollHeight;
    }
  </script>

  <script>
    function dodajPoruku() {
      var poruka = document.getElementById("message").value;
      if (poruka != null && poruka != "") {
        var vreme = new Date();
        var godina = vreme.getFullYear();
        var mesec = vreme.getMonth()+1;
        if ((mesec/10)<1)
          mesec = "0"+mesec;
        var dan = vreme.getDate();
        if ((dan/10)<1)
          dan = "0"+dan;
        var sat = vreme.getHours();
        if ((sat/10)<1)
          sat="0"+sat;
        var minuti = vreme.getMinutes();
        if ((minuti/10)<1)
          minuti="0"+minuti;
        var table = document.getElementById("tabelica1");
        var row = table.insertRow(-1);
        row.innerHTML = "<td align='right' style='padding-top: 15px; padding-left: 10px'><div style='display: table'><div style='display: table-row'><div 	style='display: table-cell' class='msgBox2'><span class='message'>"+poruka+"</span><br/><br/><span class='messagetime'>"+dan+"."+mesec+"."+godina+". "+sat+":"+minuti+"</span></div></div	></div></td>";

        document.getElementById("message").value = "";
        document.getElementById("message").focus();
        skrolaj();

        return false;
      }
    }
  </script>
@stop

@section('onloadfunction')
  onload="skrolaj()"
@stop

@section('content')

  <div class="container">

  	<div class="row" id="content" style="padding-top: 3%; padding-bottom: 3%">

  		<div class="col-md-1"></div>
  		<div class="col-md-10" align="center" style="padding-left: 10px; padding-right: 10px">
  			<div style="display: table; width: 100%; border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom:20px">

  				<div class="row">
  					<div class="col-md-12">
  						<div class="jumbotronProfile" style="color: white; font-size: 16px;">
  							<a href="#" style="color: white; font-weight: bold">UserBlaBla</a> <br/><br/>
  							<span style="font-size: 14px">This progress bar shows how much you'll need to unlock UserBlaBla's photos. Once it reaches 100% you will be able to see UserBlaBla's photos.</span>
  							<table width="100%" style="margin-top: 0px !important;">
  								<tr>
  									<td width="100%">
  										<div class="progress" style="margin-bottom: 0px; margin-top: 0px; background: #AED581; height: 8px">
    											<div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #298A08; width: 50%" id="progressComplete">
    											</div>
  										</div>
  									</td>
  									<td style="padding-left: 10px">
  										<i class="fa fa-lock" style="font-size: 34px"></i>
  									</td>
  								</tr>
  							</table>
  						</div>
  						<div id="messageBoxContainer">
  							<table class="messageBox" id="tabelica1">
  								<tr>
  									<td class="colleft">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox1">
  													<span class="message">Hey, how are you? :)</span> <br/><br/>
  													<span class="messagetime">21.03.2016 11:34</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td align="right" style="padding-top: 15px; padding-left: 10px">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox2">
  													<span class="message">Hey I'm fine thx, and how are you? :D</span> <br/><br/>
  													<span class="messagetime">21.03.2016 12:00</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="colleft">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox1">
  													<span class="message">I'm great tank you :) I really like your personality, I can't wait to see your photos :D</span> <br/><br/>
  													<span class="messagetime">21.03.2016 11:54</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="colleft">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox1">
  													<span class="message">Sooo.. what kind of music are you into?</span> <br/><br/>
  													<span class="messagetime">21.03.2016 11:55</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td align="right" style="padding-top: 15px; padding-left: 10px">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox2">
  													<span class="message">Umm.. I really like indie folk, and country music, but I used to listen to Linkin Park before A LOT! xD</span> <br/><br/>
  													<span class="messagetime">21.03.2016 12:00</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td align="right" style="padding-top: 15px; padding-left: 10px">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox2">
  													<span class="message">What kind of music do you like?</span> <br/><br/>
  													<span class="messagetime">21.03.2016 12:01</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="colleft">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox1">
  													<span class="message">I also like indie folk music :)</span> <br/><br/>
  													<span class="messagetime">21.03.2016 12:30</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="colleft">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox1">
  													<span class="message">Linkin Park?! You used to be emo, or smth? xD</span> <br/><br/>
  													<span class="messagetime">21.03.2016 12:32</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td align="right" style="padding-top: 15px; padding-left: 10px">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox2">
  													<span class="message">Yeah, I guess xD</span> <br/><br/>
  													<span class="messagetime">21.03.2016 12:40</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  								<tr>
  									<td class="colleft">
  										<div style="display: table">
  											<div style="display: table-row">
  												<div style="display: table-cell" class="msgBox1">
  													<span class="message">LOL, you're funny XDDDD</span> <br/><br/>
  													<span class="messagetime">21.03.2016 12:42</span>
  												</div>
  											</div>
  										</div>
  									</td>
  								</tr>
  							</table>
  						</div>
  						<div class="jumbotronProfile" style="color: white; font-size: 16px;">
  							<div class="row">
  								<div class="col-md-10" id="sendmsgcol1">
  									<form name="saljiPoruku" method="post" action="#">
  									<input type="text" class="form-control has-error" name="Message" id="message" placeholder="Type a message" autofocus style="font-size: 16px;">
  								</div>
  								<div class="col-md-2" id="sendmsgcol2">
  									<button class="btn" id="subButt" type="submit" name="submitButton" onclick="return dodajPoruku()"><div align="center" valign="middle" style="font-weight: bold; font-size: 16px; height: 22px">Send</div></button>
  								</form>
  								</div>
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  		</div>
  		<div class="col-md-1"></div>

  	</div>

  </div>
@stop

@section('footer')
  <div style="height: 30px;" id="divche"></div>
@parent
@stop
