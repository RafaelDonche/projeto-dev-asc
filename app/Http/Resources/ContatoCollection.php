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
        // return parent::toArray($request);
        // return [
        //     'campanha' => $this->campanha,
        //     'nome' => $this->nome,
        //     'sobrenome' => $this->sobrenome,
        //     'email' => $this->email,
        //     'telefone' => $this->telefone,
        //     'endereco' => $this->endereco,
        //     'cidade' => $this->cidade,
        //     'cep' => $this->cep,
        //     'data_nascimento' => $this->data_nascimento
        // ];

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
