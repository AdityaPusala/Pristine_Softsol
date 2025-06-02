<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pristine Softsol - Admin Dashboard</title>

  <!-- Fonts and Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    :root {
      --bg-color: #ffffff;
      --text-color: #2c3e50;
      --card-bg: #f8f9fa;
      --primary-color: #3498db;
    }

    body.dark {
      --bg-color: #1e1e2f;
      --text-color: #f0f0f5;
      --card-bg: #2c2c3c;
      --primary-color: #9b59b6;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background-color: var(--bg-color);
      color: var(--text-color);
      transition: background-color 0.3s, color 0.3s;
    }

    header {
      position: relative;
      display: flex;
      align-items: center;
      padding: 20px 30px;
      background: var(--primary-color);
      color: white;
    }

    header h1 {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      margin: 0;
      font-size: 28px;
      font-weight: 700;
    }

    .header-links {
      margin-left: auto;
      display: flex;
      gap: 25px;
      font-size: 16px;
      font-weight: 600;
    }

    .header-links a,
    .header-links form button {
      color: white;
      text-decoration: none;
      background: none;
      border: none;
      font: inherit;
      cursor: pointer;
      transition: color 0.3s ease;
    }

    .header-links a:hover,
    .header-links form button:hover {
      color: #e0e0e0;
    }

    .toggle-container {
      text-align: right;
      margin: 10px 20px;
    }

    .stats {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      margin: 20px;
    }

    .stat {
      background-color: var(--card-bg);
      padding: 20px;
      border-radius: 10px;
      width: 200px;
      text-align: center;
      cursor: pointer;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .charts {
      display: flex;
      justify-content: center;
      gap: 28px;
      flex-wrap: wrap;
      padding: 20px;
    }

    .chart-box {
      background-color: var(--card-bg);
      padding: 20px;
      border-radius: 10px;
      flex: 1 1 25%;
      max-width: 600px;
      height: 400px;
      display: flex;
      flex-direction: column;
      align-items: center;
      box-sizing: border-box;
      text-align: center;
    }

    canvas {
      width: 100% !important;
      height: auto !important;
      flex-grow: 1;
      max-height: 320px;
    }

    button.export-btn {
      margin-top: 15px;
      padding: 6px 12px;
      background: var(--primary-color);
      color: white;
      border: none;
      cursor: pointer;
      border-radius: 5px;
      align-self: center;
      width: fit-content;
    }
  </style>
</head>
<body>

  <!-- Header with centered title and right-aligned links -->
  <header>
    <h1>Admin Dashboard</h1>
    <div class="header-links">
      <a href="adminqueries.php">Queries</a>
      <?php if (isset($_SESSION['user_id'])): ?>
        <form action="logout.php" method="POST">
          <button type="submit">Logout</button>
        </form>
      <?php endif; ?>
    </div>
  </header>

  <!-- Dark Mode Toggle -->
  <div class="toggle-container">
    <label>
      <input type="checkbox" id="darkToggle"/> Dark Mode
    </label>
  </div>

  <!-- Stats Section -->
  <section class="stats" id="stats">
    <!-- Populated by JS -->
  </section>

  <!-- Charts Section -->
  <section class="charts">
    <div class="chart-box">
      <h3>Monthly Sales</h3>
      <canvas id="salesChart"></canvas>
      <button class="export-btn" onclick="downloadChart('salesChart', 'sales')">Download</button>
    </div>
    <div class="chart-box">
      <h3>Customers Over 5 Years</h3>
      <canvas id="donutChart"></canvas>
      <button class="export-btn" onclick="downloadChart('donutChart', 'customers')">Download</button>
    </div>
  </section>

  <!-- JavaScript -->
  <script>
    const toggle = document.getElementById('darkToggle');
    toggle.addEventListener('change', () => {
      document.body.classList.toggle('dark', toggle.checked);
    });

    async function fetchData() {
      const response = await fetch('project_counts.php');
      const data = await response.json();
      document.getElementById('stats').innerHTML = `
        <div class="stat" style="background: #3498db;" onclick="window.location.href='total_projects.html'">
          <h3>TOTAL PROJECTS</h3><strong>${data.totalProjects}</strong>
        </div>
        <div class="stat" style="background: #f39c12;" onclick="window.location.href='current_projects.html'">
          <h3>CURRENT PROJECTS</h3><strong>${data.currentProjects}</strong>
        </div>
        <div class="stat" style="background: #2ecc71;" onclick="window.location.href='delivered_projects.html'">
          <h3>DELIVERED PROJECTS</h3><strong>${data.deliveredProjects}</strong>
        </div>
        <div class="stat" style="background: #e74c3c;" onclick="window.location.href='pending_projects.html'">
          <h3 style="margin-top: 40px;">PENDING PROJECTS</h3>
        </div>
      `;
    }

    fetchData();

    fetch('fetch_sales.php')
      .then(res => res.json())
      .then(data => {
        const labels = data.map(item => item.month);
        const sales = data.map(item => item.sales);
        new Chart(document.getElementById('salesChart').getContext('2d'), {
          type: 'line',
          data: {
            labels,
            datasets: [{
              label: 'Sales in AUD',
              data: sales,
              borderColor: '#3498db',
              backgroundColor: 'rgba(52,152,219,0.2)',
              borderWidth: 2
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false
          }
        });
      });

    fetch('fetch_customers.php')
      .then(res => res.json())
      .then(data => {
        const labels = data.map(item => item.year);
        const counts = data.map(item => item.count);
        new Chart(document.getElementById('donutChart').getContext('2d'), {
          type: 'doughnut',
          data: {
            labels,
            datasets: [{
              data: counts,
              backgroundColor: ['#e74c3c', '#3498db', '#2ecc71', '#9b59b6', '#f1c40f']
            }]
          },
          options: {
            responsive: true,
            maintainAspectRatio: false
          }
        });
      });

    function downloadChart(chartId, filename) {
      const canvas = document.getElementById(chartId);
      const link = document.createElement('a');
      link.download = filename + '.png';
      link.href = canvas.toDataURL('image/png');
      link.click();
    }
  </script>
</body>
</html>
