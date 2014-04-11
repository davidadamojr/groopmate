<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/welcome', function()	
{
	return View::make('welcome');
});

Route::get('/notifications', function()
{
	return View::make('notifications');
});

Route::get('/invite', function()
{
	return View::make('invite');
});

Route::get('/userstats', function()
{
	return View::make('userstats');
});

Route::get('/groups', function()
{
	return View::make('groups.groups');
});

Route::get('/groups/create', function()
{
	return View::make('groups.creategroup');
});

Route::get('/groups/ryanai', function()
{
	return View::make('groups.feed');
});

Route::get('/groups/ryanai/members', function()
{
	return View::make('groups.members');
});

Route::get('/groups/ryanai/createquiz', function()
{
	return View::make('groups.createquiz');
});

Route::get('/groups/ryanai/takequiz', function()
{
	return View::make('groups.takequiz');
});

Route::get('/groups/ryanai/files', function()
{
	return View::make('groups.files');
});

Route::get('/groups/ryanai/quizzes', function()
{
	return View::make('groups.quizzes');
});

Route::get('/groups/ryanai/quizzes/taken', function()
{
	return View::make('groups.taken');
});