<?php
function cleanTitle($title) {
    $title = preg_replace('/\s*-\s*[^-]+$/u', '', $title); // Remove everything after the last hyphen
    $title = preg_replace('/^\d+\s*(?:\.\s*)?/u', '', $title); // Remove numbering at the beginning
    return $title;
}

if (isset($_POST['keywords']) && isset($_POST['titles'])) {
    $keywords = array_map('trim', explode(PHP_EOL, $_POST['keywords']));
    $titles = array_map('trim', explode(PHP_EOL, $_POST['titles']));
    $titles = array_map('cleanTitle', $titles);

    $prompts = [];
    for ($i = 0; $i < min(count($keywords), count($titles)); $i++) {
        $prompts[] = "Write sentences of these keywords \"{$keywords[$i]}\" for this topic \"{$titles[$i]}\"";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generated Prompts</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .list-group-item:hover {
            cursor: pointer;
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Generated Prompts</h1>
        <div class="list-group" id="promptList">
            <?php foreach ($prompts as $prompt): ?>
            <div class="list-group-item" onclick="copyToClipboard(this)">
                <?php echo htmlspecialchars($prompt); ?>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center my-4">
            <button class="btn btn-primary" onclick="copyAllPrompts()">Copy All Prompts</button>
            <a href="index.php" class="btn btn-secondary">Generate More Prompts</a>
        </div>
    </div>
    <script>
        function copyToClipboard(element) {
            const text = element.textContent.trim();
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);
        }

        function copyAllPrompts() {
    const promptList = document.getElementById('promptList');
    let allPrompts = '';
    for (const item of promptList.children) {
        allPrompts += item.textContent.trim() + '\n';
    }
    const textarea = document.createElement('textarea');
    textarea.value = allPrompts.trim();
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
}
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>