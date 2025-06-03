<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die("Access denied. Admin login required.");
}

if (!isset($_GET['id'])) {
    die("No project ID specified.");
}

$projectId = intval($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM questionnaire WHERE id = ?");
$stmt->bind_param("i", $projectId);
$stmt->execute();
$response = $stmt->get_result()->fetch_assoc();

if (!$response) {
    die("Project not found.");
}

$templateID = $response['template_id'] ?? '';
$templateNumber = '1';

if (preg_match('/template(\d+)/', $templateID, $matches)) {
    $templateNumber = $matches[1];
}

$template_img_path = $_SERVER['DOCUMENT_ROOT'] . "images/template" . $templateNumber . ".jpg";
if (!file_exists($template_img_path)) {
    $templateNumber = '1';
}
$template_img = "images/template" . $templateNumber . ".jpg"; //add parent folder path
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>View Project Order - Admin Dashboard</title>
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

    .content {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      flex-wrap: wrap;
    }

    .details {
      flex: 1 1 auto;
      min-width: 300px;
      display: flex;
      flex-direction: column;
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
    }

    .template {
      flex: 0 0 auto;
      margin-left: 10px;
      min-width: 240px;
    }

    .template-img {
      width: 100%;
      max-width: 350px;
      height: 400px;
      margin-right: 80px;
      object-fit: cover;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(30,144,255,0.25);
      display: block;
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
      align-self: flex-start; /* Align button to left inside .details flex */
    }

    button:hover {
      background-color: #0d6efd;
      box-shadow: 0 4px 15px rgba(13,110,253,0.6);
    }

    @media (max-width: 768px) {
      .content {
        flex-direction: column;
        align-items: center;
      }

      .details-grid {
        grid-template-columns: 1fr;
      }

      .template {
        margin-left: 0;
        min-width: auto;
        width: 100%;
        max-width: 350px;
      }

      .template-img {
        max-width: 100%;
        height: auto;
      }

      button {
        align-self: center;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <div class="header">
    <h2>Project Order Details & Template Selected</h2>
  </div>

  <div class="content">
    <div class="details">
      <div class="details-grid">
        <div class="label">Business Name</div>
        <div class="value"><?= htmlspecialchars($response['businessName']) ?></div>

        <div class="label">Industry Type</div>
        <div class="value"><?= htmlspecialchars($response['industryType']) ?></div>

        <div class="label">Target Audience</div>
        <div class="value"><?= htmlspecialchars($response['targetAudience']) ?></div>

        <div class="label">Website Type</div>
        <div class="value"><?= htmlspecialchars($response['websiteType']) ?></div>

        <div class="label">Preferred Technology</div>
        <div class="value"><?= htmlspecialchars($response['technology']) ?></div>

        <div class="label">Layout Style</div>
        <div class="value"><?= htmlspecialchars($response['layoutStyle']) ?></div>

        <div class="label">Have Logo?</div>
        <div class="value"><?= htmlspecialchars($response['logo']) ?></div>

        <div class="label">Need E-commerce?</div>
        <div class="value"><?= htmlspecialchars($response['ecommerce']) ?></div>

        <div class="label">Payment Gateway?</div>
        <div class="value"><?= htmlspecialchars($response['paymentGateway']) ?></div>

        <div class="label">Contact Form?</div>
        <div class="value"><?= htmlspecialchars($response['contactForm']) ?></div>

        <div class="label">Live Chat Support?</div>
        <div class="value"><?= htmlspecialchars($response['liveChat']) ?></div>

        <div class="label">Subtotal</div>
        <div class="value">$<?= htmlspecialchars($response['estimatedPrice']) ?></div>
      </div>

      <!-- Button placed here inside .details, below answers -->
      <button onclick="window.location.href='pending_projects.html'">Start Assigning</button>
    </div>

    <div class="template">
      <img src="<?= htmlspecialchars($template_img) ?>" alt="Selected Template" class="template-img" />
    </div>
  </div>

</div>

</body>
</html>
