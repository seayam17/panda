<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    use HasFactory;

    protected $primaryKey='expcate_id';

    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','expcate_creator','id');
    }

    public function editorInfo(){
        return $this->belongsTo('App\Models\User','expcate_editor','id');
    }
}
