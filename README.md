# socialNet
A single page website in HTML and jQuery AJAX with php in the back for communicating with a PostgreSQL database, running in NGINX server. <br>The environment is set in Docker. To test the website all you have to do is 
<li> clone the repo </li>
<li> download Docker Desktop </li>
<li> open a terminal or cmd </li>
<li> navigate to the repo directory </li>
<li> run $docker-compose build </li>
<li> run $docker-compose up </li>
<li> open a browser and go to url 127.0.0.1 </li>

<br>and you are ready. 
<br>No need for setting up php, postgreSQL or nginx server in your computer. Docker compose file will take care of all of that. 
<br>In case you need to make changes to the database or run a different script, first run in the terminal <br>$docker-compose rm -fv
<br>and then delete the postgres-data directory, before building and running the project. Otherwise, docker will keep the old volumes and skip running the script.
