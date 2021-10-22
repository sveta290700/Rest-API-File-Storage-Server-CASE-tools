<?php

namespace App\Http\Controllers;

use App\Models\FileModel as File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class FileController extends Controller
{
    public function getAll(): JsonResponse
    {
        $files = File::all();
        return response()->json($files);
    }

    public function upload(Request $request): JsonResponse
    {
        if ($file = $request->file('file')) {
            $title = $file->getClientOriginalName();
            $size = $file->getSize();
            $path = $file->store('public/storage');
            $file = new File();
            $file->title = $title;
            $file->size = $size;
            $file->path = $path;
            $file->save();
            return response()->json([
                "message" => "File successfully uploaded",
            ], 201);
        }
        else
            return response()->json([
                "message" => "File was not found"
            ], 404);
    }

    public function download(String $title)
    {
        $file = File::where('title', '=', $title)->first();
        if ($file == Null)
        {
            return response()->json([
                "error" => "File was not found"
            ]);
        }
        else
            return Storage::download($file->path, $file->title);
    }

    public function delete(String $title): JsonResponse
    {
        $file = File::where('title', '=', $title)->first();
        if ($file == Null)
        {
            return response()->json([
                "error" => "File was not found"
            ], 404);
        }
        else {
            Storage::delete($file->path);
            $file->delete();
            return response()->json([
                "message" => "File was deleted successfully"
            ]);
        }
    }
}
