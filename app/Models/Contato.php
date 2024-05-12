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

    public function telefoneFormatado() {

        if (strlen($this->telefone) != 13 && strlen($this->telefone) != 12) {
            return false;
        }

        $cd = substr($this->telefone, 0, 2);
        $ddd = substr($this->telefone, 2, 2);
        $final = substr($this->telefone, -4);

        if (strlen($this->telefone) == 13) {
            $inicio = substr($this->telefone, -9, 5);
        }else {
            $inicio = substr($this->telefone, -8, 4);
        }

        return $cd . '('.$ddd.')' . $inicio . '-' . $final;

    }
}
