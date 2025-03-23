
<?php
// Plik konfiguracyjny połączenia z bazą danych (przykładowy, nie funkcjonalny)
// W rzeczywistej implementacji należy uzupełnić dane dostępowe do bazy MySQL

// Dane dostępowe do bazy
$db_host = 'localhost';     // Adres hosta bazy danych
$db_name = 'maciejewski';   // Nazwa bazy danych
$db_user = 'username';      // Nazwa użytkownika
$db_pass = 'password';      // Hasło użytkownika

// Inicjalizacja połączenia
try {
    $pdo = new PDO(
        "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4",
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
    
    // Opcjonalne ustawienie kodowania znaków
    $pdo->exec("SET NAMES utf8mb4");
    
} catch (PDOException $e) {
    // W trybie produkcyjnym zamiast wyświetlania błędu, należy go zalogować
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

// Funkcje pomocnicze do obsługi bazy danych

/**
 * Bezpieczne wykonanie zapytania SELECT i zwrócenie pojedynczego wiersza
 * 
 * @param string $sql Zapytanie SQL
 * @param array $params Parametry do zapytania
 * @return array|null Wiersz danych lub null jeśli nie znaleziono
 */
function db_get_row($sql, $params = []) {
    global $pdo;
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch();
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return null;
    }
}

/**
 * Bezpieczne wykonanie zapytania SELECT i zwrócenie wszystkich wierszy
 * 
 * @param string $sql Zapytanie SQL
 * @param array $params Parametry do zapytania
 * @return array Tablica wierszy
 */
function db_get_all($sql, $params = []) {
    global $pdo;
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return [];
    }
}

/**
 * Bezpieczne wykonanie zapytania INSERT
 * 
 * @param string $table Nazwa tabeli
 * @param array $data Dane do wstawienia (kolumna => wartość)
 * @return int|null ID ostatnio wstawionego wiersza lub null w przypadku błędu
 */
function db_insert($table, $data) {
    global $pdo;
    
    $columns = implode(', ', array_keys($data));
    $placeholders = implode(', ', array_fill(0, count($data), '?'));
    
    $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array_values($data));
        return $pdo->lastInsertId();
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return null;
    }
}

/**
 * Bezpieczne wykonanie zapytania UPDATE
 * 
 * @param string $table Nazwa tabeli
 * @param array $data Dane do aktualizacji (kolumna => wartość)
 * @param string $where Warunek WHERE
 * @param array $params Parametry do warunku WHERE
 * @return bool Czy operacja się powiodła
 */
function db_update($table, $data, $where, $params = []) {
    global $pdo;
    
    $set = [];
    foreach ($data as $column => $value) {
        $set[] = "$column = ?";
    }
    
    $sql = "UPDATE $table SET " . implode(', ', $set) . " WHERE $where";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array_merge(array_values($data), $params));
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return false;
    }
}

/**
 * Bezpieczne wykonanie zapytania DELETE
 * 
 * @param string $table Nazwa tabeli
 * @param string $where Warunek WHERE
 * @param array $params Parametry do warunku WHERE
 * @return bool Czy operacja się powiodła
 */
function db_delete($table, $where, $params = []) {
    global $pdo;
    
    $sql = "DELETE FROM $table WHERE $where";
    
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return false;
    }
}

/**
 * Rozpoczęcie transakcji
 * 
 * @return bool Czy operacja się powiodła
 */
function db_begin_transaction() {
    global $pdo;
    return $pdo->beginTransaction();
}

/**
 * Zatwierdzenie transakcji
 * 
 * @return bool Czy operacja się powiodła
 */
function db_commit() {
    global $pdo;
    return $pdo->commit();
}

/**
 * Cofnięcie transakcji
 * 
 * @return bool Czy operacja się powiodła
 */
function db_rollback() {
    global $pdo;
    return $pdo->rollBack();
}
