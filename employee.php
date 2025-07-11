<?php
include_once 'navbar_student.php';
include_once 'connection.php';

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Add employee
if (isset($_POST['add_employee'])) {
    $stmt = $pdo->prepare("INSERT INTO employee (name, position) VALUES (?, ?)");
    $stmt->execute([$_POST['name'], $_POST['position']]);
}

// Mark attendance
if (isset($_POST['mark_attendance'])) {
    foreach ($_POST['status'] as $id => $status) {
        $stmt = $pdo->prepare("INSERT INTO attendance (employee_id, date, status) VALUES (?, ?, ?)");
        $stmt->execute([$id, $_POST['date'], $status]);
    }
}

// Edit attendance
if (isset($_POST['edit_attendance'])) {
    $stmt = $pdo->prepare("UPDATE attendance SET date = ?, status = ? WHERE id = ?");
    $stmt->execute([$_POST['edit_date'], $_POST['edit_status'], $_POST['edit_id']]);
}

// Delete attendance
if (isset($_GET['delete_id'])) {
    $stmt = $pdo->prepare("DELETE FROM attendance WHERE id = ?");
    $stmt->execute([$_GET['delete_id']]);
    header("Location: " . $_SERVER['PHP_SELF']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Attendance System</title>
    <style>
        body { font-family: Arial; margin: 20px; background: #f2f2f2; }
        h2 { color: #003366; }
        table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
        table, th, td { border: 1px solid #999; }
        th, td { padding: 8px; text-align: center; }
        form { margin-bottom: 30px; background: #fff; padding: 15px; border-radius: 10px; }
        input, select, button { padding: 6px; margin: 5px; }
        a { color: red; text-decoration: none; }
        h2{
             background-color: #335eff;
        }
    </style>
</head>
<body>

<h2> Add Employee</h2>
<form method="POST">
    <input name="name" required placeholder="Name">
    <input name="position" required placeholder="Position">
    <button name="add_employee">Add</button>
</form>

<h2> Mark Attendance</h2>
<form method="POST">
    <label>Select Date: <input type="date" name="date" required></label>
    <table>
        <tr><th>Name</th><th>Position</th><th>Status</th></tr>
        <?php
        $employee = $pdo->query("SELECT * FROM employee")->fetchAll();
        foreach ($employee as $emp): ?>
            <tr>
                <td><?= $emp['name'] ?></td>
                <td><?= $emp['position'] ?></td>
                <td>
                    <select name="status[<?= $emp['id'] ?>]">
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                        <option value="Late">Late</option>
                    </select>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <button name="mark_attendance">Save Attendance</button>
</form>

<h2>📋 Attendance Records</h2>
<table>
    <tr><th>Date</th><th>Name</th><th>Position</th><th>Status</th><th>Actions</th></tr>
    <?php
    $records = $pdo->query("
        SELECT a.id, a.date, e.name, e.position, a.status
        FROM maxamed_attendance a
        JOIN employee e ON a.employee_id = e.id
        ORDER BY a.date DESC
    ")->fetchAll();

    foreach ($records as $row): ?>
        <tr>
            <form method="POST">
                <input type="hidden" name="edit_id" value="<?= $row['id'] ?>">
                <td><input type="date" name="edit_date" value="<?= $row['date'] ?>"></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['position'] ?></td>
                <td>
                    <select name="maxamed_attendance">
                        <option <?= $row['status'] == 'Present' ? 'selected' : '' ?>>Present</option>
                        <option <?= $row['status'] == 'Absent' ? 'selected' : '' ?>>Absent</option>
                        <option <?= $row['status'] == 'Late' ? 'selected' : '' ?>>Late</option>
                    </select>
                </td>
                <td>
                    <button name="edit_attendance">Save</button>
                    <a href="?delete_id=<?= $row['id'] ?>" onclick="return confirm('ma rabtaaa in aad tir tirto?')">Delete</a>
                </td>
            </form>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
