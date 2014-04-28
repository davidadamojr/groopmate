<?php

class Group extends Eloquent {
	protected $table = 'groups';
	
	protected $guarded = array('id');
	protected $fillable = array('group_name', 'description');
	
	public function members()
	{
		return $this->belongsToMany('User', 'group_members', 'group_id', 'user_id');
	}
	
	public function quizzes()
	{
		return $this->hasMany('Quiz');
	}
	
	public function invitations()
	{
		return $this->hasMany('Invitation');
	}
}