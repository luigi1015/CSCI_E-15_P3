<?php

namespace DevelopersBestFriend\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DevelopersBestFriend\Http\Controllers\Controller;

class LoremIpsumController extends Controller {

    /**
     * Responds to requests to POST /loremipsum
     */
    public function postLoremIpsum(Request $request) {
	$this->validate($request, [
		'paragraphs' => 'required|numeric|min:1|max:99',
	]);
        $numParagraphs = Input::get('paragraphs');
        $generator = new \Badcow\LoremIpsum\Generator();
        $paragraphs = $generator->getParagraphs($numParagraphs);
        return view('loremipsum')->with('loremIpsum', $paragraphs);
    }

}
