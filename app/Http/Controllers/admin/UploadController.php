<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file     = $request->file('file');
            // $filename = time() . '-' . $file->getClientOriginalName();
            // $path     = $file->storeAs('uploads/images', $filename, 'public');
            $path   = $file->store('public/uploads');
            $url      = Storage::url($path);
            
            return response()->json(['location' => $url]);
            // return response()->json(['location' => asset( 'storage/' . $path)]);
            // $path       = $file->store('public/uploads');
        }

        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}