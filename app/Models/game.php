<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class game extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable=[
        'game_name',
        'game_description',
        'game_img',
        'game_discount',
        'game_price',
        'game_categore',
        'game_state'
    ];
    // -----------------------------------------------
    public function FunctionName()
    {
        return $this->hasmany(App\Models\gameimage::class);
    }
}
