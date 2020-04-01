<?php
namespace App\Http\Controllers;
use App\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function showAllAvailabilities()
    {
        return response()->json(Availability::all());
    }
    public function showOneAvailability($id)
    {
        return response()->json(Availability::find($id));;
    }
    public function create(Request $request)
    {
        $availability = Availability::create($request->all());
        
        return response()->json($availability);
    }
    public function update(Request $request, $id)
    {
        $availability = Availability::findOrFail($id);
        $availability->update($request->all());
        return response()->json(['message' => 'Success! availability updated', $availability, 200]);
    }
    public function delete( Availability $availability)
    {
        Availability::findOrFail($id)->delete();
        return response()->json(['message' => 'Delete success']);
    }
}





