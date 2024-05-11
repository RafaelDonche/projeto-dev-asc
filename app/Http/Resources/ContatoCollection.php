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
        return parent::toArray($request);
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
    }
}
