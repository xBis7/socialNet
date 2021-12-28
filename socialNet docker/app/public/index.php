<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet"/>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
</head>
<body>
<div class="ui container">

<div class="ui header">
    <h1>SocialNet</h1>

    <div class="ui menu" style="background-color:rgb(228, 248, 255)">
        <div class="ui simple dropdown link item">
            New Entry    
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" id="newUserNav">User</a>
                <a class="item" id="newCityNav">City</a>
                <a class="item" id="newPoiNav">POI</a>
            </div>
        </div>
        <div class="ui simple dropdown link item">
            Search
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" id="getUserNav">User</a>
                <a class="item" id="getCityNav">City</a>
                <a class="item" id="getPoiNav">POI</a>
            </div>
        </div>
        <div class="ui simple dropdown link item">
            Delete
            <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" id="deleteUserNav">User</a>
                <a class="item" id="deleteCityNav">City</a>
                <a class="item" id="deletePoiNav">POI</a>
            </div>
        </div>
    </div>

</div>

<div class="ui main text container">

    <div id="noSelection">
        <p>
            Choose one of the navigation menu options to execute a query to the database.
            <br/>
            You can make a new entry or search-delete an existing one.
        </p>
    </div>

    <div class="ui form" id="user-form" style="display: none;">
        <h2>Enter new user</h2>
        <form id="userForm" method="post">
            <label for="name">Name</label><br/>
            <input type="text" name="name" id="name" placeholder="name..." required><br/><br/>

            <label for="lastName">LastName</label><br/>
            <input type="text" name="lastName" id="lastName" placeholder="last name..." required><br/><br/>
            
            <label for="gender">Gender</label><br/>
            <input type="text" name="gender" id="gender" placeholder="gender..." required><br/><br/>
            
            <label for="dateOfBirth">DateOfBirth</label><br/>
            <input type="text" name="dateOfBirth" id="dateOfBirth" placeholder="date of birth..." required><br/><br/>
            
            <label for="friendsNum">Number of friends</label><br/>
            <input type="text" name="friendsNum" id="friendsNum" placeholder="number of friends..." required><br/><br/>
            
            <label for="followersNum">Number of followers</label><br/>
            <input type="text" name="followersNum" id="followersNum" placeholder="number of followers..." required><br/><br/>
            
            <button class="ui button" type="submit" name="submitUser">Submit User</button>
        </form>
    </div>

    <div class="ui form" id="city-form" style="display: none;">
        <h2>Enter new city</h2>
        <form id="cityForm" method="post">
            <label for="nameCity">Name</label><br/>
            <input type="text" name="nameCity" id="nameCity" placeholder="city..." required><br/><br/>

            <label for="state">State</label><br/>
            <input type="text" name="state" id="state" placeholder="state..." required><br/><br/>
            
            <label for="country">Country</label><br/>
            <input type="text" name="country" id="country" placeholder="country..." required><br/><br/>
            
            <label for="longitudeCity">Longitude</label><br/>
            <input type="text" name="longitudeCity" id="longitudeCity" placeholder="longitude..." required><br/><br/>
            
            <label for="latitudeCity">Latitude</label><br/>
            <input type="text" name="latitudeCity" id="latitudeCity" placeholder="latitude..." required><br/><br/>
            
            <button class="ui button" type="submit" name="submitCity" id="submitCity">Submit City</button>
        </form>
    </div>

    <div class="ui form" id="poi-form" style="display: none;">
        <h2>Enter new POI</h2>
        <form id="poiForm" method="post">
            <label for="category">Category</label><br/>
            <input type="text" name="category" id="category" placeholder="category..." required><br/><br/>

            <label for="longitudePOI">Longitude</label><br/>
            <input type="text" name="longitudePOI" id="longitudePOI" placeholder="longitude..." required><br/><br/>
            
            <label for="latitudePOI">Latitude</label><br/>
            <input type="text" name="latitudePOI" id="latitudePOI" placeholder="latitude..." required><br/><br/>
            
            <button class="ui button" type="submit" name="submitPOI" id="submitPOI">Submit POI</button>
        </form>
    </div>

    <div class="ui form" id="get-user-form" style="display:none">
        <h2>Search user</h2>
        <form id="getUserForm" method="post">
            <label for="getUserId">Enter user ID</label><br/>
            <input type="text" name="getUserId" id="getUserId" placeholder="enter ID..." required><br/><br/>

            <button class="ui button" type="submit" name="getUser" id="getUser">Get User</button>
        </form>
    </div>

    <div class="ui form" id="get-city-form" style="display:none">
        <h2>Search city</h2>
        <form id="getCityForm" method="post">
            <label for="getCityId">Enter city ID</label><br/>
            <input type="text" name="getCityId" id="getCityId" placeholder="enter ID..." required><br/><br/>

            <button class="ui button" type="submit" name="getCity" id="getCity">Get City</button>
        </form>
    </div>

    <div class="ui form" id="get-poi-form" style="display:none">
        <h2>Search POI</h2>
        <form id="getPOIForm" method="post">
            <label for="getPOIId">Enter POI ID</label><br/>
            <input type="text" name="getPOIId" id="getPOIId" placeholder="enter ID..." required><br/><br/>

            <button class="ui button" type="submit" name="getPOI" id="getPOI">Get POI</button>
        </form>
    </div>

    <div class="ui form" id="delete-user-form" style="display:none">
        <h2>Delete user</h2>
        <form id="deleteUserForm" method="post">
            <label for="deleteUserId">Enter user ID</label><br/>
            <input type="text" name="deleteUserId" id="deleteUserId" placeholder="enter ID..." required><br/><br/>

            <button class="ui button" type="submit" name="deleteUser" id="deleteUser">Delete User</button>
        </form>
    </div>

    <div class="ui form" id="delete-city-form" style="display:none">
        <h2>Delete city</h2>
        <form id="deleteCityForm" method="post">
            <label for="deleteCityId">Enter city ID</label><br/>
            <input type="text" name="deleteCityId" id="deleteCityId" placeholder="enter ID..." required><br/><br/>

            <button class="ui button" type="submit" name="deleteCity" id="deleteCity">Delete City</button>
        </form>
    </div>

    <div class="ui form" id="delete-poi-form" style="display:none">
        <h2>Delete POI</h2>
        <form id="deletePOIForm" method="post">
            <label for="deletePOIId">Enter POI ID</label><br/>
            <input type="text" name="deletePOIId" id="deletePOIId" placeholder="enter ID..." required><br/><br/>

            <button class="ui button" type="submit" name="deletePOI" id="deletePOI">Delete POI</button>
        </form>
    </div>

    <div id="searchResult" style="display:none">
        search result: 
    </div>


    <script>
        
        $(document).ready(function(){
            //new entry
            $('#newUserNav').click(function(){
                $('#user-form').show();
                $('#city-form').hide();
                $('#poi-form').hide();

                $('#get-user-form').hide();
                $('#get-city-form').hide();
                $('#get-poi-form').hide();

                $('#delete-user-form').hide();
                $('#delete-city-form').hide();
                $('#delete-poi-form').hide();

                $('#noSelection').hide();
                $('#searchResult').hide();
            });

            $('#newCityNav').click(function(){
                $('#city-form').show();
                $('#user-form').hide();
                $('#poi-form').hide();

                $('#get-user-form').hide();
                $('#get-city-form').hide();
                $('#get-poi-form').hide();

                $('#delete-user-form').hide();
                $('#delete-city-form').hide();
                $('#delete-poi-form').hide();

                $('#noSelection').hide();
                $('#searchResult').hide();
            });

            $('#newPoiNav').click(function(){
                $('#poi-form').show();
                $('#user-form').hide();
                $('#city-form').hide();

                $('#get-user-form').hide();
                $('#get-city-form').hide();
                $('#get-poi-form').hide();

                $('#delete-user-form').hide();
                $('#delete-city-form').hide();
                $('#delete-poi-form').hide();

                $('#noSelection').hide();
                $('#searchResult').hide();
            });

            //search
            $('#getUserNav').click(function(){              
                $('#user-form').hide();
                $('#city-form').hide();
                $('#poi-form').hide();

                $('#get-user-form').show();
                $('#get-city-form').hide();
                $('#get-poi-form').hide();

                $('#delete-user-form').hide();
                $('#delete-city-form').hide();
                $('#delete-poi-form').hide();

                $('#noSelection').hide();
                $('#searchResult').hide();
            });

            $('#getCityNav').click(function(){              
                $('#user-form').hide();
                $('#city-form').hide();
                $('#poi-form').hide();

                $('#get-user-form').hide();
                $('#get-city-form').show();
                $('#get-poi-form').hide();

                $('#delete-user-form').hide();
                $('#delete-city-form').hide();
                $('#delete-poi-form').hide();

                $('#noSelection').hide();
                $('#searchResult').hide();
            });

            $('#getPoiNav').click(function(){              
                $('#user-form').hide();
                $('#city-form').hide();
                $('#poi-form').hide();

                $('#get-user-form').hide();
                $('#get-city-form').hide();
                $('#get-poi-form').show();

                $('#delete-user-form').hide();
                $('#delete-city-form').hide();
                $('#delete-poi-form').hide();

                $('#noSelection').hide();
                $('#searchResult').hide();
            });

            //delete
            $('#deleteUserNav').click(function(){              
                $('#user-form').hide();
                $('#city-form').hide();
                $('#poi-form').hide();

                $('#get-user-form').hide();
                $('#get-city-form').hide();
                $('#get-poi-form').hide();

                $('#delete-user-form').show();
                $('#delete-city-form').hide();
                $('#delete-poi-form').hide();

                $('#noSelection').hide();
                $('#searchResult').hide();
            });

            $('#deleteCityNav').click(function(){              
                $('#user-form').hide();
                $('#city-form').hide();
                $('#poi-form').hide();

                $('#get-user-form').hide();
                $('#get-city-form').hide();
                $('#get-poi-form').hide();

                $('#delete-user-form').hide();
                $('#delete-city-form').show();
                $('#delete-poi-form').hide();

                $('#noSelection').hide();
                $('#searchResult').hide();
            });

            $('#deletePoiNav').click(function(){              
                $('#user-form').hide();
                $('#city-form').hide();
                $('#poi-form').hide();

                $('#get-user-form').hide();
                $('#get-city-form').hide();
                $('#get-poi-form').hide();

                $('#delete-user-form').hide();
                $('#delete-city-form').hide();
                $('#delete-poi-form').show();

                $('#noSelection').hide();
                $('#searchResult').hide();
            });

            $('#userForm').submit(function() {

                var nameUser = $('input[name="name"]').val();
                var lastNameUser = $('input[name="lastName"]').val();
                var genderUser = $('input[name="gender"]').val();
                var dateOfBirthUser = $('input[name="dateOfBirth"]').val();
                var friendsNumUser = $('input[name="friendsNum"]').val();
                var followersNumUser = $('input[name="followersNum"]').val();

                $.ajax({
                    type: 'post',
                    url: 'dbHandler.php',   
                    async: false,
                    cache: false,
                    timeout: 5000,
                    dataType: 'json',
                    data: {
                        'submitButton' : "submitUser",
                        'name' : nameUser,
                        'lastName' : lastNameUser, 
                        'gender' : genderUser,
                        'dateOfBirth' : dateOfBirthUser,
                        'friendsNum' : friendsNumUser,
                        'followersNum' : followersNumUser
                    }
                }).done(function(response) {
                    var jsonData = JSON.stringify(response);
                    alert("successful user entry\n" + jsonData);
                }).fail(function() {
                    alert("database submit failure");
                });
            });

            $('#cityForm').submit(function() {

                var nameCity = $('input[name="nameCity"]').val();
                var stateCity = $('input[name="state"]').val();
                var countryCity = $('input[name="country"]').val();
                var longitudeCity = $('input[name="longitudeCity"]').val();
                var latitudeCity = $('input[name="latitudeCity"]').val();

                $.ajax({
                    type: 'post',
                    url: 'dbHandler.php',   
                    async: false,
                    cache: false,
                    timeout: 5000,
                    dataType: 'json',
                    data: {
                        'submitButton' : "submitCity",
                        'name' : nameCity,
                        'state' : stateCity, 
                        'country' : countryCity,
                        'longitude' : longitudeCity,
                        'latitude' : latitudeCity
                    }
                }).done(function(response) {
                    var jsonData = JSON.stringify(response);
                    alert("successful city entry\n" + jsonData);
                }).fail(function() {
                    alert("database submit failure");
                });

            });

            $('#poiForm').submit(function() {

                var categoryPOI = $('input[name="category"]').val();
                var longitudePOI = $('input[name="longitudePOI"]').val();
                var latitudePOI = $('input[name="latitudePOI"]').val();

                $.ajax({
                    type: 'post',
                    url: 'dbHandler.php', 
                    async: false,
                    cache: false,
                    timeout: 5000,
                    dataType: 'json',
                    data: {
                        'submitButton' : 'submitPOI',
                        'category' : categoryPOI,
                        'longitude' : longitudePOI,
                        'latitude' : latitudePOI 
                    }
                }).done(function(response) {
                    var jsonData = JSON.stringify(response);
                    alert("successful POI entry\n" + jsonData);
                }).fail(function() {
                    alert("database submit failure");
                });

            });

            $('#getUserForm').submit(function() {

                var idUser = $('input[name="getUserId"]').val();

                $.ajax({
                    type: 'post',
                    url: 'dbHandler.php',
                    async: false,
                    cache: false,
                    timeout: 5000,
                    dataType: 'json',
                    data: {
                        'submitButton' : 'getUser',
                        'id' : idUser
                    }
                }).done(function(response) {
                    
                    $('#searchResult').show();
                    
                    if(response.name != null){
                        //db is case insensitive, everything gets stored in lowercase
                        //we need to use the name of the database or the value will be undefined
                        $('#searchResult').html("<br/><br/>name: " + response.name + "<br/><br/>lastName: " + response.lastname + "<br/><br/>gender: " + response.gender + "<br/><br/>Date of Birth: " + response.dateofbirth + "<br/><br/>friends: " + response.friendsnum + "<br/><br/>followers: " + response.followersnum); 
                    }
                    else{
                        $('#searchResult').html("<br/><br/>User with ID " + idUser + " doesn't exist");
                    }

                }).fail(function() {
                    alert("database fetch failure");
                });

                return false;
            });

            $('#getCityForm').submit(function() {

                var idCity = $('input[name="getCityId"]').val();

                $.ajax({
                    type: 'post',
                    url: 'dbHandler.php',
                    async: false,
                    cache: false,
                    timeout: 5000,
                    dataType: 'json',
                    data: {
                        'submitButton' : 'getCity',
                        'id' : idCity
                    }
                }).done(function(response) {
                    
                    $('#searchResult').show();

                    if(response.name != null){
                        $('#searchResult').html("<br/><br/>name: " + response.name + "<br/><br/>state: " + response.state + "<br/><br/>country: " + response.country + "<br/><br/>longitude: " + response.longitude + "<br/><br/>latitude: " + response.latitude);
                    }
                    else{
                        $('#searchResult').html("<br/><br/>City with ID " + idCity + " doesn't exist");
                    }

                }).fail(function() {
                    alert("database fetch failure");
                });

                return false;
            });

            $('#getPOIForm').submit(function() {

                var idPOI = $('input[name="getPOIId"]').val();

                $.ajax({
                    type: 'post',
                    url: 'dbHandler.php',
                    async: false,
                    cache: false,
                    timeout: 5000,
                    dataType: 'json',
                    data: {
                        'submitButton' : 'getPOI',
                        'id' : idPOI
                    }
                }).done(function(response) {
                    
                    $('#searchResult').show();
                    
                    if(response.category != null){
                        $('#searchResult').html("<br/><br/>category: " + response.category + "<br/><br/>longitude: " + response.longitude + "<br/><br/>latitude: " + response.latitude);
                    }
                    else{
                        $('#searchResult').html("<br/><br/>POI with ID " + idPOI + " doesn't exist");
                    }

                }).fail(function() {
                    alert("database fetch failure");
                });

                return false;
            });

            $('#deleteUserForm').submit(function() {

                var idUser = $('input[name="deleteUserId"]').val();

                $.ajax({
                    type: 'post',
                    url: 'dbHandler.php',
                    async: false,
                    cache: false,
                    timeout: 5000,
                    dataType: 'json',
                    data: {
                        'submitButton' : 'deleteUser',
                        'id' : idUser
                    }
                }).done(function(response) {
                    var jsonData = JSON.stringify(response);
                    alert("successful deletion of user with " + jsonData);
                }).fail(function() {
                    alert("database delete failure");
                });
            });

            $('#deleteCityForm').submit(function() {

                var idCity = $('input[name="deleteCityId"]').val();

                $.ajax({
                    type: 'post',
                    url: 'dbHandler.php',
                    async: false,
                    cache: false,
                    timeout: 5000,
                    dataType: 'json',
                    data: {
                        'submitButton' : 'deleteCity',
                        'id' : idCity
                    }
                }).done(function(response) {
                    var jsonData = JSON.stringify(response);
                    alert("successful deletion of city with " + jsonData);
                }).fail(function() {
                    alert("database delete failure");
                });
            });

            $('#deletePOIForm').submit(function() {

                var idPOI = $('input[name="deletePOIId"]').val();

                $.ajax({
                    type: 'post',
                    url: 'dbHandler.php',
                    async: false,
                    cache: false,
                    timeout: 5000,
                    dataType: 'json',
                    data: {
                        'submitButton' : 'deletePOI',
                        'id' : idPOI
                    }
                }).done(function(response) {
                    var jsonData = JSON.stringify(response);
                    alert("successful deletion of POI with " + jsonData);
                }).fail(function() {
                    alert("database delete failure");
                });
            });

        });

    </script>

</div>

<div class="ui inverted vertical footer segment">
    <p>Copyright xbis.All Rights Reserved.</p>
</div>

</div>
</body>
</html>


