<?php

require_once PROJECT_ROOT_PATH . "/Model/Database.php";
header('Access-Control-Allow-Origin:*'); // * represents allowing requests from any website
header('Access-Control-Allow-Headers:*'); // Allowable request types
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE, PUT'); // Allowable request methods
header('Access-Control-Allow-Credentials:true'); // Set whether sending cookies is allowed

class UserModel extends Database

{

    public function getRatings($limit)

    {
      
        return $this->select("SELECT * FROM ratings ORDER BY username ASC LIMIT ?", ["i", $limit]);

    }

    public function loginUsername($username, $password){
        
        return $this->userLogin($username, $password);
    }

    public function loginEmail($email, $password){
        
        return $this->emailLogin($email, $password);
    }

    // public function login($username, $password){
        
    //     return $this->userLogin($username, $password);
    // }


    public function addSong($username, $song, $artist, $rating){
      
    $exists = $this->selectDupeAdd("SELECT * FROM users WHERE username = ? AND email = ? AND artist = ?", ["sss", $username, $song, $artist]);
    // echo "huh?";
        if (gettype($exists) == gettype("hello")){
            echo "already submitted";
            return "you've already submitted this song";
        }
        else 
        {
        // $password_hash =  password_hash($password, PASSWORD_DEFAULT);
            echo "trying to add";
            return $this->create("INSERT INTO users (username, password, email, classes, points, loggedin) VALUES (?, ?, ?, ?, ?, ?)", ["ssssii", $username, $password, $email, "", 0, 0]);
        }
    }
    public function createUsers($username, $password, $email){
        // return $this->create("INSERT INTO ratings (username, song, artist, rating) VALUES (?, ?, ?, ?)", ["sssi", $username, $song, $artist, $rating], $username, $song, $artist, $rating);
        $exists = $this->selectDupe("SELECT * FROM users WHERE username = ?", ["s", $username]);
        if (gettype($exists) == gettype("hello")){
            return "username is taken";
        }
        else 
        {
        $password_hash =  password_hash($password, PASSWORD_DEFAULT);
            return $this->create("INSERT INTO users (username, password, email, classes, points, loggedin) VALUES (?, ?, ?, ?, ?, ?)", ["ssssii", $username, $password_hash, $email, "", 0, 0]);
            // return $this->create("INSERT INTO users (username, password, email, classes, points, loggedin) VALUES (?, ?, ?, ?, ?)", ["ssssi", $username, $password_hash, $email, "", 0, 0]);
        }
    }
    // Prepares Data for usage in 'editSong' and 'deleteSong'
    public function deleteSong($username, $song, $artist)
    {
        // echo "yoooooooo";
        return $this->delete("DELETE FROM ratings WHERE username = ? AND song = ? and artist = ?", ["sss", $username, $song, $artist]);
    }

    public function editRatingPASS($id, $username, $artist, $song, $rating){
        echo "Pass Operational!";
        // return $this->editSong($id, $username, $artist, $song, $rating);
        return $this->editSong("UPDATE ratings SET artist = ?, song = ?, rating = ? WHERE id = ?", ["ssii", $artist, $song, $rating, $id]);
    }
}

