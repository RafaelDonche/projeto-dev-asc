<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'campanha', 'nome', 'sobrenome', 'email', 'telefone',
        'endereco', 'cidade', 'cep', 'data_nascimento'
    ];

    protected $guarded = ['id', 'created_at', 'update_at'];

    protected $table = 'contatos';
}
