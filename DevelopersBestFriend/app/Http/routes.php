<?php

use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    //return view('welcome');
    //return 'Hello World';
    return view('developersbestfriend');
});

Route::post('/loremipsum', function () {
    //return view('welcome');
    //return 'Hello World';
    //return view('developersbestfriend');
	$numParagraphs = Input::get('paragraphs');
	$generator = new Badcow\LoremIpsum\Generator();
	//$paragraphs = $generator->getParagraphs(5);
	$paragraphs = $generator->getParagraphs($numParagraphs);
	return implode('<p>', $paragraphs);
});

Route::post('/randomuser', function () {
    //return view('welcome');
    //return 'Hello World';
    //return view('developersbestfriend');
	//require_once '/home/jeff/CSCI_E-15_P3/DevelopersBestFriend/vendor/fzaninotto/faker/src/autoload.php';
	require_once '../vendor/fzaninotto/faker/src/autoload.php';
	$numUsers = Input::get('users');
	$output = '';
	for( $i = 0; $i < $numUsers; $i++ )
	{
		$faker = Faker\Factory::create();
		$output .= ($i + 1) . ' ' . $faker->name . ' <br>';

		if( Input::has('birthdate') )
		{
			$output .= $faker->dateTimeThisCentury->format('Y-m-d') . ' <br>';
		}

		if( Input::has('profile') )
		{
			$output .= $faker->paragraph() . ' <br>';
		}

		$output .= ' <br><br> ';
	}

	if( Input::has('birthdate') )
	{
		$output .= ' <br> Needs Birthdates. ';
	}

	if( Input::has('profile') )
	{
		$output .= ' <br> Needs Profiles. ';
	}

	return $output;
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
