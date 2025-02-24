<?php
<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Registration Form</h1>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Phone:</label><br>
        <input type="text" name="phone" required><br><br>

        <label>Upload File:</label><br>
        <input type="file" name="file" required><br><br>

        <button type="submit">Register</button>
    </form>

    <h2>Registered Users</h2>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>File</th>
        </tr>
        <?php
        $file = 'users.json';
        if (file_exists($file)) {
            $users = json_decode(file_get_contents($file), true);
            foreach ($users as $user) {
                echo "<tr>
                        <td>{$user['name']}</td>
                        <td>{$user['email']}</td>
                        <td>{$user['phone']}</td>
                        <td><a href='uploads/{$user['file']}' target='_blank'>{$user['file']}</a></td>
                      </tr>";
            }
        }
        ?>
    </table>
</body>
</html>
