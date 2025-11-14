<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit User</title>

<style>
body {
font-family: Arial, sans-serif;
background-color: #F8F7BA;
margin: 0;
padding: 0;
}

h2 {
background-color: #F5D2D2;
padding: 15px;
text-align: center;
color: #333;
border-bottom: 3px solid #BDE3C3;
margin: 0;
}

.container {
width: 60%;
margin: 30px auto;
background: white;
padding: 20px;
border-radius: 10px;
border: 2px solid #F5D2D2;
box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

form input[type="text"],
form input[type="email"] {
width: 95%;
padding: 10px;
margin-bottom: 15px;
border: 2px solid #BDE3C3;
border-radius: 5px;
}

form input[type="submit"] {
background-color: #BDE3C3;
border: none;
padding: 10px 20px;
cursor: pointer;
font-weight: bold;
border-radius: 5px;
}
</style>

</head>
<body>

<h2>Edit User</h2>

<div class="container">
<form method="POST">
Name: <input type="text" name="name" value="<?= $row['name']; ?>" required><br>
Email: <input type="email" name="email" value="<?= $row['email']; ?>" required><br>
Phone: <input type="text" name="phone" value="<?= $row['phone']; ?>" required><br>

<input type="submit" name="update" value="Update">
</form>
<br>
<a href="index.php">← Back</a>
</div>

</body>
</html>

<?php
if (isset($_POST['update'])) {
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$sql = "UPDATE users SET name='$name', email='$email', phone='$phone' WHERE id=$id";
if ($conn->query($sql)) {
header("Location: index.php");
exit;
} else {
echo "Error updating record: " . $conn->error;
}
}
?>
