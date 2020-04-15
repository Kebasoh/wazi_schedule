@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.availability.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.availabilities.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('employee_id') ? 'has-error' : '' }}">
                <label for="employee">{{ trans('cruds.availability.fields.employee') }}*</label>
                <select name="employee_id" id="employee" class="form-control select2" required>
                    @foreach($employees as $id => $employee)
                        <option value="{{ $id }}" {{ (isset($appointment) && $appointment->client ? $appointment->client->id : old('client_id')) == $id ? 'selected' : '' }}>{{ $client }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('employee_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('weekDay') ? 'has-error' : '' }}">
                <label for="start_time">{{ trans('cruds.availability.fields.weekDay') }}*</label>
                <input type="text" id="weekDay" name="weekDay" class="form-control datetime" value="{{ old('weekDay', isset($availability) ? $vailability->weekDay : '') }}" required>
                @if($errors->has('weekDay'))
                    <em class="invalid-feedback">
                        {{ $errors->first('weekDay') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.availability.fields.weekDay_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('fromTime') ? 'has-error' : '' }}">
                <label for="fromTime">{{ trans('cruds.availability.fields.fromTime') }}*</label>
                <input type="text" id="fromTime" name="fromTime" class="form-control datetime" value="{{ old('fromTime', isset($availability) ? $availability->fromTime : '') }}" required>
                @if($errors->has('fromTime'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fromTime') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.availability.fields.fromTime_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('toTime') ? 'has-error' : '' }}">
                <label for="toTime">{{ trans('cruds.availability.fields.toTime') }}*</label>
                <input type="text" id="toTime" name="toTime" class="form-control datetime" value="{{ old('toTime', isset($availability) ? $availability->toTime : '') }}" required>
                @if($errors->has('toTime'))
                    <em class="invalid-feedback">
                        {{ $errors->first('toTime') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.availability.fields.toTime_helper') }}
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
            
