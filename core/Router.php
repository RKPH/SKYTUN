<?php

class Router {
    // static properties
    public static $route;
    public static $url;
    public static $found = false;
    public static $param;


    public static function get($route, $function) {
        self::$route = $route;
        if(isset($_GET['url'])) {
            self::$url = $_GET['url'];
        } else {
            self::$url = "";
        }

        self::getParam();

        if(self::$route == self::$url && $_SERVER['REQUEST_METHOD'] == "GET") {
            self::$found = true;
            $function->__invoke(self::$param);
        } 

    }

    public static function post($route, $function) {
        self::$route = $route;
        if(isset($_GET['url'])) {
            self::$url = $_GET['url'];
        } else {
            self::$url = "";
        }

        if(self::$route == self::$url && $_SERVER['REQUEST_METHOD'] == "POST") {
            self::$found = true;
            $function->__invoke();
        } 
    }

    public static function getParam() {
        if(stripos(self::$route, "{") !== false) {
            // explode the route and url so they can be matched
            $routeArr = explode("/", self::$route);
            $urlArr = explode("/", self::$url);
            // var_dump(self::$route);
            // var_dump($routeArr);
            // var_dump(self::$url);
            // var_dump($urlArr);
            // extract the dynamic value from the url (ie "1")
            self::$param = end($urlArr);
            // var_dump(self::$param);
            // remove the wildcard placeholder from the route (ie "{id})
            array_pop($routeArr);
            //add the dynamic value $param to the route in place of the
            // wildcard
            array_push($routeArr, self::$param);
            // var_dump($routeArr);
            // convert route and url back to string so they
            // can be compared
            self::$route = implode("/", $routeArr);
            self::$url = implode("/", $urlArr);
            // var_dump(self::$route);
            // var_dump(self::$url);
  
        }
    }


}