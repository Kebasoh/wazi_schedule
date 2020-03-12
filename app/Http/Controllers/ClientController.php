<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Model;

// class client extends Model
// {
//     protected $fillable = [
//         'firstname',
//         'lastname', 'contacts'
//     ];
// }

class clientController extends Controller
{
    public function showAllClients()
    {
        return response()->json(Client::all());
    }

    public function showOneClient($id)
    {
        return response()->json(Client::find($id));;
    }

    public function store(Request $request)
    {
        $client = Client::create($request->all());

        return response()->json($Client, 201);
    }

    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->all());
        
        return response()->json(['message' => 'Success! client updated', $client, 200]);
    }

    public function delete( client $client)
    {
        Client::findOrFail($id)->delete();
        
        return response()->json(['message' => 'Delete success']);
    }

}