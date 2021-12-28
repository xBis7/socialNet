<?php

    //docker inspect -f '{{.Name}} - {{range .NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $(docker ps -aq)
    //to find ip address of docker container 

    $dbuser= 'postgres';
    $dbpass= 'postgres';
    $host= 'socialnetdocker_postgres_1';     //or IP address, everytime we start docker it assigns different IP
    $dbname= 'socialNet';
    $port='5432';
    
    try{
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

        $pdo = new PDO($dsn, $dbuser, $dbpass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        if(!$pdo){
            die("Database connection failed.");
        }
        
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    if(isset($_POST['submitButton'])){
        $submitButton = $_POST['submitButton'];
    }
    else{
        $submitButton = null;
    }

    if($submitButton == 'submitUser'){
        $name= $_POST['name'];
        $lastName= $_POST['lastName'];
        $gender= $_POST['gender'];
        $dateOfBirth= $_POST['dateOfBirth'];
        $friendsNum= $_POST['friendsNum'];
        $followersNum= $_POST['followersNum'];

        insertUser($name, $lastName, $gender, $dateOfBirth, $friendsNum, $followersNum, $pdo);

        $response = ['name' => $name, 'lastName' => $lastName, 'gender' => $gender, 'date of birth' => $dateOfBirth, 'number of friends' => $friendsNum, 'number of followers' => $followersNum];
        
        header( 'Content-Type: application/json' );
        echo json_encode($response);
    } 
    else if($submitButton == 'submitCity') {
        $name= $_POST['name'];
        $state= $_POST['state'];
        $country= $_POST['country'];
        $longitude= $_POST['longitude'];
        $latitude= $_POST['latitude'];

        insertCity($name, $state, $country, $longitude, $latitude, $pdo);

        $response = ['city name' => $name, 'state' => $state, 'country' => $country, 'longitude' => $longitude, 'latitude' => $latitude];
        
        header( 'Content-Type: application/json' );
        echo json_encode($response);
    }
    else if($submitButton == 'submitPOI') {
        $category= $_POST['category'];
        $longitude= $_POST['longitude'];
        $latitude= $_POST['latitude'];
        
        insertPOI($category, $longitude, $latitude, $pdo);

        $response = ['category' => $category, 'longitude' => $longitude, 'latitude' => $latitude];
        
        header( 'Content-Type: application/json' );
        echo json_encode($response);
    }
    else if($submitButton == 'deleteUser'){

        $id = 0;

        if(isset($_POST['id']) && is_numeric($_POST['id']) ){
            $id = $_POST['id'];
        }

        deleteUser($id, $pdo);

        $response = ['id' => $id];
        
        header( 'Content-Type: application/json' );
        echo json_encode($response);
    }
    else if($submitButton == 'deleteCity'){
        
        $id = 0;

        if(isset($_POST['id']) && is_numeric($_POST['id']) ){
            $id = $_POST['id'];
        }

        deleteCity($id, $pdo);

        $response = ['id' => $id];
        
        header( 'Content-Type: application/json' );
        echo json_encode($response);
    }
    else if($submitButton == 'deletePOI'){
        
        $id = 0;

        if(isset($_POST['id']) && is_numeric($_POST['id']) ){
            $id = $_POST['id'];
        }

        deletePOI($id, $pdo);

        $response = ['id' => $id];
        
        header( 'Content-Type: application/json' );
        echo json_encode($response);
    }
    else if($submitButton == 'getUser'){

        $id = 0;

        if(isset($_POST['id']) && is_numeric($_POST['id'])){
            $id = $_POST['id'];
        }

        $user = getUser($id, $pdo);

        header( 'Content-Type: application/json' );
        echo json_encode($user);
    }
    else if($submitButton == 'getCity'){
        
        $id = 0;

        if(isset($_POST['id']) && is_numeric($_POST['id'])){
            $id = $_POST['id'];
        }

        $city = getCity($id, $pdo);

        header( 'Content-Type: application/json' );
        echo json_encode($city);
    }
    else if($submitButton == 'getPOI'){
       
        $id = 0;

        if(isset($_POST['id']) && is_numeric($_POST['id'])){
            $id = $_POST['id'];
        }

        $poi = getPOI($id, $pdo);

        header( 'Content-Type: application/json' );
        echo json_encode($poi);
    }
    else{
        exit('error, no request has been made...');
    }

    //make new entry
    function insertUser($name, $lastName, $gender, $dateOfBirth, $friendsNum, $followersNum, $pdo){
        try{
            $sql = "INSERT INTO users(name, lastName, gender, dateOfBirth, friendsNum, followersNum) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $lastName, $gender, $dateOfBirth, $friendsNum, $followersNum]);
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    function insertCity($name, $state, $country, $longitude, $latitude, $pdo){
        try{
            $sql = "INSERT INTO cities(name, state, country, longitude, latitude) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name, $state, $country, $longitude, $latitude]);
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    function insertPOI($category, $longitude, $latitude, $pdo){
        try{
            $sql = "INSERT INTO pois(category, longitude, latitude) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$category, $longitude, $latitude]);
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    //delete entry
    function deleteUser($id, $pdo) {
        try {
            $sql = 'DELETE FROM users WHERE id= :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    function deleteCity($id, $pdo) {
        try {
            $sql = 'DELETE FROM cities WHERE id= :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    function deletePOI($id, $pdo) {
        try {
            $sql = 'DELETE FROM pois WHERE id= :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $id);

            $stmt->execute();
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    //get entry
    function getUser($id, $pdo) {
        try {
            $sql = "SELECT * FROM users WHERE id= :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    function getCity($id, $pdo) {
        try {
            $sql = "SELECT * FROM cities WHERE id= :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    function getPOI($id, $pdo) {
        try {
            $sql = "SELECT * FROM pois WHERE id= :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    //get all entries
    function getAllUsers($pdo) {
        try{
            $sql = "SELECT * FROM users";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
    
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    function getAllCities($pdo) {
        try{
            $sql = "SELECT * FROM cities";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
    
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

    function getAllPOIS($pdo) {
        try{
            $sql = "SELECT * FROM pois";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
    
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
            
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }

?>