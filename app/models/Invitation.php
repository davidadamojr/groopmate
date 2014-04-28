<?php

class Invitation extends Eloquent {
	protected $table = 'invitations';
	
	public function group()
	{
		return $this->belongsTo('Group');
	}
}