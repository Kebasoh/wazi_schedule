<?php

namespace App\Http\Controllers\Admin;

use App\Availability;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AvailabilitiesController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Availability::with([ 'employee',])->select(sprintf('%s.*', (new Availability)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'availability_show';
                $editGate      = 'availability_edit';
                $deleteGate    = 'availability_delete';
                $crudRoutePart = 'availabilities';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            
            $table->addColumn('employee_name', function ($row) {
                return $row->employee ? $row->employee->name : '';
            });

            $table->addColumn('fromTime', function ($row) {
                return $row->fromTime ? $row->fromTime : '';
            });

            $table->addColumn('toTime', function ($row) {
                return $row->toTime ? $row->toTime : '';
            });

            $table->addColumn('exclusionDate', function ($row) {
                return $row->exclusionDate ? $row->exclusionDate : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'employee', 'fromTime', 'toTime', 'exclusionDate']);

            return $table->make(true);
        }

        return view('admin.availabilities.index');
    }

    public function create()
    {
        abort_if(Gate::denies('availability_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $availabilities = Availability::all()->pluck('id', 'employee_name', 'fromTime', 'toTime', 'exclusionDate')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.availabilities.create', compact( 'employees', 'fromTime', 'toTime', 'exclusionDate'));
    }

    public function store(StoreAvailabilityRequest $request)
    {
        $availability = Availability::create($request->all());
        $availability->employees()->sync($request->input('fromTime', 'toTime', 'exclusionDate' []));

        return redirect()->route('admin.availabilities.index');
    }

    public function edit(Availability $availability)
    {
        abort_if(Gate::denies('availability_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $employees = Employee::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        

        $availability->load( 'employee', 'fromTime', 'toTime', 'exclusionDate');

        return view('admin.availabilities.edit', compact('employees', 'fromTime', 'toTime', 'exclusionDate', 'availability'));
    }

    public function update(UpdateAvailabilityRequest $request, Availability $availability)
    {
        $availability->update($request->all());
        $availability->employee()->sync($request->input('employee', []));

        return redirect()->route('admin.availabilities.index');
    }

    public function show(Availability $availability)
    {
        abort_if(Gate::denies('availability_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $availability->load('employee', 'fromTime', 'toTime', 'exclusionDate');

        return view('admin.availabilities.show', compact('availability'));
    }

    public function destroy(Appointment $appointment)
    {
        abort_if(Gate::denies('availability_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $availability->delete();

        return back();
    }

    public function massDestroy(MassDestroyAvailabilityRequest $request)
    {
        Availability::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
