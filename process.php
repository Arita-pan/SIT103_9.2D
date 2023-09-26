<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

$BOOK_ID = $_POST["BOOK_ID"];
$BOOK_TITLE = $_POST["BOOK_TITLE"];
$PUBLICATION_DATE = $_POST["PUBLICATION_DATE"];
$AUTHOR_ID = $_POST["AUTHOR_ID"];
//$AUTHOR_ID = filter_input(INPUT_POST, "AUTHOR_ID", FILTER_VALIDATE_INT);
$CATEGORY_ID = $_POST["CATEGORY_ID"];
//$CATEGORY_ID = filter_input(INPUT_POST, "CATEGORY_ID", FILTER_VALIDATE_INT);
$BOOK_QUANTITY = $_POST["BOOK_QUANTITY"];
//$BOOK_QUANTITY = filter_input(INPUT_POST, "BOOK_QUANTITY", FILTER_VALIDATE_INT);
$SHELF_ID = $_POST["SHELF_ID"];

$host = "localhost";
$dbname = "library_db";
$username = "root";
$password = "";
  

$conn = mysqli_connect(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);

if (mysqli_connect_errno()) {
  die("Connection error: " . mysqli_connect_error());
}

echo "Connection successful.";

$sql = "INSERT INTO BOOK (BOOK_ID, BOOK_TITLE, PUBLICATION_DATE, AUTHOR_ID, CATEGORY_ID, BOOK_QUANTITY, SHELF_ID)
        VALUES (?,?,?,?,?,?,?)";

$stmt = mysqli_stmt_init($conn);

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
  die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssiiis",
                        $BOOK_ID,
                        $BOOK_TITLE,
                        $PUBLICATION_DATE,
                        $AUTHOR_ID,
                        $CATEGORY_ID,
                        $BOOK_QUANTITY,
                        $SHELF_ID);

mysqli_stmt_execute($stmt);

echo "Record saved.";

// var_dump($bookid, $booktitle, $publicationdate, $authorid, $categoryid, $bookquantity, $shelfid);
// print_r($_POST);

?>



