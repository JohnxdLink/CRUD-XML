<?php
// Function to check if a given timestamp already exists in the JSON data
function timestampExists($timestamp)
{
   $json_data = file_get_contents('../json/invalid-members.json');
   $members = json_decode($json_data, true);
   foreach ($members as $member) {
      if ($member['id'] === $timestamp) {
         return true;
      }
   }
   return false;
}

// Load JSON data
$json_data = file_get_contents('../json/invalid-members.json');
echo $json_data;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // Retrieve form data
   $timestamp = $_POST['timestamp'];
   $username = $_POST['username'];
   $password = $_POST['password'];
   $address = $_POST['address'];

   // Check if timestamp already exists
   if (timestampExists($timestamp)) {
      // Load XML file
      $accounts = simplexml_load_file('../files/members.xml');

      // Generate unique ID
      $userID = uniqid();

      // Add new user
      $user = $accounts->addChild('user');
      $user->addChild('id', $timestamp); // Use timestamp as ID
      $user->addChild('firstname', $username);
      $user->addChild('lastname', $password);
      $user->addChild('address', $address);

      // Save XML with formatting
      $dom = new DOMDocument("1.0");
      $dom->preserveWhiteSpace = false;
      $dom->formatOutput = true;
      $dom->loadXML($accounts->asXML());
      $formatted_xml = $dom->saveXML();

      // Write formatted XML back to file
      file_put_contents('../files/members.xml', $formatted_xml);

      // Alert success message
      echo '<script>';
      echo 'alert("Members successfully saved at XML File!");';
      echo 'window.location.href = "../json-page/index.php";';
      echo '</script>';
   } else {
      // Alert message for non-existing timestamp
      echo '<script>';
      echo 'alert("This timestamp does not exist!");';
      echo 'window.location.href = "../json-page/index.php";';
      echo '</script>';
   }
}
