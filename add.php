<?php
session_start();
if (isset($_POST['add'])) {
	// ? Open xml file
	$users = simplexml_load_file('files/members.xml');

	// Add new user
	$user = $users->addChild('user');
	$user->addChild('id', $_POST['id']);
	$user->addChild('firstname', $_POST['firstname']);
	$user->addChild('lastname', $_POST['lastname']);
	$user->addChild('address', $_POST['address']);

	// ? Save XML with formatting
	$dom = new DOMDocument("1.0");
	$dom->preserveWhiteSpace = false;
	$dom->formatOutput = true;
	$dom->loadXML($users->asXML());
	$formatted_xml = $dom->saveXML();

	// ? Write formatted XML back to file
	file_put_contents('files/members.xml', $formatted_xml);

	$_SESSION['message'] = 'Member added successfully';
	header('location: index.php');
} else {
	$_SESSION['message'] = 'Fill up add form first';
	header('location: index.php');
}
