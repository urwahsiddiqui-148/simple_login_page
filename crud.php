<?php
include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'create') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $age = $_POST['age'];

        $sql = "INSERT INTO students (name, email, age) VALUES ('$name', '$email', '$age')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif ($action == 'delete') {
        $id = $_POST['id'];

        $sql = "DELETE FROM students WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$sql = "SELECT id, name, email, age FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='student-item'>";
        echo "Name: " . $row["name"]. " - Email: " . $row["email"]. " - Age: " . $row["age"];
        echo "<form method='POST' action='crud.php' style='display:inline;'>";
        echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
        echo "<button type='submit' name='action' value='delete'>Delete</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>