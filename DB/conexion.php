<?php

     $serverName = "LAPTOP-6OAKV39R\SQLSERVER2, 1433";
     $connectionInfo = array( "Database"=>"DB_Planilla");
     $conn = sqlsrv_connect( $serverName, $connectionInfo);
     
     if(!$conn ) {
          echo "Connection could not be established.<br />";
          die( print_r( sqlsrv_errors(), true));
     }

     session_start();