<?php

require_once 'vendor/autoload.php';

$options = new \NatsStreaming\ConnectionOptions();
$options->setClientID("testc");
$options->setClusterID("test-cluster");
$natsOption = new \Nats\ConnectionOptions([
    'port' => '4222',
    'host' => 'nats-streaming'
]);
$options->setNatsOptions($natsOption);
$c = new \NatsStreaming\Connection($options);

$c->connect();

for($x=0; $x < 4; $x++){
    $r = $c->publish('special.subject'.$x , 'some serialized payload...');
    $gotAck = $r->wait();
    if (!$gotAck) {
        echo 'ok';
    }
}
$c->close();
