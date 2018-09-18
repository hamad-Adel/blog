<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Email</title>
</head>
<body>
	<h1>hI admin</h1>
	<p>You have new email from {{ $name }}</p>
	<p>Subject: {{ $subject }}</p>
	<p>Email: {{ $email }}</p>
	<hr>
	<h4>The message</h4>
	<p>{{ $body }}</p>
</body>
</html>