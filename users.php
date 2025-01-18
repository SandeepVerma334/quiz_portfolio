<?php 
session_start();
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="users-container">
        <?php
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'Admin') {
            header("Location: login.php");
            exit();
        }

        $selectQuery = "SELECT * FROM users";
        $query = mysqli_query($conn, $selectQuery);
        if (mysqli_num_rows($query) > 0) {
        ?>
        <div class="custom-table-container">
            <div class="user-heading">
                <h2>All User Data</h2>
            </div>
            <div class="filter_sec">
            <div class="mb-3">
                <input type="text" id="searchInput" class="form-control form-input" placeholder="Search by any field...">
            </div>
            <button onclick="sortByFirstName()" id="sortbtn1"class=" btn btn-primary">Sort by First Name</button>
            <button onclick="sortBydate()" id="sortbtn2" class=" btn btn-primary">Sort by date</button>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="userTable">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Middle Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Role</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Description</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Profile Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while ($row = mysqli_fetch_array($query)) {
                            if (isset($row['role']) && $row['role'] === 'User') {
                                ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['first_name']; ?></td>
                                    <td><?php echo $row['middle_name']; ?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td>
                                        <?php echo empty($row['tags']) ? "No Tags Found!" : $row['tags']; ?>
                                    </td>
                                    <td><?php echo $row['role']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td>
                                        <img src="uploads/<?php echo $row['file']; ?>" alt="User Image" width="100" height="100">
                                    </td>
                                    <td><button class="btn btn-danger">Delete</button></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
        <?php } ?>
        </div>
    </div>
    
    <script>
        // JavaScript for Search Filter
        function filterTable() {
            const input = document.getElementById("searchInput");
            const filter = input.value.toUpperCase();
            const table = document.getElementById("userTable"); // Ensure the table has the correct ID
            const rows = table.getElementsByTagName("tr");

            // Loop through all table rows (excluding the header row)
            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("td");
                let match = false;

                // Check if any cell in the row matches the search query
                for (let j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        const text = cells[j].textContent || cells[j].innerText;
                        if (text.toUpperCase().indexOf(filter) > -1) {
                            match = true;
                            break;
                        }
                    }
                }

                // Show or hide the row based on the match result
                rows[i].style.display = match ? "" : "none";
            }
        }

        // Attach the filterTable function to the search input
        document.getElementById("searchInput").addEventListener("keyup", filterTable);


        // Function to sort the table by first name
function sortByFirstName() {
    const table = document.getElementById("userTable");
    const rows = Array.from(table.rows).slice(1); // Exclude header row
    let isAscending = table.rows[0].cells[1].classList.contains("asc"); // Check if already sorted ascending

    rows.sort((rowA, rowB) => {
        const cellA = rowA.cells[1].innerText.toUpperCase(); // Get the first name for row A
        const cellB = rowB.cells[1].innerText.toUpperCase(); // Get the first name for row B

        // Compare the first name values
        if (cellA < cellB) return isAscending ? -1 : 1;
        if (cellA > cellB) return isAscending ? 1 : -1;
        return 0;
    });

    // Re-append rows to the table in the sorted order
    rows.forEach(row => table.appendChild(row));

    // Toggle sorting order classes for first name column
    if (isAscending) {
        table.rows[0].cells[1].classList.remove("asc");
        table.rows[0].cells[1].classList.add("desc");
    } else {
        table.rows[0].cells[1].classList.remove("desc");
        table.rows[0].cells[1].classList.add("asc");
    }
}
// by date sort
function sortBydate() {
    const table = document.getElementById("userTable");
    const rows = Array.from(table.rows).slice(1); // Exclude header row
    
    let isAscending = table.rows[0].cells[9].classList.contains("asc"); // Check if already sorted ascending

    rows.sort((rowA, rowB) => {
       // Get the first name for row B
        const cellc = rowA.cells[9].innerText.toUpperCase(); // Get the first name for row A
        const celld = rowB.cells[9].innerText.toUpperCase();
        // Compare the first name values
       
        if (cellc < celld) return isAscending ? -1 : 1;
        if (cellc > celld) return isAscending ? 1 : -1;
        return 0;
    });

    // Re-append rows to the table in the sorted order
    rows.forEach(row => table.appendChild(row));

    // Toggle sorting order classes for first name column
    if (isAscending) {
        
        table.rows[0].cells[9].classList.remove("asc");
        table.rows[0].cells[9].classList.add("desc");
    } else {
       
        table.rows[0].cells[9].classList.remove("desc");
        table.rows[0].cells[9].classList.add("asc");
    }
}










    </script>
</body>
</html>
