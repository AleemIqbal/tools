<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Ultimate URL Editor</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Ultimate URL Editor</h1>
        <form id="url-form">
            <div class="mb-3">
                <label for="urls" class="form-label">Enter URLs (one per line)</label>
                <textarea class="form-control" id="urls" name="urls" rows="10" required></textarea>
            </div>
            <button type="button" class="btn btn-primary" onclick="trimToRoot()">Trim to Root</button>
            <button type="button" class="btn btn-primary" onclick="removeParams()">Remove Parameters from URL</button>
            <button type="button" class="btn btn-primary" onclick="removeEmptySpaces()">Remove Empty Spaces</button>
            <button type="button" class="btn btn-primary" onclick="removeDuplicateLines()">Remove Duplicate Lines</button>
            <button type="button" class="btn btn-secondary mt-2" onclick="copyResultToClipboard()">Copy Result</button>
            <div class="mt-3">
                <span id="result-message" class="d-none"></span>
            </div>
        </form>
    </div>

    <script>
        function displayResult(message) {
            const resultMessage = document.getElementById('result-message');
            resultMessage.textContent = message;
            resultMessage.classList.remove('d-none');
        }

        function trimToRoot() {
            const urls = document.getElementById('urls');
            const originalUrls = urls.value.split('\n');
            const trimmedUrls = originalUrls.map(url => {
                const parsedUrl = new URL(url);
                return `${parsedUrl.protocol}//${parsedUrl.hostname}`;
            });

            urls.value = trimmedUrls.join('\n');
            displayResult(`URLs trimmed to root: ${trimmedUrls.length}`);
        }

        function removeParams() {
            const urls = document.getElementById('urls');
            const originalUrls = urls.value.split('\n');
            const cleanedUrls = originalUrls.map(url => {
                const parsedUrl = new URL(url);
                return `${parsedUrl.protocol}//${parsedUrl.hostname}${parsedUrl.pathname}`;
            });

            urls.value = cleanedUrls.join('\n');
            displayResult(`Parameters removed from URLs: ${cleanedUrls.length}`);
        }

        function removeEmptySpaces() {
            const urls = document.getElementById('urls');
            const originalUrls = urls.value.split('\n');
            const nonEmptyUrls = originalUrls.filter(url => url.trim() !== '');

            urls.value = nonEmptyUrls.join('\n');
            displayResult(`Empty spaces removed: ${originalUrls.length - nonEmptyUrls.length}`);
        }

        function removeDuplicateLines() {
            const urls = document.getElementById('urls');
            const originalUrls = urls.value.split('\n');
            const uniqueUrls = new Set(originalUrls);

            urls.value = Array.from(uniqueUrls).join('\n');
            displayResult(`Duplicates removed: ${originalUrls.length - uniqueUrls.size}`);
        }
        function copyResultToClipboard() {
            const urls = document.getElementById('urls');
            urls.select();
            urls.setSelectionRange(0, 99999);
            document.execCommand('copy');
            displayResult('Result copied to clipboard!');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>