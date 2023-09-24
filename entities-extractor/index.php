<?php
session_start(); // Start the PHP session
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Entity Extractor</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Entity Extractor</h1>
        <form method="post">
            <div class="form-group">
                <label for="api_key">TextRazor API Key:</label>
                <input type="text" class="form-control" id="api_key" name="api_key" placeholder="Enter your TextRazor API Key" required value="<?php echo isset($_SESSION['api_key']) ? $_SESSION['api_key'] : ''; ?>">
                <p>Test API: 032064872bbc709b78544f1a9960c61ffc4f11aff73f5d15b8198165</p>
            </div>
            <div class="form-group">
                <label for="urls">Enter URL(s) (Separated by line breaks):</label>
                <textarea class="form-control" id="urls" name="urls" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Extract Entities</button>
        </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $textrazorApiKey = $_POST["api_key"]; // Get the API key from the form input
        $_SESSION['api_key'] = $textrazorApiKey; // Store the API key in the session
        $textrazorEndpoint = "https://api.textrazor.com/";

        $urls = explode("\n", $_POST["urls"]);
        $entities = [];

        foreach ($urls as $url) {
            $url = trim($url);

            if (!empty($url)) {
                $postData = [
                    "url" => $url,
                    "extractors" => "entities",
                ];

                $options = [
                    "http" => [
                        "header" => "x-textrazor-key: {$textrazorApiKey}\r\n" . "Content-Type: application/x-www-form-urlencoded\r\n",
                        "method" => "POST",
                        "content" => http_build_query($postData),
                    ],
                ];

                $context = stream_context_create($options);
                $response = file_get_contents($textrazorEndpoint, false, $context);

                if ($response !== false) {
                    $data = json_decode($response, true);

                    if (isset($data["error"])) {
                        echo "<div class='alert alert-danger'>Error: {$data['error']['message']}</div>";
                    } elseif (isset($data["response"]["entities"])) {
                        foreach ($data["response"]["entities"] as $entity) {
                            $entityId = $entity["entityId"];
                            $excludeRegex1 = preg_match('/\d{4}-\d{2}-\d{2}T\d{2}:\d{2}:\d{2}\.\d{3}\+\d{2}:\d{2}/', $entityId);
                            $excludeRegex2 = preg_match('/^[0-9]*\.?[0-9]+$/', $entityId);

                            // Check if the entity matches either of the exclusion patterns
                            if (!$excludeRegex1 && !$excludeRegex2) {
                                $entityName = preg_replace('/\([^)]+\)/', '', $entity["entityId"]);
                                $entities[] = $entityName;
                            }
                        }
                    }
                } else {
                    echo "<div class='alert alert-danger'>Error: Unable to fetch data from the TextRazor API.</div>";
                }
            }
        }

        if (!empty($entities)) {
            $commonEntities = array_count_values($entities);
            arsort($commonEntities);
        }
    ?>
    <div class="container mt-4">
        <?php if (!empty($commonEntities)) { ?>
        <!-- Add Copy to Clipboard button -->
        <button id="copyButton" class="btn btn-primary">Copy to Clipboard</button>
        <h2>Common Non-Number Entities across all URLs:</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Entity</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commonEntities as $entity => $count) { ?>
                    <tr>
                        <td><?= $entity ?></td>
                        <td><?= $count ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
            <p>No common non-number entities found.</p>
        <?php } ?>
    </div>
    <?php } ?>
    <script>
        // Function to copy the entities to the clipboard
        document.getElementById('copyButton').addEventListener('click', function() {
            var entities = <?= json_encode($commonEntities) ?>;
            var entitiesArray = Object.keys(entities);
            var entitiesString = entitiesArray.join(', ');

            var textarea = document.createElement('textarea');
            textarea.value = entitiesString;
            document.body.appendChild(textarea);

            textarea.select();
            document.execCommand('copy');

            document.body.removeChild(textarea);
        });
    </script>
</body>
</html>