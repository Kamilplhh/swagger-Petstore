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

    public function searchPetByID(Request $request){
        $request->validate([
            'id' => ['required', 'numeric', 'min:0'],
        ]);

        try {
            $response = Http::get('https://petstore.swagger.io/v2/pet/'. $request['id']);

            if ($response->successful()) {
                $pet = $response->json();
                return view('home', compact('pet'));
            } else {
                $message = 'Zwierze nie zostało odnalezione';
                return view('home', compact('message'));
            }
        } catch (Exception $e) {
            $message = 'Wystąpił błąd: ' . $e->getMessage();
            return view('home', compact('message'));
        }
    }

    public function searchPetByStatus(Request $request){
        $request->validate([
            'status' => ['required', 'string', 'max:255'],
        ]);

        try {
            $response = Http::get('https://petstore.swagger.io/v2/pet/findByStatus?status='. $request['status']);

            if ($response->successful()) {
                $Array = $response->json();
                
                if (count($Array) >= 10) {
                    $pets = collect($Array)->random(10);
                    return view('home', compact('pets'));
                } else {
                    $pets = $response->json();
                    return view('home', compact('pets'));
                }
            } else {
                $message = 'Zwierze nie zostało odnalezione';
                return view('home', compact('message'));
            }
        } catch (Exception $e) {
            $message = 'Wystąpił błąd: ' . $e->getMessage();
            return view('home', compact('message'));
        }
    }
}