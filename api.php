<?php
// This is the server key for your component
define("SERVER_KEY", "the-server-key");

class ComponentAPI extends MashapeRestAPI
{
    /**
     * @GET
     * @Route("/hello/{name}")
     * @Result({"text", "author" = {"id", "email", "password"}})
    */
	public function sayHello($name) {
		return "Hello " . $name . "!";
	}
}
