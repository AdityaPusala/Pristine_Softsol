<?php
// Simulate what your real $templateID would be
$templateID = '1';

// Map template IDs to image paths — use absolute URLs from your working example
$templateImages = [
    '1' => '/pristinev2/images/template1.jpg',
    '2' => '/pristinev2/images/template2.jpg',
    '3' => '/pristinev2/images/template3.jpg',
    '4' => '/pristinev2/images/template4.jpg',
];

// Get the image path for the selected template
$template_img = $templateImages[$templateID] ?? '/pristinev2/images/default-template.jpg';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Test Template Image</title>
</head>
<body>

  <h1>Template Image Test</h1>
  <p>Template ID: <?= htmlspecialchars($templateID) ?></p>
  <p>Image src: <?= htmlspecialchars($template_img) ?></p>

  <!-- Image display -->
  <img src="<?= htmlspecialchars($template_img) ?>" alt="Selected Template" style="width:300px; border: 1px solid #ccc;">

</body>
</html>
