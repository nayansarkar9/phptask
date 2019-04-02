

<!DOCTYPE html>
<html>
<head>
	<title>api</title>
</head>
<body>
	<form method="post">
		<textarea name='data' placeholder="Write in JSON Format"></textarea>
		<input type="submit" name="submit" value="submit">
	</form>

	<?php
	if(isset($_POST['submit'])){
			$data= $_POST['data'];
 include "credentials.php";
 // sets $access_token
ini_set('user_agent', "PHP"); // github requires this
$api = 'https://api.github.com';
$url = $api . '/gists'; // no user info because we're sending auth
// prepare the body data

$data1 = json_encode(array(
    'description' => 'description1',
    'public' => 'true',
    'files' => array(
        'gist.txt' => array(
            'content' => $data
        )
    )
));
// set up the request context
$options = ["http" => [
    "method" => "POST",
    "header" => ["Authorization: token " . $access_token,
        "Content-Type: application/json"],
    "content" => $data1
    ]];
$context = stream_context_create($options);
// make the request
$response = file_get_contents($url, false, $context);
}
?>

</body>
</html>
