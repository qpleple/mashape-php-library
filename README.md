Mashape PHP Library modified
============================

Annotations instead of XML
--------------------------

Declare your API and routing pattern right into your PHP code :
<pre>
/**
 * @GET
 * @Route("/hello/{name}")
 * @Result({"text", "author" = {"id", "email", "password"}})
*/
public function sayHello($name) {
	return "Hello " . $name . "!";
}
</pre>

Front controller
----------------

In the original Mashape PHP Library, the front controller is `api.php` which is also the file where the user is supposed to write the API. In this version, the front controller is `index.php` and the user does not need to open or edit it. He only has to edit `api.php` which can not be more simple :
<pre>
define("SERVER_KEY", "the-server-key");

class ComponentAPI extends MashapeRestAPI {
    /**
     * @GET
     * @Route("/hello/{name}")
     * @Result({"text", "author" = {"id", "email", "password"}})
    */
    public function sayHello($name) {
    	return "Hello " . $name . "!";
    }
}
</pre>

## Original code

from http://github.com/Mashaper/mashape-php-library

The Mashape PHP Library is:
- it's a dead simple PHP framework for generating RESTful APIs
- it supports everything from custom routes to custom errors, following the DRY (Don't Repeat Yourself) principle: reuse your existing code
- it's fully integrated with Mashape: distribute your components, get traction and make money!

For the complete documentation, please visit http://www.mashape.com/guide/publish/php
