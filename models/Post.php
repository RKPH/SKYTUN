<?php


class Post {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // public function fetchPost($id) {
    //     $sql = "SELECT * FROM posts WHERE id = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bind_param("s", $id);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     return $result->fetch_assoc();
    // }

    public function fetchAll() {
        $sql = "SELECT * FROM albums";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results->fetch_all(MYSQLI_ASSOC);
    }
}