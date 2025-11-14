<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
<title>PHP CRUD Example</title>

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
width: 80%;
margin: 30px auto;
background: white;
padding: 20px;
border-radius: 10px;
border: 2px solid #F5D2D2;
box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
}

table {
width: 100%;
border-collapse: collapse;
margin-top: 15px;
}

table th {
background-color: #BDE3C3;
padding: 10px;
border: 1px solid #ccc;
}

table td {
padding: 10px;
border: 1px solid #ccc;
background-color: #fff;
}

.btn {
padding: 8px 15px;
border-radius: 5px;
border: none;
cursor: pointer;
font-weight: bold;
text-decoration: none;
color: black;
}

.btn-add {
background-color: #BDE3C3;
}

.btn-edit {
background-color: #F5D2D2;
}

.btn-delete {
background-color: #F8A6A6;
}

a:hover {
opacity: 0.8;
}
</style>

</head>
<body>

<h2>User List</h2>

<div class="container">
<a href="add.php" class="btn btn-add">+ Add New User</a>
<br><br>

<table>
<tr>
<th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM users");
while($row = $result->fetch_assoc()):
?>
<tr>
<td><?= $row['id']; ?></td>
<td><?= $row['name']; ?></td>
<td><?= $row['email']; ?></td>
<td><?= $row['phone']; ?></td>
<td>
<a class="btn btn-edit" href="edit.php?id=<?= $row['id']; ?>">Edit</a>
<a class="btn btn-delete"
href="delete.php?id=<?= $row['id']; ?>"
onclick="return confirm('Delete this record?');">Delete</a>
</td>
</tr>
<?php endwhile; ?>
</table>
</div>

</body>
</html>
