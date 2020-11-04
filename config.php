<?php
session_start();
echo "<div class='alert alert-success'>".$_SESSION['user_var']."</div>";
$cluster   = Cassandra::cluster()                 // connects to localhost by default
                   ->withCredentials($_SESSION['user_var'], "admin")
                   ->build();
$keyspace  = 'hddatabase';
$session   = $cluster->connect($keyspace);
$_SESSION['valid'] = true;
$_SESSION['success'] = "login successful";

/*$cluster   = Cassandra::cluster()                 // connects to localhost by default
                 ->withCredentials("admin", "admin")
                 ->build();
$keyspace  = 'hddatabase';
$session   = $cluster->connect($keyspace);        // create session, optionally scoped to a keyspace*/

/*$statement = new Cassandra\SimpleStatement(       // also supports prepared and batch statements
    'SELECT * FROM books'
);
$future    = $session->executeAsync($statement);  // fully asynchronous and easy parallel execution
$result    = $session->execute("SELECT * FROM books");                      // wait for the result, with an optional timeout

foreach ($result as $row) {                       // results and rows implement Iterator, Countable and ArrayAccess
    echo $row['id'] . " : ".$row['name']. " : ".$row['detail']. PHP_EOL;
    printf("The keyspace %s has a table called %s\n", $row['name'], $row['detail']);
}
LISTA DE COMANDOS PARA LA CREACION:
CREATE KEYSPACE hddatabase WITH replication = {'class': 'SimpleStrategy','replication_factor':1};
USE hddatabase;
CREATE TABLE books (id int, name text, detail text, PRIMARY KEY (id));
INSERT INTO books (id, name, detail) VALUES (1,'laravel','test');
SELECT * FROM books;*/
?>
