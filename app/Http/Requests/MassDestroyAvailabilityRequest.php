<?php

namespace App\Http\Requests;
use App\Availability;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAvailabilityRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('availability_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return false;
    }

    
    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:availabilities,id',
        ];
    }
}
