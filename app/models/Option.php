<?php

class Option extends Eloquent {
	protected $table = 'quiz_options';
	
	public function question()
	{
		return $this->belongsTo('Question');
	}
}