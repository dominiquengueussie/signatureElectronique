<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class SignaturePadController extends Controller
{
    public function index()
    {
        $signatures = Client::all();
        return view('signature-pad', compact('signatures'));
    }

    public function save(Request $request)
    {

        //return dd($request->all());

        $folderPath = public_path('images/'); // create signatures folder in public directory
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = $folderPath . uniqid() . '.' . $image_type;
        file_put_contents($file, $image_base64);

        // Save in your data in database here.
        Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'position' => $request->position,
            'signature' => uniqid() . '.' . $image_type
        ]);

        return back()->with('success', 'Successfully saved the signature');
    }
}
