<?php



/**
 * Application Routes
 * 
 * Write your route here.
 * 
 */



Route::get('docs', function()
{

	return View::render('docs')->set('page', 'installation');
});


Route::get('docs/{page}', function($page)
{

	return View::render('docs')->set('page', $page);
});