@extends('layouts.admin')
@section('content')
<h3 class="page-title">Availability Calendar</h3>
 <div class="card">
        <div class="card-header">
            {{ trans('global.systemCalendar') }}
        </div>

        <div class="card-body">
            {!! Form:: open(array('route' => 'events.add','method'=> 'POST', 'files' => 'true')) !!}
          <div class="row">
          	<div class="col-sm-12 col-md-12 col-lg-12">
          		@if (Session::has('success'))
          		<div class="alert alert-success">{{ Session:: get('success') }}</div>
          		@elseif (Session:: has('warning'))
          		 <div class="alert alert-danger">{{ Session::get('warning') }}</div>
          		@endif
          	</div>

          	<div class="col-sm-12 col-md-12 col-lg-12">
          		<div class="form-group">
          			{!! Form::label('title','Title:') !!}
          			<div class="">
          				{!! Form::text('title', null, ['class' => 'form-control']) !!}
          				{!! $errors->first('title', '<p class="alert alert-danger">:message</p>') !!}
          		</div>
          	</div>
          </div>

          <div class="col-sm-12 col-md-12 col-lg-12">
          	<div class="form-group">
          		{!! Form::label('availability_start', 'Availability_Start:') !!}
          		<div class="">
          			{!! Form::date('availability_start', null,['class' => 'form-control']) !!}
          			{!! $errors->first('availability_start', '<p class="alert alert-danger">:message</p>') !!}
          		</div>
          </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="form-group">
          		{!! Form::label('availability_end', 'Availability_End:') !!}
          		<div class="">
          			{!! Form::date('availability_end', null,['class' => 'form-control']) !!}
          			{!! $errors->first('availability_end', '<p class="alert alert-danger">:message</p>') !!}
          		</div>
          </div>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-12 text-center">&nbsp;</br>
        	{!! Form :: submit('Add Event',['class'=>'btn btn-primary']) !!}
        </div>
        	
        </div>
    </div>
@endsection