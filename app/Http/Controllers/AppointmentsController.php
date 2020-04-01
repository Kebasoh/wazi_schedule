<?php
namespace App\Http\Controllers;
use App\Appointment;
use APP\Employee;
use Illuminate\Http\Request;


class AppointmentsController extends Controller
{
    public function showAllAppointments()
    {
        $appointments = Appointment::with('Employee')->get();
        return response()->json(Appointment::all());
    }
    public function showOneAppointment($id)
    {
        return response()->json(Appointment::find($id));;
    }
    public function create(Request $request)
    {
        $appointments = Appointment::create($request->all());
       // return csrf_token();
        return response()->json($appointments);
    }
    public function update(Request $request, $id)
    {
        $appointments = Appointment::findOrFail($id);
        $appointments->update($request->all());
        return response()->json(['message' => 'Success! appointment updated', $appointments, 200]);
    }
    public function delete( Appointment $appointments)
    {
        Appointment::findOrFail($id)->delete();
        return response()->json(['message' => 'Delete success']);
    }
}





