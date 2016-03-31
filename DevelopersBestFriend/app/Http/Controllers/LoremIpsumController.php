<?php

namespace DevelopersBestFriend\Http\Controllers;

//use Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DevelopersBestFriend\Http\Controllers\Controller;

class LoremIpsumController extends Controller {

    /**
     * Responds to requests to POST /loremipsum
     */
    public function postLoremIpsum(Request $request) {
	$this->validate($request, [
		'paragraphs' => 'required|string',
	]);
        $numParagraphs = Input::get('paragraphs');
        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs($numParagraphs);
        return view('loremipsum')->with('loremIpsum', $paragraphs);
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
