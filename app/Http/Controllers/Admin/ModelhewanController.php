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
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    try {
        $image = $request->file('image');
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

        return view('Admin.Model.result', compact('data'));
    } catch (\Exception $e) {
        Log::error('Error uploading image: ' . $e->getMessage());
        return redirect()->back()->with('error', 'There was an error uploading the image: ' . $e->getMessage());
    }
}

}
