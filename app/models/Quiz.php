<?php

class Quiz extends Eloquent {
	protected $table = 'quizzes';
	
	public function quizResults()
	{
		return $this->hasMany('Result');
	}
	
	public function users()
	{
		return $this->belongsToMany('User');
	}
	
	public function creator()
	{
		return $this->belongsTo('User');
	}
	
	public function groups()
	{
		return $this->belongsTo('Group');
	}
	
	public function questions()
	{
		return $this->hasMany('Question');
	}
}