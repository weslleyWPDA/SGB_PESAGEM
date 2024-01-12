<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesagem extends Model
{
    use HasFactory;
    protected $table = 'pesagem';
    protected $fillable = [
        'fornecedor_id',
        'produto_id',
        'nf',
        'motorista',
        'placa',
        'data_entrad',
        'peso_entrad',
        'data_saida',
        'peso_saida',
        'obs',
        'fazenda_id',
        'user_id',
        'delete',
    ];

    public function fazenda()
    {
        return $this->hasOne(Fazenda::class, 'id', 'fazenda_id');
    }
    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function produto()
    {
        return $this->hasOne(produto::class, 'id', 'produto_id');
    }
    public function fornecedor()
    {
        return $this->hasOne(fornecedor::class, 'id', 'fornecedor_id');
    }
}
