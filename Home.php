<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
        table {
        
            border-collapse: collapse;
            font-family: Arial, Helvetica, sans-serif;
          
           width: 700px;
}

        /* table, th, td {
            border: 2px solid black;
        } */
        tr:nth-child(even){background-color: #f2f2f2;}
        tr:hover {background-color: #ddd;}
        th, td {
            padding: 8px;
      
            border: 1px solid #ddd;

        }

        th {
            padding-top: 12px;
  padding-bottom: 12px;
 
  background-color:#08d;
  color: white;
        }
    </style>
<!-- Include DataTables from CDN -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<!-- initializing the table -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
</head>
<body>
    <h1>Users </h1>

    <?php

// Create a database connection
$conn = new mysqli("localhost", "root", "", "Login");

// Select user data from the database
$stmt = $conn->prepare("SELECT * FROM users");
$stmt->execute();

$result = $stmt->get_result();


echo "<table id='example' class='display' style='width:100%'>";
echo "<thead><tr><th>ID</th><th>Name</th><th>Email</th></tr></thead>";
echo "<tbody>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["UserName"] . "</td>";
    echo "<td>" . $row["email"] . "</td>";
    echo "</tr>";
}

echo "</tbody></table>";

?>  


</body>
</html>