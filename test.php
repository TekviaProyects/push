<?php

use Minishlink\WebPush\WebPush;

// array of notifications
$notifications = array(
    array(
        'endpoint' => 'https://updates.push.services.mozilla.com/push/abc...', // Firefox 43+
        'payload' => 'hello !',
        'userPublicKey' => 'BH3TMwGCS6KvYIgjG9cPckhPSS-JlDJH9UiThdXyOuEKCU4qF_u-ujabrLnti1wZ2xMjmV8ZUsvwyxPYF3iwlb4', // base 64 encoded, should be 88 chars
        'userAuthToken' => 'CxVX6QsVToEGEcjfYPqXQw==', // base 64 encoded, should be 24 chars
    ), array(
        'endpoint' => 'https://android.googleapis.com/gcm/send/abcdef...', // Chrome
        'payload' => null,
        'userPublicKey' => 'BH3TMwGCS6KvYIgjG9cPckhPSS-JlDJH9UiThdXyOuEKCU4qF_u-ujabrLnti1wZ2xMjmV8ZUsvwyxPYF3iwlb4',
        'userAuthToken' => null,
    ), array(
        'endpoint' => 'https://example.com/other/endpoint/of/another/vendor/abcdef...',
        'payload' => '{msg:"test"}',
        'userPublicKey' => 'BH3TMwGCS6KvYIgjG9cPckhPSS-JlDJH9UiThdXyOuEKCU4qF_u-ujabrLnti1wZ2xMjmV8ZUsvwyxPYF3iwlb4', 
        'userAuthToken' => '(stringOf24Chars)',
    ),
);

$webPush = new WebPush();

// send multiple notifications with payload
foreach ($notifications as $notification) {
    $webPush->sendNotification(
        $notification['endpoint'],
        $notification['payload'], // optional (defaults null)
        $notification['userPublicKey'], // optional (defaults null)
        $notification['userAuthToken'] // optional (defaults null)
    );
}
$webPush->flush();

// send one notification and flush directly
$webPush->sendNotification(
    $notifications[0]['endpoint'],
    $notifications[0]['payload'], // optional (defaults null)
    $notifications[0]['userPublicKey'], // optional (defaults null)
    $notifications[0]['userAuthToken'], // optional (defaults null)
    true // optional (defaults false)
);