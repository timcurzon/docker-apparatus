<?php
define('MYSQL_HOST', getenv('MYSQL_HOST') ?: 'mysql');
define('MYSQL_USER', getenv('MYSQL_USER') ?: 'username');
define('MYSQL_PASSWORD', getenv('MYSQL_PASSWORD') ?: 'password');

// 01 DB connection
$dsn = 'mysql:dbname=php_test_db;host=' . MYSQL_HOST;
try {
    $conn = new PDO($dsn, MYSQL_USER, MYSQL_PASSWORD);
} catch (PDOException $e) {
    echo 'ERROR: Connection failed: ' . $e->getMessage();
	exit;
}

// 02 Init DB (as required)
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['init']) && $_GET['init'] === 'true') {
	try {
		$createTableSql = "CREATE TABLE IF NOT EXISTS `testdata` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`name` varchar(60) NOT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=InnoDB DEFAULT CHARSET=utf8";
		$conn->query($createTableSql);

		$createDataSql = "INSERT INTO `testdata`VALUES (1,'lister'),(2,'rimmer'),(3,'cat'),(4,'kryten'),(5,'holly')";
		$conn->query($createDataSql);

		header('Location: /');
	} catch (PDOException $e) {
		echo 'ERROR: Database init failed: ', $e->getMessage();
		exit;
	}
}

// 03 POST processing (add name to DB)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST) && sizeof($_POST)) {
	// Input filter (for now, dont do anything)
	$args = [
		'username' => ['filter' => FILTER_DEFAULT]
	];
	$inputs = filter_input_array(INPUT_POST, $args);

	// Update DB
	if (sizeof($inputs) && isset($inputs['username']) && $inputs['username'] !== '') {
		$statement = $conn->prepare('
			INSERT INTO testdata (name) VALUES (:username);
		');
		$insertCount = $statement->execute([
			':username' => substr($inputs['username'], 0, 60)
		]);
	}
}

// 04a Default processing: obtain data
$sql = "SELECT * FROM testdata LIMIT 100";
$res = $conn->query($sql);
if (!$res) {
	echo 'ERROR: Could not find test data - no DB / table defined? <a href="/?init=true">Set up default table + data</a>';
	exit;
}
$count = $res->rowCount();

// 04b Default processing: display
// Header
print <<<EOT
<!DOCTYPE html>
<html>
<head>
	<title>PHP + DB test container</title>
	<meta charset="utf8" />
</head>
<body>
EOT;

echo '<h1>Nomad Exercise: PHP + MariaDB</h1>';

echo '<h2>Existing users</h2>';
if ($count > 0) {
	echo '<ul>';
	foreach ($res as $row) {
		echo '<li>', filter_var($row['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS), '</li>';
	}
	echo '</ul>';
} else {
	echo '<p>No users setup, add one...</p>';
}

print <<<EOT
<form action="/" method="POST">
	<label for="username">Add user:</label>
	<input id="username" type="text" name="username" maxlength="60" value="" placeholder="e.g. kochanski, ace" />
	<button>Add</button>
</form>
EOT;

// Footer
print <<<EOT
</body>
</html>
EOT;
