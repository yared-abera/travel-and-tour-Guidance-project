<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/admintable.css">
</head>
<body>
    <?php
    session_start();
    // include("adminhome.php");
    require("dbconnect.php");
    
    $name = $_SESSION['username'];
    
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE customer_name= ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    
    ?>

    
    <div class="table-div">
        <div class="back">
        <button id="backButton">Back</button>
        </div>
      
    </div>

    <?php
    echo $name;
    ?>

    <script>
        // Add an event listener to the back button
        document.getElementById('backButton').addEventListener('click', navigateToAdminHome);

        function navigateToAdminHome() {
            // Redirect to the adminhome.php page
            window.location.href = 'userhome.php';
        }
    </script>
<table border="4" class="table" border-collapse="collapse">
    <tr>
        <th>booking_id</th>
        <th>Contact Details</th>
        <th>Selected Package</th>
        <th>guests</th>
        <th>arrivals</th>
        <th>leaving</th>
       <th>Booking Status</th>
    </tr>
    <?php
    // include("adminhome.php");
    if ($result->num_rows > 0) {
       
       

        while ( $row = $result->fetch_assoc()) {
           
             $package_id=$row["package_id"];
         $sql = $conn->prepare("SELECT package_name FROM packages WHERE package_id= ?");
         $sql->bind_param("s", $package_id);
         $sql->execute();
         $p_result = $sql->get_result();
         $p_row=$p_result->fetch_assoc();
         

      echo "<tr>";
            echo "<td>" . $row["booking_id"] . "</td>";
            echo "<td>" . $row["contact_details"] . "</td>";
            echo "<td>" . $p_row["package_name"]  . "</td>";
            echo "<td>" . $row["guests"] . "</td>";
            echo "<td>" . $row["arrivals"] . "</td>";
            echo "<td>" . $row["leaving"] . "</td>";
            echo "<td>" . $row["booking_status"] . "</td>";
            echo "<td>
    <form method='post' action='cancelbooking.php' style='display:inline;' onsubmit='event.preventDefault(); confirmDelete(this);'>
        <input type='hidden' name='booking_id' value='" . $row["booking_id"] . "'>
        <input type='submit' value='Cancel'>
    </form>
</td>";
            echo "</tr>";         
        }
    } else {
        echo "<tr><td colspan='4'>No bookings found</td></tr>";
    }
    ?>
<script>
    function confirmDelete(form) {
        if (confirm("Are you sure you want to perform this action?")) {
            form.submit();
        }
    }
</script>
</table>