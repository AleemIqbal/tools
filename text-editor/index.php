<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universal Text Editor</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Universal Text Editor</h1>
        <textarea id="textEditor" class="form-control" rows="10"></textarea>
        
        <!-- Add "Clean Text" button and call the "cleanText" function -->
        <div class="mt-3">
            <button class="btn btn-primary" onclick="cleanText()">Clean Text</button>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" onclick="removeDuplicates()">Remove Duplicate Lines</button>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" onclick="removeBrackets()">Remove Brackets</button>
        </div>
        <div class="mt-3">
            <button class="btn btn-primary" onclick="replaceNewlines()">Replace Newline with Separator</button>
            <input type="text" id="separator" class="form-control" placeholder="Enter Separator">
        </div>

        <div class="mt-3">
            <button class="btn btn-primary" onclick="addStart()">Add Something at Start</button>
            <input type="text" id="startText" class="form-control" placeholder="Text to add at the start">
        </div>

        <div class="mt-3">
            <button class="btn btn-primary" onclick="addEnd()">Add Something at End</button>
            <input type="text" id="endText" class="form-control" placeholder="Text to add at the end">
        </div>

        

        <div class="mt-3">
            <button class="btn btn-primary" onclick="replaceWithNewLine()">Replace Word with New Line</button>
            <input type="text" id="replaceWord" class="form-control" placeholder="Word to replace">
        </div>

        <div class="mt-3">
            <button class="btn btn-primary" onclick="toUpperCase()">Uppercase</button>
            <button class="btn btn-primary" onclick="toLowerCase()">Lowercase</button>
            <button class="btn btn-primary" onclick="toNormalCase()">Normal Case</button>
        </div>

        <div class="mt-3">
            <button class="btn btn-danger" onclick="clearText()">Clear Text</button>
        </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function replaceNewlines() {
            const text = document.getElementById('textEditor').value;
            const separator = document.getElementById('separator').value;
            const newText = text.replace(/\n/g, separator);
            document.getElementById('textEditor').value = newText;
        }

        function addStart() {
            const text = document.getElementById('textEditor').value;
            const startText = document.getElementById('startText').value;
            const newText = text.split('\n').map(line => `${startText}${line}`).join('\n');
            document.getElementById('textEditor').value = newText;
        }
        // Define the "cleanText" function
        function cleanText() {
            const text = document.getElementById('textEditor').value;

            // Remove numbers at the beginning and every even line
            const lines = text.split('\n');
            const cleanedLines = lines.filter((line, index) => index % 2 === 0).map(line => line.replace(/^\d+\.\s/, ''));

            // Join the cleaned lines
            const cleanedText = cleanedLines.join('\n');

            // Remove duplicate lines
            const uniqueText = [...new Set(cleanedText.split('\n'))].join('\n');

            // Set the cleaned and unique text in the text area
            document.getElementById('textEditor').value = uniqueText;
        }
        function addEnd() {
            const text = document.getElementById('textEditor').value;
            const endText = document.getElementById('endText').value;
            const newText = text.split('\n').map(line => `${line}${endText}`).join('\n');
            document.getElementById('textEditor').value = newText;
        }

        function removeBrackets() {
            const text = document.getElementById('textEditor').value;
            const newText = text.replace(/\([^)]+\)/g, '');
            document.getElementById('textEditor').value = newText;
        }

        function replaceWithNewLine() {
            const text = document.getElementById('textEditor').value;
            const replaceWord = document.getElementById('replaceWord').value;
            const newText = text.replace(new RegExp(replaceWord, 'g'), '\n');
            document.getElementById('textEditor').value = newText;
        }

        function toUpperCase() {
            const text = document.getElementById('textEditor').value;
            const newText = text.toUpperCase();
            document.getElementById('textEditor').value = newText;
        }

        function toLowerCase() {
            const text = document.getElementById('textEditor').value;
            const newText = text.toLowerCase();
            document.getElementById('textEditor').value = newText;
        }
        // New function to remove duplicate lines
        function removeDuplicates() {
            const text = document.getElementById('textEditor').value;

            // Split the text into lines, remove duplicates, and join them back together
            const uniqueText = [...new Set(text.split('\n'))].join('\n');

            // Set the cleaned and unique text in the text area
            document.getElementById('textEditor').value = uniqueText;
        }
        function toNormalCase() {
            const text = document.getElementById('textEditor').value;
            const newText = text.replace(/\b\w/g, c => c.toUpperCase());
            document.getElementById('textEditor').value = newText;
        }

        function clearText() {
            document.getElementById('textEditor').value = '';
        }
    </script>
</body>
</html>