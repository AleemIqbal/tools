<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = $_POST['faq_input'];
    $faq_array = explode(PHP_EOL, $input);
    $faqs = [];
    $question = '';

    foreach ($faq_array as $line) {
        $line = trim($line);

        if (empty($line)) {
            continue;
        }

        if (substr($line, -1) === '?') {
            $question = $line;
        } elseif (!empty($question)) {
            $faqs[] = [
                'question' => $question,
                'answer' => $line,
            ];
            $question = '';
        }
    }

    $json_ld = [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => [],
    ];

foreach ($faqs as $faq) {
    $json_ld['mainEntity'][] = [
        '@type' => 'Question',
        'name' => str_replace(['"', "'"], '', $faq['question']),
        'acceptedAnswer' => [
            '@type' => 'Answer',
            'text' => str_replace(['"', "'"], '', $faq['answer']),
        ],
    ];
}
    $json_ld_output = json_encode($json_ld, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ JSON-LD Generator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 2rem;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        textarea {
            width: 100%;
            box-sizing: border-box;
        }
        pre {
            background-color: #e9ecef;
            padding: 1rem;
            border-radius: .25rem;
            overflow-x: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4">FAQ JSON-LD Generator</h1>
        <p>Enter your FAQs in the text area below. Each line with a question should end with a question mark (?). The answer should be on the next line.</p>

        <form method="post">
            <div class="mb-3">
                <textarea name="faq_input" rows="10" class="form-control" required><?php echo isset($input) ? htmlspecialchars($input) : ''; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Generate JSON-LD</button>
        </form>
		
        <?php if (!empty($json_ld_output)): ?>
            <h2 class="mt-5">JSON-LD Schema</h2>
            <button class="btn btn-secondary" onclick="copyToClipboard()">Copy to Clipboard</button>
            <pre id="json_ld_output"><?php echo stripslashes($json_ld_output); ?></pre>
           
        <?php endif; ?>
    </div>
	<script>
                function copyToClipboard() {
            const textArea = document.createElement('textarea');
            textArea.value = document.getElementById('json_ld_output').innerText;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>