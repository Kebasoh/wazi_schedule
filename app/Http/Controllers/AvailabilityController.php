<?php
namespace App\Http\Controllers;
use App\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function showAllAvailabilities()
    {
        // return response()->json(Availability::all());
        $results = app('db')->select("SELECT * FROM availability"); 
        return response()->json($results);
    }
    public function showOneAvailability($id)
    {
        return response()->json(Availability::find($id));;
    }
    // public function post(Request $request)
    // {
    //     $availability = Availability::post($request->all());
    //     INSERT ;
        
    //     return response()->json($availability);
    // }
    public function postAvailability(Request $request)
    {
        $input = $request->all();
        $results = app('db')->table('availability')->insert( 
            array(
                'employee_id'=>$input["employee_id"]
            )
        
	    );  
	    return response()->json($results);
    
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





