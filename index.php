<?php
// Front controller : do not edit

require_once("mashape/mashape.php");

class MashapeRestAPI extends BaseMashapeRestAPI
{
	public function __construct() {
		parent::__construct(dirname(__FILE__));
	}

}

require("api.php");

// Init the library
MashapeHandler::handleApi(new ComponentAPI(), SERVER_KEY);
