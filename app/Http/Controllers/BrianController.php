<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrianController extends Controller
{
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
}
