<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ModelhewanController extends Controller
{
    public function index()
    {
        return view('Admin.Model.modelhewan');
    }

    public function showForm()
    {
        return view('Admin.Model.upload');
    }

    public function uploadImage(Request $request)
{
    $request->validate([
    'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:10485', // maksimum 10MB
]);
    try {
        $image = $request->file('file');
        $imagePath = $image->getPathname();
        $imageName = $image->getClientOriginalName();

        $client = new Client();
        $response = $client->post('http://127.0.0.1:8000/uploadgambar/', [
            'multipart' => [
                [
                    'name' => 'file',
                    'contents' => fopen($imagePath, 'r'),
                    'filename' => $imageName
                ]
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);

        if (!$data) {
            throw new \Exception("Invalid response from API");
        }

        return response()->json($data);

    } catch (\Exception $e) {
        Log::error('Error uploading image: ' . $e->getMessage());
        return response()->json(['error' => 'There was an error uploading the image: ' . $e->getMessage()], 500);
    }
}

}
