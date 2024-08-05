<?php
namespace App\Http\Controllers;

use App\Models\Idol;
use Illuminate\Http\Request;

class IdolController extends Controller
{
    public function index()
    {
        return Idol::with('member')->get();
    }

    public function show($id)
    {
        $idol = Idol::with('member')->findOrFail($id);
        return response()->json($idol);
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'description' => 'required|string',
            'instagram' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'youtube' => 'required|string|max:255',
            'spotify' => 'required|string|max:255',
            'x' => 'required|string|max:255',
        ]);

        $idol = Idol::create($request->all());

        if($idol){
            return response()->json($idol, 200);
        }else{
            return response()->json($idol, 500);
        }
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'description' => 'required|blob',
            'instagram' => 'required|string|max:255',
            'facebook' => 'required|string|max:255',
            'youtube' => 'required|string|max:255',
            'spotify' => 'required|string|max:255',
            'x' => 'required|string|max:255',
        ]);

        $idol = Idol::findOrFail($id);
        $idol->update($validatedData);

        return response()->json($idol);
    }

    public function destroy($id){
        $idol = Idol::findOrFail($id);
        $idol->delete();

        return response()->json(null, 204);
    }
}
