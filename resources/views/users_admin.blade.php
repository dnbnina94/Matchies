<!-- autori: Petar Djukic 634/13 i Branislava Ivkovic 125/13 -->
@extends('layouts.layout_admin')

@section('title')
Home Moderator
@stop

@section('csslinks')
	<link href="/bootstrap-3.3.6-dist/css/homepage.css" rel="stylesheet">
@stop

@section('javascriptlinks')
  <script src="/bootstrap-3.3.6-dist/js/openSettings.js"></script>
@stop

@section('sewingBut')
@parent
@stop

@section('settingsBoxContainer')
@parent
@stop

@section('navbarmod')
@parent
@stop

@section('content')
<div class="container">

	<div class="row" id="content" style="padding-top: 3%;">

		<div class="col-md-2"></div>
		<div class="col-md-8" align="center" style="padding-left: 10px; padding-right: 10px">
			<div style="display: table; width: 100%; border-radius: 5px; background: rgba(170,170,170, 0.8); padding-left: 20px; padding-right: 20px; padding-top: 20px; padding-bottom:20px">

				<div class="row">
					<div class="col-md-12" align="left">
						<div class="jumbotronProfile" style="color: white; font-size: 16px; padding-bottom: 0px">
							<span style="font-weight: bold"> Users: </span>
							<div style="padding-top: 10px"></div>

							@foreach ($regUsers as $regUser)

							<div class="row">
								<div class="col-md-6">
									Username: <a href="/admin/profile/{{$regUser->id}}" style="font-weight: bold; color: #AE0000">{{App\User::where('id', '=', $regUser->id)->first()->username}}</a>
								</div>
								<div class="col-md-6 desno">
									Number of strikes: <span style="color: #AE0000; font-weight: bold">{{$regUser->number_of_warnings}}</span>
								</div>
							</div>

							<table width="100%" style="margin-top: 10px; margin-bottom: 10px; border-bottom: 1px solid #B9BAB8">
								<tr>
									<td>
									</td>
								</tr>
							</table>

							@endforeach

							<div style="padding-top: 10px; padding-bottom: 25px; color: white; text-align: center">
								There are no more users to be shown.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>
@stop

@section('footer')
<div style="height: 80px;" id="divche"></div>
@parent
@stop
