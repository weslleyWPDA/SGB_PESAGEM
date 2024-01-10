<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fornecedor extends Model
{
    use HasFactory;
    protected $table = 'fornecedores';
    protected $fillable = [
        'name',
        'cpf_cnpj',
        'delete',
        'fazenda_id',
    ];
    public function fazenda()
    {
        return $this->hasOne(Fazenda::class, 'id', 'fazenda_id');
    }
}
