<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Word List Generator</title>
</head>
<body>

	<h1>Word List Generator</h1>


{{ Former::open() }}

{{ Former::text('contains','Word contains') }}
{{ Former::text('not_contains','Word does not contain') }}


{{ Former::close() }}

</body>
</html>
