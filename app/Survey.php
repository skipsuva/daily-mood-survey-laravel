<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function question_one_content()
    {
      return "How happy are you feeling today?";
    }

    public function question_two_content()
    {
      return "How well did you sleep last night?";
    }

    public function question_three_content()
    {
      return "How likely are you to see a friend today?";
    }

    public function question_four_content()
    {
      return "How pleased are your with your diet today?";
    }
}
