<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .domain-list {
            max-height: 200px;
            overflow-y: auto;
        }
    </style>
    <title>Filtered Domains</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Filtered Domains</h1>
        <?php
        $input_domains = str_replace(["\r\n", "\r"], "\n", $_POST['domains']);
        $domains = explode("\n", trim($input_domains));
        $filtered_domains = [
            'com' => [],
            'net' => [],
            'org' => [],
            'co' => [],
            'xyz' => [],
            'in' => [],
            'pk' => [],
            'fr' => [],
            'it' => [],
            'info' => [],
            'uk' => [],
            'ru' => [],
            'de' => [],
            'es' => [],
            'jp' => [],
            'online' => [],
            'others' => [],
        ];

        foreach ($domains as $domain) {
            $domain = trim($domain);
            $ext = pathinfo($domain, PATHINFO_EXTENSION);
            if (isset($filtered_domains[$ext])) {
                $filtered_domains[$ext][] = $domain;
            } else {
                $filtered_domains['others'][] = $domain;
            }
        }
        ?>

        <div class="row">
            <?php foreach ($filtered_domains as $extension => $domain_list): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center position-relative">
                            <?= '.' . $extension ?>
                            <button class="btn btn-sm btn-secondary copy-btn" data-domains="<?= htmlspecialchars(implode("\n", $domain_list)) ?>">Copy</button>
                        </div>
                        <ul class="list-group list-group-flush domain-list">
                            <?php foreach ($domain_list as $domain): ?>
                                <li class="list-group-item"><?= $domain ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        document.querySelectorAll('.copy-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const text = this.getAttribute('data-domains');
                copyToClipboard(text, this);
            });
        });

        function copyToClipboard(text, button) {
            const textarea = document.createElement('textarea');
            textarea.value = text;
            document.body.appendChild(textarea);
            textarea.select();
            document.execCommand('copy');
            document.body.removeChild(textarea);

        }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>