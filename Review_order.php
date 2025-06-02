<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_email'])) {
    die("Please log in to view your order.");
}

$email = $_SESSION['user_email'];

// Get user info
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if (!$user) {
    die("User not found.");
}

// Fetch the most recent questionnaire for this user
$query = $conn->prepare("SELECT * FROM questionnaire WHERE email = ? ORDER BY id DESC LIMIT 1");
$query->bind_param("s", $email);
$query->execute();
$response = $query->get_result()->fetch_assoc();

if (!$response) {
    die("No questionnaire data found.");
}

$templateID = $response['template_id'] ?? '';
$templateNumber = '1';

if (preg_match('/template(\d+)/', $templateID, $matches)) {
    $templateNumber = $matches[1];
}

$template_img_path = $_SERVER['DOCUMENT_ROOT'] . "/pristinev2/images/template" . $templateNumber . ".jpg";
if (!file_exists($template_img_path)) {
    $templateNumber = '1';
}
$template_img = "/pristinev2/images/template" . $templateNumber . ".jpg";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Review Order - Pristine Softsol</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: url('/pristinev2/images/Media.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #222;
      height: 100vh;
      overflow: hidden;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .review-container {
      display: flex;
      max-width: 1100px;
      width: 100%;
      gap: 2rem;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(15px);
      border-radius: 15px;
      padding: 2rem;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.25);
      border: 1px solid rgba(255, 255, 255, 0.2);
      color: #111;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      max-height: 90vh;
      overflow-y: auto;
    }

    .questions-container {
      flex: 1 1 60%;
      background: rgba(255, 255, 255, 0.25);
      padding: 2rem;
      border-radius: 15px;
      box-shadow: inset 0 0 15px rgba(255, 255, 255, 0.3);
      color: #222;
    }

    .questions-container h2 {
      margin-bottom: 1.5rem;
      font-weight: 600;
      font-size: 1.8rem;
      color: #0d47a1;
      border-bottom: 2px solid #1E90FF;
      padding-bottom: 0.5rem;
    }

    .qa-table {
      display: grid;
      grid-template-columns: 1fr 1fr;
      row-gap: 1rem;
      column-gap: 2rem;
    }

    .qa-table .question {
      font-weight: 600;
      color: #444;
      text-transform: capitalize;
    }

    .qa-table .answer {
      color: #111;
      word-wrap: break-word;
    }

    .summary-container {
      flex: 0 0 35%;
      background: rgba(255, 255, 255, 0.25);
      border-radius: 15px;
      box-shadow: 0 8px 32px rgba(0,0,0,0.1);
      padding: 2rem 2rem 3rem 2rem;
      display: flex;
      flex-direction: column;
      align-items: center;
      color: #111;
    }

    .summary-container {
  flex: 0 0 35%;
  background: rgba(255, 255, 255, 0.25);
  border-radius: 15px;
  box-shadow: 0 8px 32px rgba(0,0,0,0.1);
  padding: 2rem 2rem 3rem 2rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  color: #111;
  max-height: 90vh; /* Optional: limit height of the right panel */
  overflow-y: auto;  /* Optional: allow internal scrolling if needed */
}

.template-img {
  width: 100%;
  max-width: 280px;
  max-height: 250px;   /* LIMIT image height */
  object-fit: cover;   /* Maintain aspect ratio and crop if needed */
  border-radius: 8px;
  box-shadow: 0 6px 15px rgba(30,144,255,0.3);
  margin-bottom: 1.5rem;
}


    .subtotal {
      font-weight: 700;
      font-size: 1.3rem;
      margin-bottom: 2.5rem;
      color: #111;
    }

    .buttons-group {
      width: 100%;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1rem;
    }

    button {
      background: #1E90FF;
      border: none;
      color: white;
      padding: 12px 30px;
      border-radius: 25px;
      font-weight: 600;
      font-size: 1rem;
      cursor: pointer;
      transition: background 0.3s ease;
      min-width: 140px;
      box-shadow: 0 3px 8px rgba(30,144,255,0.5);
    }

    button:hover {
      background: #0d6efd;
      box-shadow: 0 4px 15px rgba(13,110,253,0.6);
    }

    .buttons-group .top-row {
      display: flex;
      width: 100%;
      justify-content: space-between;
      gap: 1rem;
      margin-bottom: 1rem;
    }

    .buttons-group .bottom-row {
      display: flex;
      justify-content: center;
      width: 100%;
    }

    @media (max-width: 900px) {
      .review-container {
        flex-direction: column;
        padding: 1rem;
      }
      .questions-container, .summary-container {
        flex: 1 1 100%;
        max-width: 100%;
        margin-bottom: 2rem;
      }
      .buttons-group .top-row {
        flex-direction: column;
        gap: 0.8rem;
        margin-bottom: 0.8rem;
      }
      .buttons-group .top-row button,
      .buttons-group .bottom-row button {
        width: 100%;
        min-width: unset;
      }
    }
  </style>
</head>
<body>

  <div class="review-container">

    <div class="questions-container">
      <h2>Order Summary</h2>
      <div class="qa-table">
        <div class="question">Business Name</div>
        <div class="answer"><?= htmlspecialchars($response['businessName']) ?></div>

        <div class="question">Industry Type</div>
        <div class="answer"><?= htmlspecialchars($response['industryType']) ?></div>

        <div class="question">Target Audience</div>
        <div class="answer"><?= htmlspecialchars($response['targetAudience']) ?></div>

        <div class="question">Website Type</div>
        <div class="answer"><?= htmlspecialchars($response['websiteType']) ?></div>

        <div class="question">Preferred Technology</div>
        <div class="answer"><?= htmlspecialchars($response['technology']) ?></div>

        <div class="question">Layout Style</div>
        <div class="answer"><?= htmlspecialchars($response['layoutStyle']) ?></div>

        <div class="question">Have Logo?</div>
        <div class="answer"><?= htmlspecialchars($response['logo']) ?></div>

        <div class="question">Need E-commerce?</div>
        <div class="answer"><?= htmlspecialchars($response['ecommerce']) ?></div>

        <div class="question">Payment Gateway?</div>
        <div class="answer"><?= htmlspecialchars($response['paymentGateway']) ?></div>

        <div class="question">Contact Form?</div>
        <div class="answer"><?= htmlspecialchars($response['contactForm']) ?></div>

        <div class="question">Live Chat Support?</div>
        <div class="answer"><?= htmlspecialchars($response['liveChat']) ?></div>
      </div>
    </div>

    <div class="summary-container">
      <h2>Template Selected</h2>
      <img src="<?= htmlspecialchars($template_img) ?>" alt="Selected Template" class="template-img" />
      <div class="subtotal">Subtotal: $<?= htmlspecialchars($response['estimatedPrice']) ?></div>

      <div class="buttons-group">
        <div class="top-row">
          <button onclick="window.location.href='Home.php#questionnaireForm';">Edit Preferences</button>
          <button onclick="window.location.href='Query.html';">Talk to Agent</button>
        </div>
        <div class="bottom-row">
          <button onclick="payNow()">Pay 50%</button>
        </div>
      </div>
    </div>

  </div>

  <script>
    function payNow() {
      alert("Paying 50% upfront...");
      window.location.href = 'payment.html';
    }
  </script>

</body>
</html>
