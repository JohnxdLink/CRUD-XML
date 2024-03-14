<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['save_json'])) {
      // Load XML file
      $file = simplexml_load_file('../files/members.xml');

      // Convert XML to JSON
      $json_data = json_encode($file, JSON_PRETTY_PRINT);

      // Save JSON data to file
      file_put_contents('../json/js-members.json', $json_data);

      // Redirect back to index.php
      $_SESSION['message'] = 'Members file successfully save as JSON.';
      header("Location: ../index.php");
      exit();
   } elseif (isset($_POST['delete_json'])) {
      // File path to the JSON file
      $json_file = '../json/js-members.json';

      // Check if the JSON file exists
      if (file_exists($json_file)) {
         // Delete the JSON file
         unlink($json_file);
         // Redirect back to index.php
         $_SESSION['message'] = 'JSON file deleted.';
         header("Location: ../index.php");
         exit();
      } else {
         // JSON file doesn't exist, redirect back to index.php with a message
         $_SESSION['message'] = 'JSON file does not exist.';
         header("Location: ../index.php");
         exit();
      }
   }
}
