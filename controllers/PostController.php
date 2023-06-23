<?php


class PostController extends Controller {
    // properties
    public $post_id;
    public $post_user_id;
    public $post = [];
    public $posts = [];
    public $errors = [];

    // constructor
    public function __construct() {
        parent::__construct();
    }

    // methods
    // public function getPost($id) {
    //     $this->id = $id;
    //     $postModel = new Post($this->conn);
    //     $post = $postModel->fetchPost($this->id);
    //     include "views/single_post.php";
    // }

    public function getAllPosts() {
        $postModel = new Post($this->conn);
        $posts = $postModel->fetchAll();
        include "views/albums.php";
    }
}

