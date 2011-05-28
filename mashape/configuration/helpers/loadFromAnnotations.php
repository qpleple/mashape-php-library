<?php

require_once(dirname(__FILE__) . "/../restMethod.php");
require_once(dirname(__FILE__) . "/../restObject.php");
require_once(dirname(__FILE__) . "/../restField.php");

define("XML_METHOD", "method");
define("XML_METHOD_NAME", "name");
define("XML_METHOD_HTTP", "http");
define("XML_METHOD_ROUTE", "route");

define("XML_RESULT", "result");
define("XML_RESULT_ARRAY", "array");
define("XML_RESULT_TYPE", "type");
define("XML_RESULT_NAME", "name");

function loadMethodsFromAnnotations() {
    $annotatedMethods = getAnnotatedMethods("ComponentAPI");
    $restMethods = array();
    
    foreach ($annotatedMethods as $annotatedMethod) {
        
        $http = getHttpMethodFromAnnotations($annotatedMethod);
        $route = $annotatedMethod->getAnnotation("Route")->value;
        $array = $annotatedMethod->hasAnnotation("ResultArray");
        if ($array) {
            $result = $annotatedMethod->getAnnotation("ResultArray")->value;
        } else {
            $result = $annotatedMethod->getAnnotation("Result")->value;
        }
        echo ($array == true ? "true" : "false") . "\n";
        die(var_dump($result));
        
        
    	$restMethod = new RESTMethod();
		$restMethod->setName($annotatedMethod->name);
		$restMethod->setObject(null);
		$restMethod->setResult("resultNameAAA");
		$restMethod->setArray($array);
		$restMethod->setHttp($http);
		$restMethod->setRoute($route);

		//Save method
		array_push($restMethods, $restMethod);
	}
	return $restMethods;
}

function restObjectsFromArray($className, $array) {
    $fields = array();
    $objects = array();
    foreach ($array as $key => $value) {
        $field = new RESTField();
		$field->setName(is_int($key) ? $value : $key);
		$field->setObject(is_array($value) ? $key : null);
		$field->setMethod(null);
		$field->setArray($value instanceof ResultArray ? true : false);
		$field->setOptional(true);
		$fields[] = $field;
		
    }
    
    $object = new restObject();
    $object->setClassName($className);
    $object->setFields($fields);
    return $object;
}

function loadObjectsFromAnnotations() {
    return array();
}

function getAnnotatedMethods($className) {
    $reflection = new ReflectionClass($className);
    $annotatedMethods = array();

    foreach ($reflection->getMethods() as $method) {
       if ($method->class == $className && $method->name != "__construct") {
           $annotatedMethods[] = new ReflectionAnnotatedMethod($className, $method->name);
       }
    }

    return $annotatedMethods;
}

function getHttpMethodFromAnnotations($annotatedMethod) {
    $httpMethods = array("GET", "POST", "PUT", "DELETE");

    foreach ($httpMethods as $httpMethod) {
        if ($annotatedMethod->hasAnnotation($httpMethod)) {
            return $httpMethod;
        }
    }
    
    return null;
}