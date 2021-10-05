<?php
include("includes/config.php");

$c = new Course();

$c->updateCourse('3', 'Testkod2', 'Testnamn2', 'B', 'Testsyllabus2');

echo "<pre>";
var_dump($c->getCourses());
echo "</pre>";