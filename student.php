<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Database CURD operations</title>
    <link rel="stylesheet" href="student.css">
    <script src="javascript.js"> </script>
    <script type="text/javascript">

    </script>
</head>

<body>
    <center>
        <h1>CURD Operations on Student Database</h1>

        <div class="buttons">
            <button onclick="add_form()">ADD</button>
            <button onclick="delete_form()">DELETE</button>
            <button onclick="update_form()">UPDATE</button>
            <button onclick="display_form()">DISPLAY</button>
        </div>

        <form id="add_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr>
                    <th>Student Roll no. :- </th>
                    <td><input type="number" name="arno" required></td>
                </tr>
                <tr>
                    <th>Student Name :- </th>
                    <td><input type="text" name="aname" required></td>
                </tr>
                <tr>
                    <th>Student Date of Birth :- </th>
                    <td>
                        <input type="date" name="adob" required>
                    </td>
                </tr>
                <tr>
                    <th>Student Date of Joining :- </th>
                    <td>
                        <input type="date" name="adoj" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="add_data" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
        <form id="delete_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr>
                    <th>Student Roll no. :- </th>
                    <td><input type="number" name="rno" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="delete_data" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
        <form id="display_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="submit" name="display_data" value="Display">
        </form>
        <form id="update_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <table>
                <tr>
                    <th>Student Roll no. :- </th>
                    <td><input type="number" name="rno" required></td>
                </tr>
                <tr>
                    <th>Student Name :- </th>
                    <td><input type="text" name="name" required></td>
                </tr>
                <tr>
                    <th>Student Date of Birth :- </th>
                    <td>
                        <input type="date" name="dob" required>
                    </td>
                </tr>
                <tr>
                    <th>Student Date of Joining :- </th>
                    <td>
                        <input type="date" name="doj" required>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="update_data" value="Submit">
                    </td>
                </tr>
            </table>

        </form>

        <?php
        if (isset($_POST["add_data"])) {
            include_once('connection.php');
            $sql = "INSERT INTO STUDENT (STUDENT_NO, STUDENT_NAME, STUDENT_DOB,STUDENT_DOJ)VALUES ('" . $_POST['arno'] . "','" . $_POST['aname'] . "' ,'" . $_POST['adob'] . "' ,'" . $_POST['adoj'] . "')";
            if ($conn->query($sql) === TRUE) {
                echo "<script type=text/javascript> alert('DATA INSERTED')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        if (isset($_POST["delete_data"])) {
            include_once('connection.php');
            $r = $_POST['rno'];
            $sql = "DELETE FROM STUDENT WHERE STUDENT_NO=$r";
            if ($conn->query($sql)) {
                echo "<script type=text/javascript> alert('DATA DELETED SUCESSSFULY')</script>";
            }
            else{
                echo "<script type=text/javascript> alert('No such record found')</script>";
            }
            unset($_POST);
            unset($r);
        }
        if (isset($_POST["update_data"])) {
            include_once('connection.php');
            $r = $_POST['rno'];
            $sql = "UPDATE STUDENT SET STUDENT_NAME='" . $_POST['name'] . "',STUDENT_DOB='" . $_POST['dob'] . "',STUDENT_DOJ='" . $_POST['doj'] . "' WHERE STUDENT_NO=$r";
            if ($conn->query($sql) === TRUE) {
                echo "<script type=text/javascript> alert('DATA UPDATED SUCESSSFULY')</script>";
            }
        }
        if (isset($_POST["display_data"]) == true) {
            include_once('connection.php');
            $sql = "SELECT * FROM STUDENT";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<table id=table cellpadding=20px style=' margin-top: 50px;'>
            <tr>    
                <th>Student No.</th>
                <th>Student Name</th>
                <th>Student DOB</th>
                <th>Student DOJ</th>
            </tr>";
                foreach ($result as $row) {
                    echo '<tr>';
                    echo '<td>' . $row['STUDENT_NO'] . '</td>';
                    echo '<td>' . $row['STUDENT_NAME'] . '</td>';
                    echo '<td>' . $row['STUDENT_DOB'] . '</td>';
                    echo '<td>' . $row['STUDENT_DOJ'] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo " <p>No records found</p>";
            }
        }

        ?>

    </center>
</body>

</html>