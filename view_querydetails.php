<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>View Query Details - Admin Dashboard</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f4f6f9;
      margin: 0;
      padding: 1rem;
      color: #333;
    }

    .container {
      max-width: 1000px;
      margin: 2rem auto;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 3px 15px rgba(0,0,0,0.1);
      padding: 1.5rem;
      box-sizing: border-box;
    }

    .header {
      margin-bottom: 1.5rem;
      border-bottom: 2px solid #1E90FF;
      padding-bottom: 0.5rem;
    }

    .header h2 {
      margin: 0;
      font-size: 1.8rem;
      color: #1E90FF;
      font-weight: 600;
    }

    .details-grid {
      display: grid;
      grid-template-columns: 1fr 2fr;
      row-gap: 0.8rem;
      column-gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .label {
      font-weight: 600;
      color: #555;
      font-size: 0.9rem;
      text-transform: capitalize;
    }

    .value {
      color: #222;
      font-size: 0.9rem;
      word-break: break-word;
      white-space: pre-wrap;
    }

    button {
      background-color: #1E90FF;
      border: none;
      color: white;
      padding: 10px 25px;
      font-size: 0.9rem;
      border-radius: 20px;
      cursor: pointer;
      font-weight: 600;
      box-shadow: 0 3px 8px rgba(30,144,255,0.5);
      transition: background-color 0.3s ease;
      display: inline-block;
    }

    button:hover {
      background-color: #0d6efd;
      box-shadow: 0 4px 15px rgba(13,110,253,0.6);
    }

    @media (max-width: 768px) {
      .details-grid {
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="header">
    <h2>Query Details</h2>
  </div>

  <div class="details-grid">
    <div class="label">Business Name</div>
    <div class="value">Example Business Ltd.</div>

    <div class="label">Industry Type</div>
    <div class="value">Technology</div>

    <div class="label">Target Audience</div>
    <div class="value">Startups and Entrepreneurs</div>

    <div class="label">Website Type</div>
    <div class="value">Corporate</div>

    <div class="label">Preferred Technology</div>
    <div class="value">React, Node.js</div>

    <div class="label">Layout Style</div>
    <div class="value">Modern & Minimal</div>

    <div class="label">Have Logo?</div>
    <div class="value">Yes</div>

    <div class="label">Need E-commerce?</div>
    <div class="value">No</div>

    <div class="label">Payment Gateway?</div>
    <div class="value">N/A</div>

    <div class="label">Contact Form?</div>
    <div class="value">Yes</div>

    <div class="label">Live Chat Support?</div>
    <div class="value">No</div>

    <div class="label">Subtotal</div>
    <div class="value">$1200</div>
  </div>

  <button onclick="window.location.href='adminqueries.php'">Back to Queries</button>
</div>

</body>
</html>
