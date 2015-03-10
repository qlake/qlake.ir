<?php



/**
 * Application Routes
 * 
 * Write your route here.
 * 
 */
//echo '<pre>';



function is_regex($str0) {
    $regex = "/^\/[\s\S]+\/$/";
    return preg_match($regex, $str0) !== false;
}


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



function asset($path)
{
	$baseDir = rtrim(str_replace('\\', '/', dirname(dirname($_SERVER['SCRIPT_NAME']))), '/');

	return $baseDir .'/'. $path;
}

Route::get('/c', function($t =54654654654){
	echo 'asdasd' . $t;
});


mb_internal_encoding("UTF-8");
/*
header('Content-Type: text/plain');
	Route::get('ghjfg/{id?}', function(){});

	$route->compile();

	print_r($route);exit();*/

Route::get('docs/{page?:\w+}', function($page = 'installation')
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

class Str extends Stringy\Stringy
{
	protected $driver;

	function __construct()
	{
		//$this->driver = Stringy\StaticStringy::create('');	
	}



	public function __call($method, $args)
	{
		//if
	}
}


class Date
{

}




Route::any('/', function()
{
	//echo Stringy\StaticStringy::toUpperCase('sdf sd fs dfsdf sdf ');
	//print_r(\Request::getMethod());
	//print_r(\Request::getAllQuery());

return date('Y-m-d H:i:s', -1000000000);

	Payment::request(1000, 1);

	if (Payment::isReady())
	{
		//Payment::redirect();
	}
	else
	{
		$error = Payment::getRequestError();
	}



	return 54654;

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
