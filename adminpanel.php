<?php
session_start();
if (isset($_SESSION['user_id'])) {
    echo '<form action="logout.php" method="POST" style="position: absolute; top: 45px; right: 50px;">
            <button type="submit" style="
                background-color: #ff4d4d;
                color: white;
                border: none;
                padding: 8px 16px;
                border-radius: 6px;
                cursor: pointer;
                font-size: 14px;
                transition: background-color 0.3s ease;
            " 
            onmouseover="this.style.backgroundColor=\'#e60000\'"
            onmouseout="this.style.backgroundColor=\'#ff4d4d\'">
                Logout
            </button>
          </form>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Pristine Softsol - Admin Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
  :root {
    --bg-color: #ffffff;
    --text-color: #2c3e50;
    --card-bg: #f8f9fa;
    --primary-color: #3498db;
  }

  body.dark {
    --bg-color: #1e1e2f;       /* Dark navy blue background */
    --text-color: #f0f0f5;     /* Light grayish text */
    --card-bg: #2c2c3c;        /* Slightly lighter card background */
    --primary-color: #9b59b6;  /* Purple accent */
  }

  body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: var(--bg-color);
    color: var(--text-color);
    transition: background-color 0.3s, color 0.3s;
  }

  header {
    padding: 20px;
    text-align: center;
    background: var(--primary-color);
    color: white;
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
  flex: 1 1 25%;  /* flexible width with minimum 45% */
  max-width: 600px; /* max width so they don’t stretch too far */
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
  max-height: 320px; /* prevent canvas from stretching too tall */
}


  button.export-btn {
    margin-top: 15px;
    padding: 6px 12px;
    background: var(--primary-color);
    color: white;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    align-self: center; /* center horizontally */
    width: fit-content;
  }
</style>

</head>
<body>
  <header>
    <h1>Admin Dashboard</h1>
  </header>

  <div class="toggle-container">
    <label>
      <input type="checkbox" id="darkToggle"/> Dark Mode
    </label>
  </div>

  <section class="stats" id="stats">
    <!-- Stats will be populated by JS -->
  </section>

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
        <h3 style="margin-top: 40px";>PENDING PROJECTS</h3>
      </div>
  `;
}


    fetchData();

    // Line chart
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

    // Donut chart
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

    // Export chart
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
