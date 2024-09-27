<?php

$csvFile = 'persons.csv';


if (!file_exists($csvFile) || !is_readable($csvFile)) {
    die("CSV file not found or is not readable.");
}


if (($handle = fopen($csvFile, 'r')) !== false) {
    echo "<table border='1'>";
    

    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Title</th>";
    echo "<th>First Name</th>";
    echo "<th>Last Name</th>";
    echo "<th>Address</th>";
    echo "<th>Barangay</th>";
    echo "<th>Municipality</th>";
    echo "<th>Province</th>";
    echo "<th>Array</th>";
    echo "<th>Phone</th>";
    echo "<th>Mobile</th>";
    echo "<th>Company Name</th>";
    echo "<th>Website</th>";
    echo "<th>Job Title</th>";
    echo "<th>Color</th>";
    echo "<th>Birthdate</th>";
    echo "<th>Email</th>";
    echo "<th>Password</th>";
    echo "</tr>";

    while (($row = fgetcsv($handle)) !== false) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td>" . htmlspecialchars($cell) . "</td>";
        }
        echo "</tr>";
    }

    echo "</table>";

    fclose($handle);
} else {
    die("Error opening the CSV file.");
}
?>