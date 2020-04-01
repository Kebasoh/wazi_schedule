<?php
namespace App\Http\Controllers;
use App\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function showAllServices()
    {
        return response()->json(Services::all());
    }
    public function showOneEmployee($id)
    {
        return response()->json(Services::find($id));;
    }
    public function create(Request $request)
    {
        $services = Services::create($request->all());
        //return csrf_token();
        return response()->json($services);
    }
    public function update(Request $request, $id)
    {
        $services = Services::findOrFail($id);
        $services->update($request->all());
        return response()->json(['message' => 'Success! services updated', $services, 200]);
    }
    public function delete( Services $services)
    {
        Services::findOrFail($id)->delete();
        return response()->json(['message' => 'Delete success']);
    }
}





