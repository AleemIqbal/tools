<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keyword and Title Tool</title>
    <!-- Add Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center my-4">Keyword and Title Tool</h1>
        <form action="process.php" method="post">
            <div class="form-group">
                <label for="keywords">Keywords:</label>
                <textarea class="form-control" name="keywords" id="keywords" rows="5" placeholder="Enter keywords separated by commas"></textarea>
            </div>
            <div class="form-group">
                <label for="titles">Titles:</label>
                <textarea class="form-control" name="titles" id="titles" rows="5" placeholder="Enter titles separated by newlines"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Generate Prompts</button>
        </form>
    </div>
    <!-- Add Bootstrap and jQuery JS CDN -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>