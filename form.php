<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $path = $_SERVER['DOCUMENT_ROOT'] . '/../config.php';
    require_once $path;

    try {
        // instantiate the PDO database Object
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        echo 'connect';
    } catch (PDOException $e) {
        // terminate if it can't connect to database
        die($e->getMessage());
    }

    $sql = "INSERT INTO student (last, first, GPA, SID, advisor, birthdate) 
        VALUES (:last, :first, :GPA, :SID, :Advisor, :birthdate)";

    $statement = $dbh->prepare($sql);
    $statement->bindParam(':last', $last);
    $statement->bindParam(':first', $first);

    $statement->bindParam(':SID', $SID);
    $statement->bindParam(':Birthdate', $Birthdate);

    $statement->bindParam(':GPA', $GPA);
    $statement->bindParam(':Advisor', $Advisor);

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>New students</h1>
    <form method = "post">

        <label for="sid"> ID:</label>
        <input type="text" sid="id" name="sid" required>
        <br>


        <label for="last">Last Name:</label>
        <input type="text" id="last" name="last" required>
        <br>

        <label for="first">First Name:</label>
        <input type="text" id="first" name="first" required>
        <br>

        <label for="birthdate">Birthdate:</label>
        <input type="date" id="birthdate" name="birthdate" required>
        <br>

        <label for="gpa">GPA:</label>
        <input type="text" id="gpa" name="gpa" required>
        <br>

        <label for="advisor">Advisor:</label>
        <input type="text" id="advisor" name="advisor" required>
        <br>

        <button type = submit>Add</button>


    </form>

</body>
</html>


