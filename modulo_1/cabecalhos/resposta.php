<?php
if (!isset($_SERVER['HTTP_ACCEOT'])) {
    echo '<html>
            <body>
                <h1>Hello World!</h1>
            </body>
        </html>';
} else {
    $accept = $_SERVER['HTTP_ACCEPT'];

    if (strpos($accept, 'application/json') !== false) {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Hello World!']);
    } elseif (strpos($accept, 'application/xml') !== false) {
        header('Content-Type: application/xml');
        echo '<?xml version="1.0" encoding="UTF-8"?><message>Hello World!</message>';
    } else {
        echo '<html><body><h1>Hello World!</h1></body></html>';
    }
}
?>