<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Calendar;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Event;

class EventsController extends Controller
{
    //
    public function index(){
    	return view('events');
    }
#adding a validator to deal with data and calendar data validation
    public function addEvent(Request $request){

    	$validator = validator::make($request -> all(),[
    		'title' => 'required',
    		'availability_start' => 'required',
    		'availability_end' => 'required'
    	]);
    	if ($validator->fails()){
    		\Session::flash('warning','Please enter the valid details');
            return Redirect::to('admin.availability.events')->withInput()-> withErrors($validator);
            // return redirect()-> route('admin.availability.events')->withInput()-> withErrors($validator);
    	}
        $event = new Event;
        $event -> title = $request['title'];
        $event -> availability_start = $request['availability_start'];
        $event -> availability_end = $request['availability_end'];
        $event -> save();

        \Session::flash('success', 'availability added successfully.');
        return Redirect::to('admin.availability.events');
        // return redirect()-> route('admin.availability.events');

    }
}
