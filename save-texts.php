<?php
// Erlaubt CORS-Anfragen von jeder Origin. NUR FÜR LOKALE ENTWICKLUNG NUTZEN!
// Für Produktivumgebungen spezifische Origins festlegen.
header("Access-Control-Allow-Origin: https://bingo.bytemike.de");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$data = file_get_contents('php://input');
$payload = json_decode($data, true);

if (json_last_error() === JSON_ERROR_NONE) {
    // Texte speichern, falls im Payload vorhanden
    if (isset($payload['texts'])) {
        $textsToSave = $payload['texts'];
        file_put_contents('bingo-texts.json', json_encode($textsToSave, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    // Konfiguration speichern, falls im Payload vorhanden
    if (isset($payload['config'])) {
        $configToSave = $payload['config'];
        file_put_contents('config.json', json_encode($configToSave, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid JSON received']);
}
?>
