<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Domain Filter Tool</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Domain Filter Tool</h1>
        <form action="filter_domains.php" method="post">
            <div class="mb-3">
                <label for="domains" class="form-label">Enter root domains (one per line)</label>
                <textarea class="form-control" id="domains" name="domains" rows="10" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Filter Domains</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>