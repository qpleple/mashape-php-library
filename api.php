<?php
require_once("mashape/mashape.php");

// This is the server key for your component
define("SERVER_KEY", "the-server-keya");

class ComponentAPI extends MashapeRestAPI
{
	// Don't edit the constructor code
	public function __construct() {
		parent::__construct(dirname(__FILE__));
	}
     
    /**
     * @GET
     * @Route("/hello/{name}")
     * @Result({"text", "author" = {"id", "email", "password"}})
    */
	public function sayHello($name) {
		return "Hello " . $name . "!";
	}

}

// Init the library
MashapeHandler::handleApi(new ComponentAPI(), SERVER_KEY);
