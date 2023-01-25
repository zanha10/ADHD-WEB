<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class userController extends Controller
{
    public function index()
    {
        return view('user.home');
    }
    public function data()
    {
        $dataTrain = Http::get('http://127.0.0.1:5000/datatrain');
        $dataTrain = json_decode($dataTrain, true);
        return view('user.data')->with('dataTrain', $dataTrain);
    }
    public function predict()
    {
        $response = Http::get('http://127.0.0.1:5000/question');
        $response = json_decode($response, true);
        return view('user.predict')->with('data', $response);
    }
    public function storepredict(Request $request)
    {
        unset($arr);
        for ($i = 0; $i < 45; $i++) {
            $arr['data' . $i] = (int)$request->input('pertanyaan' . $i);
        }

        $response = Http::get('http://127.0.0.1:5000/predict', $arr);

        return view('user.result')->with('result', json_decode($response, true));
    }
}
