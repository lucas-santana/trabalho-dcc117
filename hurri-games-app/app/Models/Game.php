<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name' ,
        'categories',
        'description',
        'languages' ,
        'normal_price',
        'operational_system',
        'processor',
        'graphics_card',
        'directx',
        'storage',
        'memory',
        'released_at',
        'image'
    ];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'released_at' => 'date',
    ];


    public function wishList(){
        return $this->belongsToMany(Game::class,'wish_lists')->withTimestamps();
    }

    /*
     * Um jogo pode ser cadastrado por 1 usuário
     * usuario que cadastrou o jogo
     */
    public function developer(){
        return $this->belongsTo(User::class,'dev_user_id');
    }

    /*
     * Um jogo pode ter várias categorias
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


}
