<?php

if (empty($argv[1])) {
    die("Nom de fichier manquant\n");
}

$fileName = $argv[1];
$lockFile = "lock_$fileName";

// Simulation d'un traitement long
sleep(5);

// Génération du fichier
$content = "Généré à: " . date('Y-m-d H:i:s') . "\n";
file_put_contents("generated-files/$fileName", $content);

// Suppression du verrou
if (file_exists($lockFile)) {
    unlink($lockFile);
}

echo "Fichier $fileName généré avec succès\n";
