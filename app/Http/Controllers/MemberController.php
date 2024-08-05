<?php
namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return Member::with('idol')->get();
    }

    public function show($id)
    {
        return Member::with('idol')->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'id_idol' => 'required|exists:idol,id',
            'umur' => 'required|string|max:50',
            'description' => 'nullable|string',
            'hobi' => 'nullable|string',
            'makanan' => 'nullable|string',
            'image_url' => 'required|string|max:255',
        ]);

        $member = Member::create([
            'nama' => $request->nama,
            'id_idol' => $request->id_idol,
            'umur'=> $request->umur,
            'description'=> $request->description,
            'hobi'=> $request->hobi,
            'makanan'=> $request->makanan,
            'image_url'=> $request->image_url,
        ]);

        if($member){
            return response()->json($member, 200);

        }else{
            return response()->json($member, 500);
        }
    }

    public function update(Request $request, $id)
    {
        $member = Member::where('id',$id)->first();  
    
        $validateData = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|string|max:50',
            'description' => 'nullable|string',
            'hobi' => 'nullable|string',
            'makanan' => 'nullable|string',
            'image_url' => 'required|string|max:255',
        ]);
    
        $member->update($validateData);

        if ($member) {
            return response()->json($member, 200);
        } else {
            return response()->json($member, 500);
        }
    }
    

    public function destroy($id){
        $member = Member::with('idol')->findOrFail($id);
        $member->delete();

        return response()->json(null, 204);
    }
}
