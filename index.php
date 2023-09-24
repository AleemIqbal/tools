<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <style>
        /* Custom styles */
        .header {
            background-color: #f8f9fa;
            padding: 20px 0;
            border-bottom: 1px solid #dee2e6;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            border-top: 1px solid #dee2e6;
        }
        .card {
            transition: 0.3s;
            overflow: hidden;
            position: relative;
        }
        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card .card-body {
    position: relative;
    z-index: 1;
}
        .card.card-1 .card-body i {
            color: #ff7f50;
        }
        .card.card-2 .card-body i {
            color: #9370db;
        }
        .card.card-3 .card-body i {
            color: #3cb371;
        }
        /* Add different background colors to each card */
        .col:nth-child(1) .card::before {
            background-color: rgba(255, 127, 80, 0.1);
        }
        .col:nth-child(2) .card::before {
            background-color: rgba(147, 112, 219, 0.1);
        }
        .col:nth-child(3) .card::before {
            background-color: rgba(60, 179, 113, 0.1);
        }
        .col:nth-child(4) .card::before {
            background-color: rgba(0, 191, 255, 0.1);
        }
        .col:nth-child(5) .card::before {
            background-color: rgba(255, 20, 147, 0.1);
        }
        .col:nth-child(6) .card::before {
            background-color: rgba(218, 165, 32, 0.1);
        }
        .col:nth-child(7) .card::before {
            background-color: rgba(106, 90, 205, 0.1);
        }
        .col:nth-child(8) .card::before {
            background-color: rgba(255, 0, 0, 0.1);
        }
        .col:nth-child(9) .card::before {
            background-color: rgba(75, 0, 130, 0.1);
        }
        .col:nth-child(10) .card::before {
    background-color: rgba(0, 0, 255, 0.1);
        }
        .col:nth-child(11) .card::before {
            background-color: rgba(255, 165, 0, 0.1);
        }
        .col:nth-child(12) .card::before {
            background-color: rgba(128, 128, 128, 0.1);
        }
        /* Half-filled color background */
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 50%;
            transition: 0.3s;
        }
        /* Move background on hover */
        .card:hover::before {
            bottom: 0;
        }
        /* Colorful icons */
        .col:nth-child(1) .card-body i {
            color: #ff7f50;
        }
        .col:nth-child(2) .card-body i {
            color: #9370db;
        }
        .col:nth-child(3) .card-body i {
            color: #3cb371;
        }
        /* Water flow hover effect */
        @keyframes waterflow {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(5px);
            }
            100% {
                transform: translateY(0);
            }
        }
        .card:hover .card-body i {
            animation: waterflow 1s infinite;
        }
    </style>
    <title>Tools Homepage</title>
</head>
<body>
    <header class="header">
        <div class="container">
        </div>
    </header>

    <main class="container mt-5">
                <h1 class="text-center">Big Techie's SEO Tools</h1><br>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            $tools = [
                ['name' => 'FAQ Schema Generator', 'url' => '/tools/faq-schema-generator/', 'icon' => 'fas fa-question-circle'],
                ['name' => 'Schema Combiner', 'url' => '/tools/schema-combiner/', 'icon' => 'fas fa-code'],
                ['name' => 'FAQ Rankmath Block Converter', 'url' => '/tools/rankmath-faq-block-generator/', 'icon' => 'fas fa-exchange-alt'],
                    ['name' => 'Itemlist Schema Generator', 'url' => '/tools/itemlist-generator/', 'icon' => 'fas fa-list'],
                ['name' => 'ChatGPT Keyword Sentence Generator', 'url' => '/tools/chatgpt-prompt-generator/', 'icon' => 'fas fa-comments'],
                ['name' => 'ChatGPT Prompts', 'url' => '/tools/prompts/', 'icon' => 'fas fa-comment-dots'],
                ['name' => 'Meta Title,Description Extractor', 'url' => '/tools/meta-extractor/', 'icon' => 'fas fa-link'],
                ['name' => 'Ultimate URL Editor', 'url' => '/tools/url-editor/', 'icon' => 'fas fa-edit'],
                ['name' => 'SERP Bold Extractor', 'url' => '/tools/google-bold-extractor/', 'icon' => 'fas fa-search'],
                ['name' => 'Source Keyword Checker', 'url' => '/tools/source-keyword-checker/', 'icon' => 'fas fa-file-code'],
                ['name' => 'Domains Separater', 'url' => '/tools/domain-separater/', 'icon' => 'fas fa-globe'],
                ['name' => 'Bot Viewer', 'url' => '/tools/bot-viewer/', 'icon' => 'fas fa-eye'],
 ['name' => 'Ultimate Text Editor', 'url' => '/tools/text-editor/', 'icon' => 'fas fa-file-alt'],
  ['name' => 'Entities Extractor', 'url' => '/tools/entities-extractor/', 'icon' => 'fas fa-chart-pie'],
                ['name' => 'SEO Report', 'url' => '/tools/checklist/', 'icon' => 'fas fa-chart-line']
            ];
            ?>
            <?php foreach ($tools as $tool): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="<?= $tool['icon'] ?> fa-3x mb-3"></i>
                            <h5 class="card-title"><?= $tool['name'] ?></h5>
                            <a href="<?= $tool['url'] ?>" class="btn btn-primary">Go to Tool</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Our Chrome Extensions -->
        <h2 class="text-center mt-5">Our Chrome Extensions</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            $chrome_extensions = [
                ['name' => 'On Page Keyword Checker', 'url' => 'https://github.com/AleemIqbal/keyword-checker-extension/archive/refs/heads/main.zip', 'download' => 'https://chrome.google.com/webstore/detail/keyword-checker/plndmgedaicbgmocifcjmimognpdnhjf', 'icon' => 'fas fa-check-circle'],
                ['name' => 'Image Extractor', 'url' => 'https://github.com/AleemIqbal/image-extractor-extension/archive/refs/heads/main.zip' , 'download' => 'https://chrome.google.com/webstore/detail/image-extractor/aenndgkopjmlkcbaohiolnlcfacniknc/related', 'icon' => 'fas fa-image'],
                ['name' => 'Google Bold Extractor', 'url' => 'https://github.com/AleemIqbal/bold-extractor-extension/archive/refs/heads/main.zip', 'download' => 'https://chrome.google.com/webstore/detail/google-bold-extractor/iihdimlicacgcnignahdlbmefffoejma', 'icon' => 'fas fa-bold'],
            ];
            ?>
           <?php foreach ($chrome_extensions as $chrome_extension): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="<?= $chrome_extension['icon'] ?> fa-3x mb-3"></i>
                            <h5 class="card-title"><?= $chrome_extension['name'] ?></h5>
                            <a href="<?= $chrome_extension['download'] ?>" class="btn btn-primary">Download</a>
                            <a href="<?= $chrome_extension['url'] ?>" class="btn btn-primary">Source Code</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Wordpress Plugins -->
        <h2 class="text-center mt-5">Wordpress Plugins</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            $wordpress_plugins = [
                ['name' => 'Crawl Optimization', 'url' => 'https://wordpress.org/plugins/crawl-optimization/', 'icon' => 'fas fa-cogs'],
                ['name' => 'Robots.txt Optimizer', 'url' => 'https://wordpress.org/plugins/advanced-robots-txt-optimizer-editor/', 'icon' => 'fas fa-robot'],
                ['name' => 'Htaccess Optimizer', 'url' => 'https://wordpress.org/plugins/advanced-htaccess-optimizer-editor/', 'icon' => 'fas fa-file-code'],
                ['name' => 'Fix Missing Woocommerce Alt Text', 'url' => 'https://github.com/AleemIqbal/woocommerce-missing-alt-text/archive/refs/heads/main.zip', 'icon' => 'fas fa-shopping-cart'],
                ['name' => 'Ultimate Crawl Optimizer', 'url' => 'https://github.com/AleemIqbal/ultimate-crawl-optimizer/archive/refs/heads/main.zip', 'icon' => 'fas fa-spider'],
['name' => 'Show Category Posts', 'url' => 'https://github.com/AleemIqbal/category-posts-shortcode/archive/refs/heads/main.zip', 'icon' => 'fas fa-list-alt'],
            ];
            ?>
           <?php foreach ($wordpress_plugins as $wordpress_plugin): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="<?= $wordpress_plugin['icon'] ?> fa-3x mb-3"></i>
                            <h5 class="card-title"><?= $wordpress_plugin['name'] ?></h5>
                            <a href="<?= $wordpress_plugin['url'] ?>" class="btn btn-primary">Download</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- Our Themes -->
        <h2 class="text-center mt-5">Our Themes</h2>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            $themes = [
                ['name' => 'Free Affiliatepress', 'url' => 'https://www.bigtechies.com/affiliatepress_free.zip', 'icon' => 'fas fa-laptop-code'],
                ['name' => 'Affiliatedpress', 'url' => '#', 'icon' => 'fas fa-laptop'],
        ];
        ?>
           <?php foreach ($themes as $theme): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="<?= $theme['icon'] ?> fa-3x mb-3"></i>
                            <h5 class="card-title"><?= $theme['name'] ?></h5>
                            <a href="<?= $theme['url'] ?>" class="btn btn-primary">Download</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
    
    <!-- Programs -->
    <h2 class="text-center mt-5">Programs</h2>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <?php
        $programs = [
            ['name' => 'Universal SEO Tool', 'url' => 'https://www.bigtechies.com/USEOTool.zip', 'icon' => 'fas fa-globe'],
            ['name' => 'Universal Proxy Tool', 'url' => 'https://www.bigtechies.com/UProxyTool.zip', 'icon' => 'fas fa-shield-alt'],
            ['name' => 'Affiliate Page Designer', 'url' => 'https://www.bigtechies.com/UAffiliateDesigner.zip', 'icon' => 'fas fa-palette'],
            ['name' => 'Linked In Email Extractor', 'url' => 'https://www.bigtechies.com/LinkedInEmailExtractor.zip', 'icon' => 'fas fa-envelope'],
        ];
        ?>
           <?php foreach ($programs as $program): ?>
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="<?= $program['icon'] ?> fa-3x mb-3"></i>
                            <h5 class="card-title"><?= $program['name'] ?></h5>
                            <a href="<?= $program['url'] ?>" class="btn btn-primary">Download</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
    </div>
    
    </main>
<footer class="footer mt-auto">
    <div class="container">
        <p class="text-center mb-0">&copy; <?= date('Y') ?> My Tools. All rights reserved.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>