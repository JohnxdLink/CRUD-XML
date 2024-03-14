<?php
session_start();

// Function to validate user credentials
function validateUser($username, $password)
{
   // Load JSON file for admin credentials
   $admin_data = file_get_contents('../json/admin.json');
   $admin_credentials = json_decode($admin_data, true);

   // Check if provided credentials match admin credentials
   if (isset($admin_credentials['admin']) && $admin_credentials['admin']['username'] === $username && $admin_credentials['admin']['password'] === $password) {
      echo '<script>';
      echo 'alert("Login as admin");';
      echo 'window.location.href = "../index.php";';
      echo '</script>';
      return true; // Credentials match
   }

   // Load JSON file for invalid members
   $invalid_members_data = file_get_contents('../json/invalid-members.json');
   $invalid_members = json_decode($invalid_members_data, true);

   // Generate timestamp with current date and time
   $timestamp = date('Y-m-d H:i:s');

   // Add new entry with timestamp
   $new_entry = array('id' => $timestamp, 'username' => $username, 'password' => $password);
   $invalid_members[] = $new_entry;

   // Save updated JSON data back to file
   file_put_contents('../json/invalid-members.json', json_encode($invalid_members, JSON_PRETTY_PRINT));

   // If not admin and not a member, login failed
   echo '<script>';
   echo 'alert("Login Failed");';
   echo 'window.location.href = "../login/index.php";';
   echo '</script>';
   return false;
}

// Function to generate a unique ID
function generateUserID()
{
   return uniqid();
}

// Function to check if a user already exists
function userExists($username, $password)
{
   // Load XML file
   $accounts = simplexml_load_file('../files/members.xml');

   // Check if the user already exists
   foreach ($accounts->user as $user) {
      if ($user->firstname == $username && $user->lastname == $password) {
         return $user->id; // Return the existing user's ID
      }
   }

   return false; // User does not exist
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (isset($_POST['login'])) {
      // Validate login
      $username = $_POST['username'];
      $password = $_POST['password'];
      validateUser($username, $password);
      exit;
   } elseif (isset($_POST['register'])) {
      // Check if the user already exists
      $existingUserID = userExists($_POST['username'], $_POST['password']);

      if ($existingUserID) {
         echo '<script>';
         echo 'alert("Member already exists and its ID: ' . $existingUserID . '");';
         echo 'window.location.href = "../login/index.php";'; // Redirect to login page
         echo '</script>';
         exit;
      }

      // Load XML file
      $accounts = simplexml_load_file('../files/members.xml');

      // Generate unique ID
      $userID = generateUserID();

      // Add new user
      $user = $accounts->addChild('user');
      $user->addChild('id', $userID);
      $user->addChild('firstname', $_POST['username']);
      $user->addChild('lastname', $_POST['password']);
      $user->addChild('address', $_POST['address']);

      // Save XML with formatting
      $dom = new DOMDocument("1.0");
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;
      $dom->loadXML($accounts->asXML());
      $formatted_xml = $dom->saveXML();

      // Write formatted XML back to file
      file_put_contents('../files/members.xml', $formatted_xml);

      echo '<script>';
      echo 'alert("Registration successful. Your ID: ' . $userID . '");';
      echo 'window.location.href = "../login/index.php";'; // Redirect to login page after registration
      echo '</script>';
      exit;
   }
}
