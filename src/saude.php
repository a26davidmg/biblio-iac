<?php
declare(strict_types=1);

// ---------------------------------------------------------------
// Comprobación de saúde da aplicación.
// Devolve 200 "ok" se a web pode consultar a base de datos
// e 503 se non pode. Úsaa o healthcheck de Docker Compose.
// ---------------------------------------------------------------

require __DIR__ . '/config.php';

header('Content-Type: text/plain; charset=utf-8');

try {
    conectar_bd(configuracion_bd())->query('SELECT 1 FROM libros LIMIT 1');
    echo "ok\n";
} catch (Throwable $e) {
    http_response_code(503);
    echo "erro\n";
}
