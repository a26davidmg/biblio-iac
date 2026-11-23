<?php
declare(strict_types=1);

// ---------------------------------------------------------------
// Configuración da conexión coa base de datos.
// O contrasinal pode chegar de dúas formas:
//   - DB_PASSWORD_FILE: ruta a un ficheiro co contrasinal (segredos de Compose)
//   - DB_PASSWORD:      o contrasinal directamente (menos seguro)
// ---------------------------------------------------------------

function configuracion_bd(): array
{
    $contrasinal = getenv('DB_PASSWORD');
    $ficheiro    = getenv('DB_PASSWORD_FILE');

    if ($ficheiro !== false && $ficheiro !== '') {
        $lido = @file_get_contents($ficheiro);
        $contrasinal = $lido === false ? false : trim($lido);
    }

    return [
        'DB_HOST'     => getenv('DB_HOST'),
        'DB_NAME'     => getenv('DB_NAME'),
        'DB_USER'     => getenv('DB_USER'),
        'DB_PASSWORD' => $contrasinal,
    ];
}

function conectar_bd(array $config): PDO
{
    return new PDO(
        "mysql:host={$config['DB_HOST']};dbname={$config['DB_NAME']};charset=utf8mb4",
        $config['DB_USER'],
        $config['DB_PASSWORD'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_TIMEOUT => 3]
    );
}
