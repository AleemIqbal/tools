<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Combine JSON-LD Schemas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      padding: 20px;
    }
    textarea {
      resize: none;
    }
  </style>
<script>
function copyToClipboard(text) {
  const el = document.createElement('textarea');
  el.innerHTML = text; // Use innerHTML instead of value to decode HTML entities
  document.body.appendChild(el);
  el.select();
  document.execCommand('copy');
  document.body.removeChild(el);
}

</script>
</head>
<body>
  <div class="container">
    <h1 class="mb-4">Combine JSON-LD Schemas</h1>
    <form action="cschemas.php" method="POST">
      <div class="mb-3">
        <label for="schema1" class="form-label">JSON-LD Schema 1:</label>
        <textarea class="form-control" id="schema1" name="schema1" rows="6" required></textarea>
      </div>
      <div class="mb-3">
        <label for="schema2" class="form-label">JSON-LD Schema 2:</label>
        <textarea class="form-control" id="schema2" name="schema2" rows="6" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Combine Schemas</button>
    </form>
    
    <?php
	 function jsonToHtmlAttribute($json) {
  $jsonString = json_encode($json, JSON_HEX_APOS | JSON_HEX_QUOT);
  return substr($jsonString, 1, -1); // Remove the extra double quotes from the JSON string
}
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $schema1 = json_decode($_POST['schema1'], true);
      $schema2 = json_decode($_POST['schema2'], true);

      if (json_last_error() === JSON_ERROR_NONE) {
        $combinedSchema = [
          "@context" => "https://schema.org",
          "@graph" => [$schema1, $schema2],
        ];
        $combinedJson = json_encode($combinedSchema, JSON_PRETTY_PRINT);
        echo '<div class="mt-5">';
        echo '<h2>Combined JSON-LD Schema:</h2>';
        echo '<button class="btn btn-secondary mb-2" onclick="copyToClipboard(\'' . jsonToHtmlAttribute($combinedJson) . '\')">Copy to Clipboard</button>';
        echo '<pre class="border rounded p-3 bg-light">' . htmlspecialchars($combinedJson) . '</pre>';
        echo '</div>';
      } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Invalid JSON input. Please check your JSON-LD schemas.</div>';
      }
    }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>