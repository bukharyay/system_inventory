<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DataBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/data_alat";

        $response = $client->request('GET',$url);
        $content = $response->getBody()->getContents();
        $contentArray = json_decode($content, true);
        $data = $contentArray['data'];
        return view('all.alat', ['data'=>$data]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $client = new Client();
        $url = "http://127.0.0.1:8000/api/data_alat/delete/{$id}";

        try {
            $response = $client->request('DELETE', $url);
            $statusCode = $response->getStatusCode();

            if ($statusCode == 204) {
                return redirect()->route('data-alat')->with('success', 'Data berhasil dihapus.');
            } else {
                return redirect()->route('data-alat')->with('error', 'Gagal menghapus data.');
            }
        } catch (\Exception $e) {
            // Penanganan kesalahan saat menghubungi API
            Log::error('Error deleting data: ' . $e->getMessage()); // Logging pesan kesalahan
            return redirect()->route('data-alat')->with('error', 'Terjadi kesalahan saat menghubungi API.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
