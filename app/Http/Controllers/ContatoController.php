<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoRequest;
use App\Models\Contato;
use App\Services\ValidarContatoService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use SplFileObject;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            $contatos = Contato::where(function($query) use($request){

                if ($request->campanha != null && $request->campanha != '') {
                    $query->whereRaw('LOWER(campanha) like ?', [strtolower($request->campanha)]);
                }

            })->get();

            return view('index', compact('contatos'));

        } catch (\Exception $e) {
            return back()->with('erro', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {

            return view('create');

        } catch (\Exception $e) {
            return back()->with('erro', $e->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContatoRequest $request)
    {
        try {

            $file = $request->file('arquivo');

            $fileObject = new SplFileObject($file->getPathname());

            if ($request->delimitador == ',' || $request->delimitador == ';') {
                $fileObject->setCsvControl($request->delimitador);
            }else {
                $fileObject->setCsvControl(';');
            }

            $fileObject->fgetcsv();

            $contadorLinhas = 1;
            $erroLinhas = [];

            $arrayContatos = [];

            while (!$fileObject->eof()) {

                $linha = $fileObject->fgetcsv();
                $contadorLinhas++;

                $contato = [];

                if ($linha !== false) {

                    if (count($linha) == 8) {
                        $contato['campanha'] = $request->campanha;
                        $contato['nome'] = $linha[0];
                        $contato['sobrenome'] = $linha[1];
                        $contato['email'] = $linha[2];
                        $contato['endereco'] = $linha[4];
                        $contato['cidade'] = $linha[5];
                        $contato['cep'] = $linha[6];

                        $tel = $linha[3];

                        if (ValidarContatoService::validarTelefone($tel)) {
                            $contato['telefone'] = preg_replace('/[^0-9]/', '', $tel);
                        }else {
                            array_push($erroLinhas, $contadorLinhas);
                        }

                        $data = $linha[7];
                        $contato['data_nascimento'] = ValidarContatoService::formatarData($data);

                        if (ValidarContatoService::verificarNulo($contato)) {
                            array_push($arrayContatos, $contato);
                        }
                    }
                }
            }

            if (count($erroLinhas) > 0) {
                return back()->with('erro', 'Foi detectado erro no telefone das linhas: ' . $contadorLinhas . '.');
            }

            foreach ($arrayContatos as $c) {
                Contato::create($c);
            }

            return redirect()->route('listagem')->with('success', 'Importação de dados realizada com sucesso.');

        } catch (\Exception $e) {
            return back()->with('erro', "Linha: " . $contadorLinhas . ' - ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function show(Contato $contato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function edit(Contato $contato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contato $contato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contato  $contato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contato $contato)
    {
        //
    }
}
