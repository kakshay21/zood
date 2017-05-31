<?

include 'dbh.php';

$basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
$uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
  if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
  $uri = trim($uri, '/');


if($uri[0]=='U'){
	$sqlQuery="SELECT * FROM users WHERE linkId='$uri' AND active='0'";
	$result=$conn->query($sqlQuery);
	$row = $result->fetch_array(MYSQLI_BOTH);

	if($row){
		$redirectLink=$row['redirectLink'];
		$sqlUpdate="UPDATE users SET active='1' WHERE linkID='$uri'";
		$result2=$conn->query($sqlUpdate);
		header('Location: '.$row['redirectLink']);

		
	}
	else{
		echo "Don't mess with me!";
		header('Location: 404.php');
		exit();
	}
}
else {
	echo "Don't mess with me!";
	header('Location: 404.php');
	exit();
}
?>