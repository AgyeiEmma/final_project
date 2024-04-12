<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Users - EventSeatBooker</title>
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
<header class="navbar">
<div class="navbar">
        <button onclick="window.location.href='./index_view.php';" class="back-button"><h1>EventSeatBooker</h1></button> 
        <nav>
            <ul class="nav-links">
                <li><a href="./index_view.php">Home</a></li>
                <li><a href="./event_view.php">Events</a></li>
                <li><a href="./about_view.php">About</a></li>
                <li><a href="./contact_view.php">Contact</a></li>
            </ul>
        </nav>   </div>
</header>

<main>
    <h1>User Management</h1>
    <section>
        <h2>Add New User</h2>
        <form action="user_actions.php" method="post">
            <input type="hidden" name="action" value="create">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone">
            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Add User</button>
        </form>
    </section>
    
    <section>
    <h2>Existing Users</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $pdo->query("SELECT UserID, Name, Email, Phone, Role FROM Users");
            while ($row = $stmt->fetch()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['Name']) . "</td>
                        <td>" . htmlspecialchars($row['Email']) . "</td>
                        <td>" . htmlspecialchars($row['Phone']) . "</td>
                        <td>" . htmlspecialchars($row['Role']) . "</td>
                        <td>
                            <a href='edit_user_view.php?UserID=" . $row['UserID'] . "'>Edit</a> | 
                            <a href='user_actions.php?action=delete&UserID=" . $row['UserID'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>
</section>
    </section>
</main>

<footer>
<p>&copy; 2024 EventSeatBooker. All rights reserved.</p>
</footer>
</body>
</html>