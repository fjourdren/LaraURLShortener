<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{

    protected $table = "Url";
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'target',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function generateID() {

        do {
            $idGenerated = strtolower(str_random(rand(3, 9)));
        } while(Url::where('id', '=', $this->id)->count() != 0);

        $this->id = $idGenerated;

    }

    public function scopeUrl() {
        return url('/').'/'.$this->id;
    }

}
