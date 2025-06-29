<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\Storage;

// class TinyMCEController extends Controller
// {
//     public function upload(Request $request)
//     {
//         $request->validate([
//             'file' => 'required|image|mimes:jgp,jpeg,png|max:2048'
//         ]);

//         $path = $request->file('file')->store('uploads', 'public');
//         return response()->json(['location' => asset('storage/', $path)]);
//     }
// }