<?php
session_start();
echo $_SESSION['username'] . " " . $_SESSION['password'];