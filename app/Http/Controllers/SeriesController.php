<?php   

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Serie;
use App\Services;
use App\Http\Requests\SeriesFormRequest;
use App\Services\CriadorDeSerie;
use App\Temporada;
use App\Episodio;
use App\Services\RemovedorDeSerie;  






class SeriesController extends Controller
{
    public function index(Request $request) { 
               
    $series = Serie::query()->orderBy('nome')->get(); 
    $mensagem = $request->session()->get('mensagem');
    

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    } 

    public function store(
        SeriesFormRequest $request, 
        CriadorDeSerie $criadorDeSerie
    ) 
    
    {
        $serie = $criadorDeSerie->criarSerie(
            $request->nome, 
            $request->qtd_temporadas, 
            $request->ep_por_temporadas
        );

        

        $request->session()
        ->flash(
            'mensagem', 
            "A Série {$serie->id} e suas temporadas e episódios foram criados com sucesso {$serie->nome}"
        );

        return redirect()->route('listar_series');
        
    }

    public function destroy(Request $request, RemovedorDeSerie $removedorDeSerie)
    {
        
        $nomeSerie = $removedorDeSerie->removerSerie($request->id);
        
        $request->session()
        ->flash(
            'mensagem', 
            "Série $nomeSerie removida com sucesso"
        );

        return redirect()->route('listar_series');
    }
    
}  