<?php

namespace DevelopersBestFriend\Http\Controllers;

use Illuminate\Support\Facades\Input;
use DevelopersBestFriend\Http\Controllers\Controller;

class RandomUserController extends Controller {

    /**
     * Responds to requests to POST /randomuser
     */
    public function postRandomUser() {
        require_once '../vendor/fzaninotto/faker/src/autoload.php';
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

    /**
    * Responds to requests to GET /books
    */
    public function getIndex() {
        return 'List all the books';
    }

    /**
     * Responds to requests to GET /books/show/{id}
     */
    public function getShow($id) {
        return 'Show book: '.$id;
    }

    /**
     * Responds to requests to GET /books/create
     */
    public function getCreate() {
        return 'Form to create a new book';
    }

    /**
     * Responds to requests to POST /books/create
     */
    public function postCreate() {
        return 'Process adding new book';
    }

}
