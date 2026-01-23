<?php
// required to correctly start display of page due to starting <html>
require 'includes/header.php';
// require_once to avoid multiple connections
require_once 'includes/connect.php';
// include list.php so that the page still functions if file not found
include 'includes/list.php';
// required to correctly end display of page due to ending header.php <html>
require 'includes/footer.php';

/* 
One thing I learned from this lab that I will apply in Course Project Phase One: 
    I learned that I can break up HTML markup into individual .php files and call them to structure a webpage more succinctly and neatly. I like being able to do this becuase one of my favorite CSS features is being able to stack stylesheets on top of the other like building blocks inside of <head>, which this strategy is pretty similar to. Not only will I make use of this in the Course Project, but I will probably use this strategy consistently when building future sites for other projects.
*/
