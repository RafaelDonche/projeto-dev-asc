<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ContatoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $arrayContatos = [];

        foreach ($this->collection as $item) {
            array_push($arrayContatos, [
                'campanha' => $item->campanha,
                'nome' => $item->nome,
                'sobrenome' => $item->sobrenome,
                'email' => $item->email,
                'telefoneFormatado' => $item->telefoneFormatado(),
                'endereco' => $item->endereco,
                'cidade' => $item->cidade,
                'cep' => $item->cep,
                'data_nascimento' => date('d/m/Y', strtotime($item->data_nascimento))
            ]);
        }

        return [
            'data' => $arrayContatos
        ];
    }
}
