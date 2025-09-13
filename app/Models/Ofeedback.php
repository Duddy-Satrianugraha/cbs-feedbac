<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ofeedback extends Model
{
    protected $fillable = [
        'ujian_name',
        'jenis_feedback',
        'tanggal',
        'nama',
        'npm',
    ];

    public function detail_feedbacks(){
        return $this->hasMany(Odetail_feedback::class);
    }

}
