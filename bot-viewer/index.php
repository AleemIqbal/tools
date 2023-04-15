<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Status Checker</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
    <?php
$status_code = isset($_GET['status_code']) ? (int)$_GET['status_code'] : null;
?>
        <h1 class="text-center mt-5">URL Status Checker</h1>
        <form action="check_status.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="url" class="form-label">Enter URL:</label>
                <input type="url" class="form-control" id="url" name="url" required>
            </div>

            <div class="mb-3">
                <label for="crawler" class="form-label">Choose Crawler:</label>
                <select class="form-select" id="crawler" name="crawler" required>
                    <option value="googlebot">Googlebot</option>
                    <option value="bingbot">Bingbot</option>
                    <option value="facebook">Facebook</option>
                    <option value="twitter">Twitter</option>
                    <option value="baiduspider">Baidu</option>
                    <option value="yandex">Yandex</option>
                    <option value="duckduckbot">DuckDuckGo</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Check Status</button>
        </form>
        
<?php if ($status_code !== null): ?>
    <div class="alert alert-info mt-4" role="alert">
        Status code: <strong><?= $status_code ?></strong>
    </div>
<?php endif; ?>
    </div>
    <div class="container">
        <h2 class="text-center mt-5">Bot Preview</h2>
        <iframe src="" width="100%" height="400" frameborder="0" id="bot-preview" class="mt-4"></iframe>
    </div>

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script>
    const form = document.querySelector('form');
    const botPreview = document.querySelector('#bot-preview');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        const url = document.querySelector('#url').value;
        const crawler = document.querySelector('#crawler').value;
        botPreview.src = `bot_preview.php?url=${encodeURIComponent(url)}&crawler=${encodeURIComponent(crawler)}`;
    });
</script>
</body>
</html>