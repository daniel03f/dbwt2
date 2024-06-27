<?php
namespace App\Http\Controllers;
//dirname geht basically ne ebene höher idk
require dirname(__DIR__, 3) . '/vendor/autoload.php';


/**
 * Diese Klasse regelt die Anwendung <-> Broadcaster Kommunikation
 * Also hier öffnen wir die Verbindung, behalten sie aufrecht und können hier dem Broadcaster durch Opcodes kontrollieren
 * und damit Nachrichten an die Clients verschicken lassen
 */
class WebSocketApplicationController
{
    public function sendMaintenanceMessage($msg): void{
        \Ratchet\Client\connect('ws://localhost:8081/maintenance')->then(function($conn) use ($msg) {
            $conn->send($msg);
            $conn->close();
        }, function ($e) {
            echo "Could not connect: {$e->getMessage()}\n";
        });
    }

    public function sendArticleSoldMessage($msg): void{
        \Ratchet\Client\connect('ws://localhost:8081/articleSold')->then(function($conn) use ($msg) {
            $conn->send($msg);
            $conn->close();
        }, function ($e) {
            echo "Could not connect: {$e->getMessage()}\n";
        });
    }

    public function sendArticleOnSaleMessage($msg): void{
        \Ratchet\Client\connect('ws://localhost:8081/articleOnSale')->then(function($conn) use ($msg) {
            $conn->send($msg);
            $conn->close();
        }, function ($e) {
            echo "Could not connect: {$e->getMessage()}\n";
        });
    }
}
