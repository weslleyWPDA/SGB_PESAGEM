<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produto extends Model
{
    use HasFactory;
    protected $table = 'produtos';
    protected $fillable = [
        'name',
        'delete',
        'fazenda_id',
    ];
    public function fazenda()
    {
        return $this->hasOne(Fazenda::class, 'id', 'fazenda_id');
    }
}
