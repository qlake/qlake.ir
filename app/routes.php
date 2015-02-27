<?php



/**
 * Application Routes
 * 
 * Write your route here.
 * 
 */
//echo '<pre>';


function sortArrayByArray(Array $array, Array $orderArray) {
    $ordered = array();
    foreach($orderArray as $key) {
        if(array_key_exists($key,$array)) {
            $ordered[$key] = $array[$key];
            unset($array[$key]);
        }
    }
    return $ordered + $array;
}



function assets($path)
{
	$baseDir = dirname($_SERVER['SCRIPT_NAME']);

	return $baseDir .'/'. $path;
}

//print_r(assets('css/master.css'));exit;

/*
$f = function($family, $name)
{
	echo $name.' '.$family;
};

function f($family, $name)
{
	echo $name.' '.$family;
};

class A
{
	public static function m($family, $name)
	{
		echo $name.' '.$family;
	}
}

$a = new A;

call_user_func_array2($f, ['name' => 'reza']);exit;

$f = new ReflectionFunction ($f);

print_r($f->getParameters());
exit;
*/
/**/



//print_r(sortArrayByArray(['1', 'ali', 'name' => 'reza', 'family' => 'kho'], ['name' , 'family']));exit;


/*
$f = new ReflectionClass($f);

print_r($f->getMethods()[0]->getParameters()[0]->getDefaultValue());
exit;
*/

mb_internal_encoding("UTF-8");

/*Route::get('docs', function()
{

	return View::render('docs')->set('page', 'installation');
});
*/

Route::get('docs/{page?}', function($page = 'installation')
{
	$md = new ParsedownExtra();
	
	$path = __DIR__ . "/../docs/$page.md";

	if (!file_exists($path))
	{
		$path = __DIR__ . "/../docs/under_construction.md";
	}
	
	$text = file_get_contents($path);

	$content = $md->text($text);

	return View::render('docs')->by('content', $content);
});


Route::get('/', 'App\Controllers\Index::sdsdsdfsdf');


Route::get('/gfg/gh', null);