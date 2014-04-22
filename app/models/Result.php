<?php

class Result extends Eloquent {
	protected $table = 'quiz_results';
	
	public function user()
	{
		return $this->belongsTo('User');
	}
	
	public function quiz()
	{
		return $this->belongsTo('Quiz');
	}
}