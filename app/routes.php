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

Route::any('/', 'App\Controllers\Index');


Route::any('ajax', function()
{
	echo '<pre>';
	var_dump(file_get_contents('php://input'));exit;
	echo '
<hr/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
<button>Send</button>
<script>

$("button").click(function()
{
	$.ajax({
    type: "POST",
    url: "",
    headers: {
        "SOAPACTION":"first value",
        "My-Second-Header":"second value"
    }
    //OR
    //beforeSend: function(xhr) { 
    //  xhr.setRequestHeader("My-First-Header", "first value"); 
    //  xhr.setRequestHeader("My-Second-Header", "second value"); 
    //}
}).done(function(){});
});

</script>

	';
	exit;
});