<!DOCTYPE html>
<html lang="en">
<?php
include("connection/database.php");
error_reporting(0);
session_start();


if(empty($_SESSION["adm_id"]))
{
	header('location:login.php');
}
else
{
    header('location:dashboard.php');
}

    ?>