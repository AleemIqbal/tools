<?php
function get_title_and_description($url)
{
    $html = fetch_url_content($url);

    if (!$html) {
        return ['title' => 'N/A', 'description' => 'N/A'];
    }

    $doc = new DOMDocument();
    @$doc->loadHTML($html);

    $title = $doc->getElementsByTagName('title');
    $title = $title->item(0) ? $title->item(0)->nodeValue : 'N/A';

    $description = 'N/A';
    $metas = $doc->getElementsByTagName('meta');
    for ($i = 0; $i < $metas->length; $i++) {
        $meta = $metas->item($i);
        if ($meta->getAttribute('name') == 'description') {
            $description = $meta->getAttribute('content');
            break;
        }
    }

    return ['title' => $title, 'description' => $description];
}
function fetch_url_content($url)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36');

    $html = curl_exec($ch);
    curl_close($ch);

    return $html;
}
$input_urls = str_replace(["\r\n", "\r"], "\n", $_POST['urls']);
$urls = explode("\n", trim($input_urls));

$results = [];
foreach ($urls as $url) {
    $results[] = array_merge(['url' => trim($url)], get_title_and_description($url));
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Extracted Data</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Extracted Data</h1>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">URL</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
             </tr>
        </thead>
        <tbody>
        <?php foreach ($results as $result): ?>
            <tr>
                <td><?= htmlspecialchars($result['url']) ?></td>
                <td><?= htmlspecialchars($result['title']) ?></td>
                <td><?= htmlspecialchars($result['description']) ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>