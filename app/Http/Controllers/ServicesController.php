<?php
namespace App\Http\Controllers;
use App\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function showAllServices()
    {
        return response()->json(Service::all());
    }
    public function showOneService($id)
    {
        return response()->json(Service::find($id));;
    }
    public function create(Request $request)
    {
        $service = Service::create($request->all());
        
        return response()->json($service);
    }
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return response()->json(['message' => 'Success! services updated', $service, 200]);
    }
    public function delete( Services $service)
    {
        Service::findOrFail($id)->delete();
        return response()->json(['message' => 'Delete success']);
    }
}





