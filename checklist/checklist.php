<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];

    $result = [];

 // SSL check
$ssl_check_url = 'https://' . preg_replace('#^https?://#', '', $url);
$ssl_context = stream_context_create(['ssl' => ['capture_peer_cert' => true]]);
@$ssl_stream = stream_socket_client('ssl://' . parse_url($ssl_check_url, PHP_URL_HOST) . ':443', $ssl_error_number, $ssl_error_string, 30, STREAM_CLIENT_CONNECT, $ssl_context);

if ($ssl_stream !== false && $ssl_error_number === 0) {
    $ssl_params = stream_context_get_params($ssl_stream);
    if ($ssl_params['options']['ssl']['peer_certificate'] !== null) {
        $result['ssl_status'] = [
            'text' => 'Active',
            'class' => 'checked',
        ];
    } else {
        $result['ssl_status'] = [
            'text' => 'Not Active',
            'class' => 'not-checked',
        ];
    }
} else {
    $result['ssl_status'] = [
        'text' => 'Not Active',
        'class' => 'not-checked',
    ];
}

    // Google Analytics check
    $html = file_get_contents($url);
    $analyticsRegex = "/(UA-\d{4,10}-\d{1,4})/i";
    if (preg_match($analyticsRegex, $html, $matches)) {
        $result['ga_status'] = [
            'text' => 'Active',
            'class' => 'checked',
        ];
    } else {
        $result['ga_status'] = [
            'text' => 'Not Active',
            'class' => 'not-checked',
        ];
    }

// Check if the website redirects to one preferred version
$trimmed_url = preg_replace('#^https?://(www\.)?#', '', $url);
$trimmed_url = rtrim($trimmed_url, '/');

$versions = [
    'http://' . $trimmed_url,
    'https://' . $trimmed_url,
    'http://www.' . $trimmed_url,
    'https://www.' . $trimmed_url,
];

$status_codes = [];

foreach ($versions as $version) {
    $headers = @get_headers($version);
    $status_code = ($headers !== false) ? intval(substr($headers[0], 9, 3)) : 0;
    $status_codes[] = [
        'url' => $version,
        'status_code' => $status_code,
    ];
}

$result['version_status_codes'] = $status_codes;
    echo json_encode($result);
}