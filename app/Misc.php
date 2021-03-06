<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Misc extends Model
{
    protected $table = 'misc';

    protected $fillable = [
        'key',
        'value'
    ];
    protected $rules = array(
        'key'  => 'required',
        'value' => 'required'
    );
    protected $errors;

    public function validate($data)
    {
        $valid = Validator::make($data, $this->rules);
        if ($valid->fails())
        {
            $this->errors = $valid->errors();
            return false;
        }
        return true;
    }

    public function errors()
    {
        return $this->errors;
    }

}
