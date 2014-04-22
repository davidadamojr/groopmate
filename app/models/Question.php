<?php

class Question extends Eloquent {
	protected $table = 'quiz_questions';
	
	public function quiz()
	{
		return $this->belongTo('Quiz');
	}
	
	public function options()
	{
		return $this->hasMany('Option');
	}
}