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
	//$paragraphs = implode('/n', $generator->getParagraphs($numParagraphs) );
	$paragraphs = $generator->getParagraphs($numParagraphs);
	//return implode('<p>', $paragraphs);
	return view('loremipsum')->with('loremIpsum', $paragraphs);
});

Route::post('/randomuser', function () {
    //return view('welcome');
    //return 'Hello World';
    //return view('developersbestfriend');
	//require_once '/home/jeff/CSCI_E-15_P3/DevelopersBestFriend/vendor/fzaninotto/faker/src/autoload.php';
	require_once '../vendor/fzaninotto/faker/src/autoload.php';
	$numUsers = Input::get('users');
	$users = [];
	for( $i = 0; $i < $numUsers; $i++ )
	{
		$faker = Faker\Factory::create();
		$user = [];
		$user['name'] = $faker->name;
		//$output .= ($i + 1) . ' ' . $faker->name . ' <br>';

		if( Input::has('birthdate') )
		{
			$user['birthdate'] = $faker->dateTimeThisCentury->format('Y-m-d');
			//$output .= $faker->dateTimeThisCentury->format('Y-m-d') . ' <br>';
		}

		if( Input::has('profile') )
		{
			$user['profile'] = $faker->paragraph;
			//$output .= $faker->paragraph() . ' <br>';
		}

		//$output .= ' <br><br> ';
		array_push($users, $user);
	}
/*
	if( Input::has('birthdate') )
	{
		$output .= ' <br> Needs Birthdates. ';
	}

	if( Input::has('profile') )
	{
		$output .= ' <br> Needs Profiles. ';
	}
*/
	//return $output;
	return view('users')->with('users', $users);
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
