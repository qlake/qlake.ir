<?php
/**
 * In this file register application dependencies.
 * for use of these, just use of $app['provider'].
 * these are lazyload. So high the performance.
 */

/**
 * Register router singleton provider.
 */

$app = Qlake\Architecture\Application::$instance;


Qlake\Architecture\Iwan::setApplication($app);








$app->singleton('router', function($app)
{
	return new Qlake\Routing\Router;

})->staticAlias('App');




$app->singleton('router', function($app)
{
	return new Qlake\Routing\Router;

})->staticAlias('Route');




/**
 * Register request singleton provider.
 */
$app->singleton('request', function($app)
{
	return Qlake\Http\Request::capture();

})->staticAlias('Request');




/**
 * Register view instance provider.
 */
$app->bind('view', function($app)
{
	$view = new Qlake\View\View(__DIR__ . '/../app/views');

	//$view->setPaths([]);

	return $view;

})->staticAlias('View');




/**
 * Register config singleton provider.
 */
$app->singleton('config', function($app)
{
	$defaultPath = __DIR__;

	$config = new Qlake\Config\Config();

	$config->setDefaultPath($defaultPath);

	return $config;

})->staticAlias('Config');




/**
 * Register database query builder instance provider.
 */
$app->bind('db', function($app)
{
	$cf = new Qlake\Database\Connection\ConnectionFactory(Config::get('database'));

	$connector = $cf->createConnector();

	$connection = $connector->createConnection();

	return new Qlake\Database\Query($connection, new Qlake\Database\Grammar\MysqlGrammar);

})->staticAlias('DB');



/**
 * Register cache singleton provider.
 */
$app->singleton('cache', function($app)
{
	$driverName = Config::get('cache.driver');

	$className = "Qlake\\Cache\\".ucfirst($driverName)."Cache";

	$driver = new $className;

	$cfgDrivers = Config::get("cache.drivers");

	$driver->setConfig($cfgDrivers[$driverName]);
	
	$cache = new Qlake\Cache\Cache($driver);

	return $cache;

})->staticAlias('Cache');



/**
 * Register html singleton provider.
 */
$app->singleton('html', function($app)
{
	return new Qlake\Html\Html();

})->staticAlias('Html');


