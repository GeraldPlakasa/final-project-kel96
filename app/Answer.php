<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = "answers";

    // whitelist
    protected $fillable = ["bodytext","question_id"];
}
