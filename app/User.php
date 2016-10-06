<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getSurveyAverages()
    {
      $averages = $this->surveys()->select(
        DB::raw(
          'avg(question_1_response) question_1_response,
          avg(question_2_response) question_2_response,
          avg(question_3_response) question_3_response,
          avg(question_4_response) question_4_response'
        ))->first();
      return $averages;
    }

    public function surveys()
    {
      return $this->hasMany('App\Survey');
    }
}
