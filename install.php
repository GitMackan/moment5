<?php

include('includes/config.php');

// Anslut till databas
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
if($db->connect_errno > 0) {
    die("Fel vid anslutning: " . $db->connect_error);
}
// Skapa/Återställ databaser
$sql = "DROP TABLE IF EXISTS courses;";
$sql .= "
CREATE TABLE courses(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(24),
    name VARCHAR(128) NOT NULL,
    prog VARCHAR(24) NOT NULL,
    syllabus VARCHAR(128) NOT NULL,
    postdate timestamp NOT NULL DEFAULT current_timestamp()
);";

$sql .= "
    INSERT INTO courses(code,name,prog,syllabus) VALUES ('testkurs', 'testnamn', 'A', 'link');
";

echo "<pre>$sql</pre>";

if ($db->multi_query($sql)) {
    echo "<p>Korrekt uppladdning!</p>";
} else {
    echo "<p>Fel vid uppladdning</p>";
}