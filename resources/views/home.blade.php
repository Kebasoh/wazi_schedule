@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-2"></div>
    	<div class="col-md-8 text-center">
    		<h2 style="color: #00AACE;font-family: lulo-clean-w01-one-bold,sans-serif;letter-spacing:0.1em;	" id="wazit"><strong>WELCOME TO 
    		<div id="one">WAZI</div>
    	THERAPIST DASHBOARD</strong></h2>
    	</div>
    	<div class="col-md-2"></div>
            
        </div>


    <div class="row" id="two">
    	<div class="col-md-8 text-center img-fliud  p-5">
    		<img src="images/two.gif" class="gif">
    	</div>
    	<div class="col-md-4 text-center here" style="background-color:#FF6B01;color: white">
    		<!-- Jumbotron -->
<!-- <div class="jumbotron" style="background-color:#FF6B01;color: white"> -->

 <i class="far fa-calendar-alt fa-3x mb-3"></i>
  <!-- Title -->
  <h3 class="card-title h4 font-weight-bold mt-2" style="font-family: lulo-clean-w01-one-bold,sans-serif;letter-spacing:0.1em;"> PLAN YOUR SESSIONS</h3>

  <!-- Subtitle -->

  <!-- Grid row -->
  <div class="row d-flex justify-content-center">

    <!-- Grid column -->
    <div class="col-xl-7 ">

      <p class="card-text text-center mt-2" style="font-family:avenir-lt-w01_35-light1475496,sans-serif; font-size: 16px;">Schedule your availability and stay often ready to change the world</p>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

 
<!-- </div> -->
<!-- Jumbotron -->
    	</div>
    </div>

    <div class="row">
      <div class="col-md-7 "></div>
      <div class="col-md-5">
        
      </div>

@endsection
@section('scripts')
@parent

@endsection