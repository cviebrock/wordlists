<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Word List Generator</title>
	{{ HTML::style('css/style.min.css') }}
</head>
<body>

	<div class="container">

		<h1>Word List Generator</h1>


{{ Former::open() }}

<fieldset>
	<legend>Word Length</legend>
{{ Former::small_number('min_length','Minimum')->min(2)->max(15) }}
{{ Former::small_number('max_length','Maximum')->min(2)->max(15) }}
</fieldset>


<fieldset>
	<legend>Contains Letters</legend>
{{ Former::text('contains','Word contains') }}
{{ Former::text('not_contains','Word does not contain') }}
</fieldset>

<fieldset>
	<legend>Pattern Matching</legend>
{{ Former::text('matches','Word matches') }}
{{ Former::text('not_matches','Word does not match') }}
</fieldset>


<fieldset>
	<legend>Output Options</legend>
{{ Former::checkbox('group','Group alphabetically') }}
{{ Former::radios('format','Format')->radios( $output_formats )->check(0)->inline() }}
</fieldset>


{{ Former::actions()->primary_submit('Generate') }}

{{ Former::close() }}

	</div>

</body>
</html>
