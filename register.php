<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $fileName = basename($_FILES['file']['name']);
    $filePath = $uploadDir . $fileName;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $filePath)) {
        $file = 'users.json';
        $users = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
        $users[] = ['name' => $name, 'email' => $email, 'phone' => $phone, 'file' => $fileName];
        file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
        
        echo "Registration successful! <a href='index.php'>Go back</a>";
    } else {
        echo "File upload failed.";
    }
}
?>
