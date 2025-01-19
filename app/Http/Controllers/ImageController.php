<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function show($filename)
    {
        if (!Storage::disk('local')->exists('private/images/' . $filename)) {
            abort(404);
        }

        $file = Storage::disk('local')->get('private/images/' . $filename);

        return response($file, 200);
    }
}
