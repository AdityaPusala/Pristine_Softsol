<?php
// admin_queries.php

// DB connection - adjust credentials as needed
$servername = "localhost";
$username = "root";
$password = ""; // your DB password
$dbname = "pristine_softsol";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch all queries
$sql = "SELECT * FROM `query` ORDER BY `Time` DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin - Queries</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px 40px;
      background: #f4f4f4;
      color: #333;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    h1 {
      color: #2c3e50;
      margin-bottom: 20px;
      text-align: center;
    }

    .back-button {
      align-self: flex-start;
      margin-bottom: 20px;
      background: #3498db;
      color: white;
      border: none;
      padding: 10px 18px;
      border-radius: 6px;
      cursor: pointer;
      font-size: 14px;
      transition: background-color 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .back-button:hover {
      background: #2980b9;
    }

    table {
      width: 1400px;
      max-width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0 0 10px rgb(0 0 0 / 0.1);
      border-radius: 8px;
      overflow: hidden;
      border: 1px solid #ddd;
      table-layout: fixed;
    }

    thead {
      background: #3498db;
      color: white;
    }

    thead th {
      padding: 16px 20px;
      border: 1px solid #ddd;
    }

    tbody tr {
      border-bottom: 1px solid #ddd;
      transition: background-color 0.3s ease;
    }

    tbody tr:hover {
      background-color: #f0f8ff;
    }

    /* Text alignments by column */
    tbody td {
      padding: 15px 20px;
      border: 1px solid #ddd;
      vertical-align: middle;
      word-break: break-word;
    }
    /* Align left for text heavy columns */
    tbody td:nth-child(1),
    tbody td:nth-child(2),
    tbody td:nth-child(3),
    tbody td:nth-child(4) {
      text-align: left;
    }
    /* Align center for time and details button */
    tbody td:nth-child(5),
    tbody td:nth-child(6) {
      text-align: center;
      white-space: nowrap;
    }

    .view-btn {
      background: #3498db;
      color: white;
      border: none;
      padding: 8px 18px;
      border-radius: 6px;
      font-size: 14px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      display: inline-block;
      text-decoration: none;
      min-width: 110px;
    }

    .view-btn:hover {
      background: #2980b9;
      color: white;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <a href="adminpanel.php" class="back-button"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>

  <h1>Queries</h1>

  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Issue</th>
        <th>Message</th>
        <th>Time</th>
        <th>Details</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($result && $result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
          <tr>
            <td><?php echo htmlspecialchars($row['Name']); ?></td>
            <td><?php echo htmlspecialchars($row['Email']); ?></td>
            <td><?php echo htmlspecialchars($row['Issue']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($row['Message'])); ?></td>
            <td><?php echo htmlspecialchars($row['Time']); ?></td>
            <td>
            <a href="https://mail.google.com/mail/?view=cm&to=<?php echo urlencode($row['Email']); ?>" target="_blank" class="view-btn">
              Reply Customer
             </a>
            </td>

          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="6" style="text-align:center;">No queries found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>

</body>
</html>
<?php $conn->close(); ?>
