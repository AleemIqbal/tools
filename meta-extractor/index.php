<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>URL Extractor</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">URL Extractor</h1>
        <form action="extract_data.php" method="post">
            <div class="mb-3">
                <label for="urls" class="form-label">Enter URLs (one per line)</label>
                <textarea class="form-control" id="urls" name="urls" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Extract Data</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>