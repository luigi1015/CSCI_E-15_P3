<?php

namespace DevelopersBestFriend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DevelopersBestFriend\Http\Controllers\Controller;

class RandomUserController extends Controller {

    /**
     * Responds to requests to POST /randomuser
     */
    public function postRandomUser(Request $request) {
        require_once '../vendor/fzaninotto/faker/src/autoload.php';
	$this->validate($request, [
		'users' => 'required|numeric|min:1|max:99',
	]);
        $numUsers = Input::get('users');
        $users = [];
        for( $i = 0; $i < $numUsers; $i++ )
        {
                $faker = \Faker\Factory::create();
                $user = [];
                $user['name'] = $faker->name;

                if( Input::has('birthdate') )
                {
                        $user['birthdate'] = $faker->dateTimeThisCentury->format('Y-m-d');
                }

                if( Input::has('profile') )
                {
                        $user['profile'] = $faker->paragraph;
                }

                array_push($users, $user);
        }
        return view('users')->with('users', $users);
    }

}
