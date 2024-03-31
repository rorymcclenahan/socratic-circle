<?php
header('Access-Control-Allow-Origin:*'); // * represents allowing requests from any website
header('Access-Control-Allow-Headers:*'); // Allowable request types
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE, PUT'); // Allowable request methods
header('Access-Control-Allow-Credentials:true'); // Set whether sending cookies is allowed

class Database

{
    protected $connection = null;
    public function __construct()
    {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            if ( mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");   
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());   
        }			
    }

    public function select($query = "" , $params = [])
    {
        try {
            $connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();
            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    public function selectDupe($query = "" , $params = [])
    {
        try {
            $connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            if($stmt = mysqli_prepare($connection, $query)){
                mysqli_stmt_bind_param($stmt, "s", $params[1]);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 0){ //username not taken
                        echo "presumably not in database\n";
                        $stmt = $this->executeStatement( $query , $params );
                        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
                        $stmt->close();
                        return $result;
                        return "num_rows==0";
                    }
                    else{
                        // echo "so huh?";
                        return "username is taken";
                    }
                }}  
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }
    
    public function selectDupeAdd($query = "" , $params = [])

    {
        try {
            $connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            if($stmt = mysqli_prepare($connection, $query)){
                mysqli_stmt_bind_param($stmt, "sss", $params[1], $params[2], $params[3]);
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);
                    if(mysqli_stmt_num_rows($stmt) == 0){ //song not already exists
                        echo "presumably not in database\n";
                        $stmt = $this->executeStatement( $query , $params );
                        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
                        $stmt->close();
                        return $result;
                        return "num_rows==0";
                    }
                    else{
                        echo "already taken?";
                        return "already submitted song";
                    }
                }}  
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }
        return false;
    }

    public function create($query = "" , $params = [])

    {
        try {
            // echo "ooga";
            // echo $params[1];
            $stmt = $this->executeStatement( $query , $params );
            $result = $stmt->get_result();				
            $stmt->close();
            echo "we did it!";  
            return $result;
        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }

        return false;

    }

    public function logout($sql, $params =[]){

        // $stmt = $this->connection->prepare( $query );
            // Bind the parameter and execute the statement.
            $stmt=$this->executeStatement($sql, $params);
            // Get the result and fetch the data.
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            if (!$row) {
                echo "Username doesn't exist :/";
            } else {
                // if (password_verify($password, $row['password'])) {
                    $this->editSong("UPDATE users SET loggedin = 0 WHERE username = ?", $params);
                    // session_destroy();
                    // echo('PHPSESSID: ' . session_id($_GET['session_id']));
                    // $_SESSION['username'] = $username;
                    // $_SESSION["loggedin"] = true;
                    echo ("we outta here");
                    return "POGGERS";
                // } else {
                    // $error = "Passwords do not match :/";
                    // echo $error;
                // }
            }
            // Close the prepared statement.
            $stmt->close();
        // Close SQL connection.
    }

    public function userLogin($username, $password){
        // Bind the parameter and execute the statement.
        $stmt=$this->executeStatement("SELECT * FROM users WHERE username = ?", ["s", $username]);
        // Get the result and fetch the data.
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        if (!$row) {
            echo "Username doesn't exist :/";
        } else {
            if (password_verify($password, $row['password'])) {
                $this->editSong("UPDATE users SET loggedin = 1 WHERE username = ?", ["s", $username]);
                session_start();
                // echo('PHPSESSID: ' . session_id($_GET['session_id']));
                $_SESSION['username'] = $username;
                $_SESSION["loggedin"] = true;
                // echo "\n";
                // echo $_SESSION['username'];
                echo ("we on top");
                return "POGGERS";
            } else {
                $error = "Passwords do not match :/";
                echo $error;
            }
        }
        // Close the prepared statement.
        $stmt->close();
    // Close SQL connection.
}

public function emailLogin($email, $password){
    // Create a prepared statement to select data using parameters.
    // Bind the parameter and execute the statement.
    $stmt=$this->executeStatement("SELECT * FROM users WHERE email = ?", ["s", $email]);
    // Get the result and fetch the data.
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    if (!$row) {
        echo "Email doesn't exist :/";
    } else {
        if (password_verify($password, $row['password'])) {
            $this->editSong("UPDATE users SET loggedin = 1 WHERE email = ?", ["s", $email]);
            session_start();
            // echo('PHPSESSID: ' . session_id($_GET['session_id']));
            $_SESSION['username'] = $row['username'];
            $_SESSION["loggedin"] = true;
            echo ("we logged in cuh");
            return "POGGERS";
        } else {
            $error = "Passwords do not match :/";
            echo $error;
        }
    }
    // Close the prepared statement.
    $stmt->close();
// Close SQL connection.
$connection->close();
}


    // This functions ships the data to SQL and therefore deletes an entry in the database!
    public function delete($sql, $params = [])
    {

        try {
            $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param(...$params);
            mysqli_stmt_execute($stmt);
        		
            echo "success";
            $stmt->close();
            // return $result;
        } catch(Exception $e) {
            
            throw New Exception( $e->getMessage() );

        }

        return false;

    }

    public function editUser($username, $field, $info){
        
        try {
            if ($field == "points"){
                $stmt=$this->executeStatement("SELECT * FROM users WHERE username = ?", ["s", $username]);
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $points = $row['points'];
                $points = $points+$info;
                // $row = $result->fetch_assoc();
                $this->editSong("UPDATE users SET points = ? WHERE username = ?", ["is", $points, $username]);
            }
            if ($field == "classes"){
                $stmt=$this->executeStatement("SELECT * FROM users WHERE username = ?", ["s", $username]);
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $classes = $row['classes'];
                $classes = $classes. ", ". $info;
                $this->editSong("UPDATE users SET classes = ? WHERE username = ?", ["ss", $classes, $username]);
            }
            // OMG THIS WORKED BRUH
            
            // echo("fart ass");
            // echo ($params[0]);
            // echo ($params[1]);
            // echo ($params[2]);
            // echo("fart ass");
               // if ($field == "points"){
            //     $userModel->editUmodel("UPDATE users SET points = ? WHERE username = ?", ["is", $_GET['points'], $username]);
            // }
            // if ($field == "classes"){
            //     $userModel->editUmodel("UPDATE users SET classes = ? WHERE username = ?", ["ss", $_GET['classes'], $username]);
            // }


            // $stmt=$this->executeStatement($sql, $params);
            
            echo "success";
            $stmt->close();
        
              
            if ( mysqli_connect_errno()) {

                throw new Exception("Could not connect to database.");   

            }

        } catch (Exception $e) {

            throw new Exception($e->getMessage());   

        }
    
    }

    // This functions ships the data to SQL and therefore writes to the database!
        public function editSong($sql, $params = []){
        try {
            // OMG THIS WORKED BRUH
            
            echo("fart ass");
            echo ($params[0]);
            echo ($params[1]);
            echo ($params[2]);
            echo("fart ass");


            $stmt=$this->executeStatement($sql, $params);
            
            echo "success";
            $stmt->close();
            // $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);
            // ask about these parameters and if they need to be grabbed like this here. They might not due to other components.
            
            //   $sql = "UPDATE ratings SET artist=?, song=?, rating=? WHERE id=?";      
                //else update that row with a parameterized query.
              echo "made it to database";
            //   echo $sql;
            //   echo $connection;
            //   echo $params[0];
            //   echo $params[1];
            //   echo $params[2];
            //   echo $params[3];

            // lowkey why do i have an if here lmao
            //$stmt == mysqli_prepare($connection, $sql)
            //if ($stmt == mysqli_prepare($connection, $sql)){
                //$stmt = mysqli_prepare($connection, $sql);
                //can't comment this out because then $stmt doesn't exit homie >_>
                    echo "yee haw, in if :)";
                 // $stmt->bind_param(...$params);
                  echo "made it past first if";
                //   if(mysqli_stmt_execute($stmt)){
                //       header("location: reviewboard.php");
                //       echo "made it past second if";
                //   } else{
                //       echo "Uh oh, it seems there was a failure, Please debug me";
                //   }
        //    }
        //  ^^ for first if   
             echo "missed if, oof!";
            //   mysqli_stmt_close($stmt);
              
            if ( mysqli_connect_errno()) {

                throw new Exception("Could not connect to database.");   

            }

        } catch (Exception $e) {

            throw new Exception($e->getMessage());   

        }
    
    }

    private function executeStatement($query = "" , $params = [])

    {
        try {
            $stmt = $this->connection->prepare( $query );
            if($stmt === false) {
                throw New Exception("Unable to do prepared statement: " . $query);
            }

            if( $params ) {
                $stmt->bind_param(...$params);
            }

            $stmt->execute();
            return $stmt;

        } catch(Exception $e) {
            throw New Exception( $e->getMessage() );
        }	

    }

    private function addRecord($query = "", $params = [], $username, $song, $artist, $rating){
        // INSERT INTO ratings ()
        // VALUES (@_DE, @_ASSUNTO, @_DATA)
        // WHERE NOT EXISTS ( SELECT * FROM EmailsRecebidos 
        //                 WHERE De = @_DE
        //                 AND Assunto = @_ASSUNTO
        //                 AND Data = @_DATA);
    }

}
