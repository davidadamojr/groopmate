<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {
	protected $table = 'users';
	
	public function profiles()
	{
		return $this->hasMany('Profile');
	}
	
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
	
	public function quizzes()
	{
		return $this->hasMany('Quiz');
	}
	
	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}