<?php
if(isset($_POST['submit'])) {
	//collect and clean inputs
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
	$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
	
	//create file if not exist and set headings
	$newfile = 'contact_form.csv';
	if(!file_exists($newfile)){
		$fh = fopen($newfile, 'w') or die('Failed to create file!');
		file_put_contents($newfile, "Name,Email,Title,Message".PHP_EOL); 
	}
	
	//save input to text
	file_put_contents($newfile, $name.','.$email.','.$title.','.$message.PHP_EOL , FILE_APPEND | LOCK_EX); 
	
	//output response
	echo $name. "Your form has been submitted sucessfully";
}
?>
