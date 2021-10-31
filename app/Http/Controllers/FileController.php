<?php
/**
 * FileController.php
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  Controllers
 * @author   Reva Svetlana <777rsb@mail.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */

namespace App\Http\Controllers;

use App\Models\FileModel as File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

/**
 * FileController Class
 *
 * Class
 *
 * @category Class
 * @package  Controllers
 * @author   Reva Svetlana <777rsb@mail.ru>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
class FileController extends Controller
{
    /**
     * Function for getting all files
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $files = File::all();
        return response()->json($files);
    }

    /**
     * Function for file uploading
     *
     * @param Request $request - request for file downloading
     *
     * @return JsonResponse
     */
    public function upload(Request $request): JsonResponse
    {
        if ($file = $request->file('file')) {
            $title = $file->getClientOriginalName();
            $size = $file->getSize();
            $path = $file->store('public/storage');
            $file = new File();
            $file->setTitle($title);
            $file->setSize($size);
            $file->setPath($path);
            $file->save();
            return response()->json(
                [
                "message" => "File successfully uploaded",
                ],
                201
            );
        } else {
            return response()->json(
                [
                "message" => "File was not found"
                ],
                404
            );
        }
    }

    /**
     * Function for file downloading
     *
     * @param string $title - file title
     *
     * @return StreamedResponse|JsonResponse
     */
    public function download(string $title)
    {
        $file = File::where('title', '=', $title)->first();
        if ($file == null) {
            return response()->json(
                [
                "error" => "File was not found"
                ],
                404
            );
        } else {
            return Storage::download($file->getPath(), $file->getTitle());
        }
    }

    /**
     * Function for file deleting
     *
     * @param string $title - file title
     *
     * @return JsonResponse
     */
    public function delete(string $title): JsonResponse
    {
        $file = File::where('title', '=', $title)->first();
        if ($file == null) {
            return response()->json(
                [
                "error" => "File was not found"
                ],
                404
            );
        } else {
            Storage::delete($file->getPath());
            $file->delete();
            return response()->json(
                [
                "message" => "File was deleted successfully"
                ]
            );
        }
    }
}
