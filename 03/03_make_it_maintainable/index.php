<?php
// required to correctly start display of page due to starting <html>
require 'header.php';
// require_once to avoid multiple connections
require_once 'connect.php';
// include list.php so that the page still functions if file not found
include 'list.php';
// required to correctly end display of page due to ending header.php <html>
require 'footer.php';
