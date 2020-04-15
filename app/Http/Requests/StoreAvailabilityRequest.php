<?php

namespace App\Http\Requests;

use App\Availability;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAvailabilityRequest extends FormRequest
{    
    public function authorize()
    {
        abort_if(Gate::denies('availability_create'), Response::HTTP_FORBIDDEN, '403 Foebidden');

        return false;
    }

    
    public function rules()
    {
        return [
            'availbility_id'    => [
                'required',
                'integer',
            ],
            'employee_id'   => [
                'required',
                'integer',
            ],
            'weekDay'   => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'fromTime'  => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'toTime'    => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'exclusionDate' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.date_format'),
            ],
        ];
    }
}
