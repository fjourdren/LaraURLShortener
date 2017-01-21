<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{

	protected $table = "Url";

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

        while (true) {
            $this->attributes['id'] = strtolower(str_random(rand(3, 7)));

            if (Url::where('id', '=', $this->attributes['id'])->count() == 0) {
               return $this->attributes['id'];
            }
        }

    }

}
