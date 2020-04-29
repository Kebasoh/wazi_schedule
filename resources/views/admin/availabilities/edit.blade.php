@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.availability.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.availabilities.update", [$availability->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('employee_id') ? 'has-error' : '' }}">
                <label for="employee">{{ trans('cruds.availability.fields.employee') }}*</label>
                <select name="employee_id" id="employee" class="form-control select2" required>
                    @foreach($employees as $id => $employee)
                        <option value="{{ $id }}" {{ (isset($availability) && $availability->employee ? $app->employee->id : old('employee_id')) == $id ? 'selected' : '' }}>{{ $employee }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('employee_id') }}
                    </em>
                @endif
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
            <div class="form-group {{ $errors->has('exclusionDate') ? 'has-error' : '' }}">
                <label for="exclusionDate">{{ trans('cruds.availability.fields.exclusionDate') }}*</label>
                <input type="text" id="exclusionDate" name="exclusionDate" class="form-control datetime" value="{{ old('exclusionDate', isset($availability) ? $availability->exclusionDate : '') }}" required>
                @if($errors->has('exclusionDate'))
                    <em class="invalid-feedback">
                        {{ $errors->first('exclusionDate') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.availability.fields.exclusionDate_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
            
            
