<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        logger('Upload dipanggil');

        if ($request->hasFile('file')) {
            logger('File ditemukan');

            // $path = $request->file('file')->store('uploads', 'public');
            $file = $request->file('file');

            // Debug simpan file dulu
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('uploads', $filename, 'public');
            // $path = $file->store('uploads', 'public');

            // Optional Debug | Log path dan lokasi
            logger('UPLOAD PATH: ' . $path);
            // logger('FULL PATH: ' . storage_path('app/public/' . $path));

            // SET FILE PERMISSION (Windows sometimes needs this!)
            // $fullPath = storage_path('app/public/' . $path);
            // @chmod($fullPath, 0755);

            // Coba set permission (Windows bisa bandel)
            // @chmod(storage_path('app/public/' . $path), 0755);

            $url = asset('storage/' . $path); // → http://project.test/storage/uploads/...

            return response()->json(['location' => $url]);
        }

        logger('Upload gagal - tidak ada file');
        return response()->json(['error' => 'No file uploaded.'], 400);
    }
}
