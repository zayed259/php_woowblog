<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'connection.php';
require_once 'functions.php';

// Add Record in Database with Ajax jQuery
if ($_POST['type'] == 1) {
    if (isset($_POST['title']) && isset($_POST['post_content'])) {
        $user_id = $_SESSION['user_id'];
        $title = $connection->real_escape_string($_POST['title']);
        $post_content = $connection->real_escape_string($_POST['post_content']);
        $sql = "INSERT INTO `posts` (`user_id`, `title`, `content`) VALUES ('$user_id', '$title', '$post_content')";
        $result = $connection->query($sql);
        echo $result;
    }
    $connection->close();
    die();
}

//show all record with ajax jquery
if ($_POST['type'] == 2) {
    if (isset($_POST['show'])) {
        // $sql = "SELECT * FROM `posts` WHERE `deleted_at` IS NULL ORDER BY `id` DESC";
        // post and user table join query
        $sql = "SELECT `posts`.`id` AS `post_id`, `posts`.`title` AS `post_title`, `posts`.`content` AS `post_content`, `posts`.`created_at` AS `post_date`, `users`.`name` AS `user_name` FROM `posts` LEFT JOIN `users` ON `posts`.`user_id` = `users`.`id` WHERE `posts`.`deleted_at` IS NULL ORDER BY `posts`.`id` DESC";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $post = '';
            while ($row = $result->fetch_assoc()) {
                $post_date = date('d M Y', strtotime($row['post_date']));
                $p_date = HumanTime($post_date);
                $post .= '
                <div class="col-lg-6">
                    <div class="card shadow mb-3">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <div>
                        <h6 class="m-0 font-weight-bold text-primary">' . $row['post_title'] . '</h6>
                        <h6 class="m-0 p-0">' . $row['user_name'] . ' <span class=""> | ' . $p_date . '</span></h6>
                        </div>
                        
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="' . $row['post_id'] . '" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="' . $row['post_id'] . '">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                            <a class="dropdown-item" href="#">Hide</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    ' . $row['post_content'] . '
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <a href="#" class="btn btn-primary btn-block">
                                    <i class="fas fa-thumbs-up fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Like
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="#" class="btn btn-primary btn-block">
                                    <i class="fas fa-comment fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Comment
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
            echo $post;
        } else {
            echo 'No Post Found';
        }
    }
    $connection->close();
    die();
}

//Email verification
if ($_POST['type'] == 10) {
    if (isset($_POST['email'])) {
        $email = $connection->real_escape_string($_POST['email']);
        $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
        $query = $connection->query($sql);
        if ($query->num_rows > 0) {
            echo json_encode(["status" => "2", "message" => "Email already exists"]);
            die();
        } else {
            echo json_encode(["status" => "1", "message" => "Email available"]);
            die();
        }
    }
    $connection->close();
    die();
}

// Registration user with Ajax jQuery
if ($_POST['type'] == 9) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_confirmation'])) {
        $name = $connection->real_escape_string($_POST['name']);
        $email = $connection->real_escape_string($_POST['email']);
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];
        if ($password != $password_confirmation) {
            die('Password does not match');
        } else {
            // unique email check
            $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
            $query = $connection->query($sql);
            if ($query->num_rows > 0) {
                echo json_encode(["status" => "2", "message" => "Email already exists"]);
                die();
            } else {
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";
                $query = $connection->query($sql);
                if ($query) {
                    echo json_encode(['status' => "1", 'message' => 'Registration successful']);
                } else {
                    echo json_encode(['status' => "0", 'message' => 'Registration failed']);
                    die();
                }
            }
        }
    }
    $connection->close();
    die();
}
