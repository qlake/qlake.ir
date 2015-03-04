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


mb_internal_encoding("UTF-8");



Route::get('docs/{page?}', function($page = 'installation')
{
	$md = new ParsedownExtra();
	
	$path = __DIR__ . "/../docs/dev/fa/$page.md";

	if (!file_exists($path))
	{
		$path = __DIR__ . "/../docs/dev/fa/under_construction.md";
	}
	
	$text = file_get_contents($path);

	$content = $md->text($text);

	return View::render('docs')->by('content', $content);
});

class Str
{
	public $driver = '';

	function __construct()
	{
		$this->driver = Stringy\StaticStringy::create('');	
	}
}

Route::any('/', function()
{
	//echo Stringy\StaticStringy::toUpperCase('sdf sd fs dfsdf sdf ');
	//print_r(\Request::getMethod());
	//print_r(\Request::getAllQuery());

	print_r($_FILES['f1']);

	if (Request::hasFile('f1'))
	{
		Request::getFile('f1')->moveTo(__DIR__ . '/../public/files/f1.txt');
	}


	return View::render('form');exit;

	return DB::select('trt as 5', '*')
		->from('table')
		->where('user.id', '>', 10)
		->or(function($q){

			$q->where('id', '=', 5)->and('name', '>=', 45);
			
		})->toSql();

});
