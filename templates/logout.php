<?php
session_start(); //same as all files written at top
session_destroy(); //delete session array so user login gets removed
header("Location: index.php"); //redirect to homepage with log in option