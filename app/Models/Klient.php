<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klient extends Model

{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telefon',
        'password',
        'typ_konta',
        'skan_dowod',
        'skan_prawko',
    ];

    protected $table = 'users';


    public function scopeFilter($query, array $filters){
        if($filters ?? false) {
            $query->where('typ_konta', 'like', '%' . request('klient') . '%');
        }
    }

    public function wypozyczenie() {
        return $this->belongsTo(Wypozyczenie::class, 'id_klienta', 'id');
    }

}
