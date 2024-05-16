<?php 
// Citim conținutul fișierului HTML care conține datele JSON-LD
$sursa = file_get_contents("http://localhost/meci/proiect_RO/sursa.html");

// Cautăm conținutul JSON-LD folosind o expresie regulată
$model = '/<script type="application\/ld\+json">(.*?)<\/script>/s';
preg_match($model, $sursa, $potriviri);

// Verificăm dacă am găsit conținut JSON-LD și îl returnăm
if (isset($potriviri[1])) {
    $continut_json_ld = $potriviri[1];
    header('Content-Type: application/json');
    echo $continut_json_ld;
} else {
    // Dacă nu am găsit conținut JSON-LD, returnăm un mesaj de eroare
    http_response_code(500);
    echo json_encode(array("eroare" => "Nu am putut găsi conținutul JSON-LD în fișierul sursainitiala.html"));
}
?>
