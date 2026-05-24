<?php
class Database
{
    private $pdo;

    public function __construct()
    {
        $host = getenv('DB_HOST') ?: '127.0.0.1';
        $port = getenv('DB_PORT') ?: '3306';
        $name = getenv('DB_NAME') ?: 'sendthesong';
        $user = getenv('DB_USER') ?: 'root';
        $pass = getenv('DB_PASS') ?: '';

        $dsn = "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4";

        try {
            $this->pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            $this->pdo = null;
        }
    }

    public function getLatestMessages($limit = 8)
    {
        if (!$this->pdo) {
            return [];
        }

        try {
            $stmt = $this->pdo->prepare(
                'SELECT id, to_name, message, spotify_track_name, spotify_artist, spotify_album_art
                 FROM messages
                 ORDER BY created_at DESC
                 LIMIT :limit'
            );
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            return [];
        }
    }
}

$db = new Database();
