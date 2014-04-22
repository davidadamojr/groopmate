<?php

class Group extends Eloquent {
	protected $table = 'groups';
	
	public function users()
	{
		return $this->belongsToMany('User');
	}
	
	public function quizzes()
	{
		return $this->hasMany('Quiz');
	}
}