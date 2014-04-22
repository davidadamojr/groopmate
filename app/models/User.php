<?php

class User extends Eloquent {
	protected $table = 'users';
	
	public function groups()
	{
		return $this->belongsToMany('Group', 'group_members', 'user_id', 'group_id');
	}
	
	public function quizResult()
	{
		return $this->hasMany('Result');
	}
	
	public function taken()
	{
		return $this->belongsToMany('Quiz', 'quiz_taken', 'user_id', 'quiz_id');
	}
	
	public function quiz()
	{
		return $this->hasMany('Quiz');
	}
}