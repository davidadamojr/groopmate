<?php

class Quiz extends Eloquent {
	protected $table = 'quizzes';
	
	public function quizResults()
	{
		return $this->hasMany('Result');
	}
	
	public function users()
	{
		return $this->belongsToMany('User', 'quiz_taken', 'user_id', 'quiz_id');
	}
	
	public function user()
	{
		return $this->belongsTo('User');
	}
	
	public function group()
	{
		return $this->belongsTo('Group');
	}
	
	public function questions()
	{
		return $this->hasMany('Question');
	}
}