<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Municipio;
use Illuminate\Support\Facades\Http;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = Municipio::all();

        return response()->json($municipios);
    }

    public function sync()
    {
        $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/33/municipios');

        $data = $response->json();

        foreach ($data as $item) {
            $municipio = Municipio::updateOrCreate(
                ['ibge_id' => $item['id']],
                ['ibge_name' => $item['nome']]
            );
        }

        return response()->json(['message' => 'Sync completed']);
    }
}
