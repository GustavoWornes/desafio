<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\cep;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\DB;
use PhpParser\ErrorHandler\Throwing;

class evento extends Controller
{   

    
    public function store(Request $request){
       /*  $newCep = new cep();

        $newCep->cep = $request->cep;
        $newCep->save();
        return $newCep; */
       try {
            $newCep = DB::table('ceps')->insert([
                'cep'=>$request->cep,
                'logradouro'=>$request->logradouro,
                'complemento'=>$request->complemento,
                'bairro'=>$request->bairro,
                'localidade'=>$request->localidade,
                'uf'=>$request->uf,
                'ibge'=>$request->ibge,
                'gia'=>$request->gia,
                'ddd'=>$request->ddd,
                'siafi'=>$request->siafi,
            ]);
            return $newCep;
       } catch (\Throwable $e) {
            return $e->getMessage();
       }
    }

    public function home(){
        try {
            $event = cep::all();
            return view('welcome',['events' =>$event]);
        } catch (\Throwable $e) {
            return $e->getMessage();
        }

    }
}
