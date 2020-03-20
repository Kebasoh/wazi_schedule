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
    	<div class="col-md-7 text-center img-fliud  p-5">
    		<img src="images/two.gif" class="gif">
    	</div>
    	<div class="col-md-5 parent p-5" style="background-color:#FF6B01;color: white">
       <div class="child">
        <i class="far fa-calendar-alt fa-3x mb-3" ></i>
        <h2 class=" h4 font-weight-bold" style="letter-spacing:0.1em; font-family: lulo-clean-w01-one-bold,sans-serif;font-size: 30px;"> PLAN YOUR SESSIONS </h2>
        <p style="font-size:16px;">Schedule your availability and stay often ready to change the world</p>
       </div>
     

     </div>
  <!-- Grid row -->

 
<!-- </div> -->
<!-- Jumbotron -->
    	</div>

    <div class="row second">
      <div class="col-md-6 parent" style="background-color:#00AACE;color: white">
        <div class="child p-5">
          <i class="fas fa-edit fa-3x mb-3"></i>
          <h2 class=" h4 font-weight-bold text-align-center" style="letter-spacing:0.1em; font-family: lulo-clean-w01-one-bold,sans-serif; font-size: 30px;"> CREATE CONTENT </h2>
          <p style="font-family:avenir-lt-w01_35-light1475496,sans-serif; font-size: 15px; color: black;" class="">Create great content to help your clients stay postive and often ready for embrace there true selves and virtues</p>
        </div>
      </div>
      <div class="col-md-6 mt-5 ">
        <div class="img-responsive me">
            <img src="images/pl.png" class="img-fluid justify-content-center">
        </div>
      </div>
    </div>

    <div class="row  last">
      <div class="col-md-2"></div>

      <div class="col-md-4 end p-5" style="background-color:#00AACE; ">
        <h1 style="font-family:lulo-clean-w01-one-bold,sans-serif;letter-spacing:0.1em;font-size: 40px; " class="font-weight-bold">STAY </br>&nbsp;&nbsp;<span style="color: white">IN</span> 
        </br><span class="pr-4">TOUCH</span></h1></br>

      </div>

      <div class="col-md-4 start" style="background-color:#F0F0F0">
        <div class="icon text-center pt-5">
          <i class="fas fa-paper-plane fa-5x"></i>
        </div>
        <p class="text-center mt-3">hello@wazi.co</p>

      </div>
      <div class="col-md-2"></div>
    </div>

@endsection
@section('scripts')
@parent

@endsection