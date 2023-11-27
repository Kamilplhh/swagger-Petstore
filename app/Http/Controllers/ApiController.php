<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function addPet(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'id' => ['required', 'numeric', 'min:0'],
            'status' => ['string', 'max:255'],
        ]);
        $pet = $request->all();

        $response = Http::post('https://petstore.swagger.io/v2/pet', $pet);

        if ($response->successful()) {
            $message = 'Zwierzę zostało dodane';
        } else {
            $errorResponse = $response->json();
            $message = $errorResponse['message'];
        }

        return view('home', compact('message'));
    }

    public function searchPet(){

        return view('home', compact('pets'));
    }
}
