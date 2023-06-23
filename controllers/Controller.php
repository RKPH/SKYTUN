<?php

class Controller {
    public $conn;
    public $req;
    public $params;
    public $files;

    public function __construct() {
        $this->conn = DB::getConn();
        $this->req = $_POST;
        $this->params = $_GET;
        $this->files = $_FILES;
        CSRF::checkToken($this->req);
    }
}