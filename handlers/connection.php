<?php
try {
    $conn = new PDO("mysql:host=127.0.0.1;dbname=course_allocation", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
  } catch(PDOException $e) {
    // echo "Connection failed: " . $e->getMessage();
  }
  ?>