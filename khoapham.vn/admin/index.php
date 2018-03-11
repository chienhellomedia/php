<?php
ob_start();
session_start();
if (!isset($_SESSION['idUser']) or $_SESSION['idGroup'] != 1) {
    header("location: ../index.php");
}
require '../lib/dbCon.php';
require '../lib/quantri.php';
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Title Page</title>		
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="layout.css">
        <style type="text/css" media="screen">
            .tieude a{
                background-color: green; color: white; padding: 10px;
                font-size: 20px; font-weight: bold;

            }
        </style>
    </head>  
    <body>
        <div class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>TRANG QUAN TRI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="tieude"><?php require 'menu.php'; ?></td>
                    </tr>
                </tbody>
            </table>
        </div> 

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" ></script>	 		
    </body>
</html>