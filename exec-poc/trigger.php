<?php

$fileName = $argv[1] ?? 'default.txt';
$lockFile = "lock_$fileName";

// Vérifier si le fichier existe déjà
if (file_exists("generated-files/$fileName")) {
    echo "Fichier déjà existant!\n";
    exit;
}

// Vérifier le verrou
if (file_exists($lockFile)) {
    echo "Traitement déjà en cours!\n";
    exit;
}

// Créer un verrou
file_put_contents($lockFile, time());

// Lancer le traitement en arrière-plan
$command = sprintf(
    "php generate-file.php %s > /dev/null 2>&1 &",
    escapeshellarg($fileName)
);

exec($command);

echo "Traitement démarré pour $fileName\n";
