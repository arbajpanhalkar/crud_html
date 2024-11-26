<?php
include 'header.php';
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php 
    // Database connection
    $con = mysqli_connect("localhost", "root", "", "crud") or die("Connection failed");

    // SQL query to fetch data
    $sql = "SELECT * FROM students 
            JOIN studentclass ON students.sclass = studentclass.cid";

    // Execute query
    $result = mysqli_query($con, $sql) or die("query unsuccessful");

    if(mysqli_num_rows($result) > 0){
    ?>
    <table cellpadding="7px">
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>Class</th>
            <th>Phone</th>
            <th>Action</th>
        </thead>
        <tbody>

        <?php 
        while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?php echo $row['sid']; ?></td>
                <td><?php echo $row['sname']; ?></td>
                <td><?php echo $row['saddress']; ?></td>
                <td><?php echo $row['cname']; ?></td> <!-- classname from the studentclass table -->
                <td><?php echo $row['sphone']; ?></td>
                <td>
                    <a href='edit.php?id=<?php echo $row['sid']; ?>'>Edit</a>
                    <a href='delete-inline.php?id=<?php echo $row['sid']; ?>'>Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php } else {
        echo "<h2>No Record Found</h2>";
    }

    // Close the connection
    mysqli_close($con);
    ?>
</div>
<?php
// include 'footer.php';
?>