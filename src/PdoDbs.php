<?php
declare(strict_types=1);

/**
 * IoTCore\Database Namespace
 *
 * Bu namespace altında PDO tabanlı veritabanı işlemleri için geliştirilmiş sınıflar bulunur.
 * Amaç: CRUD, transaction, batch ve query builder desteği sağlayan hafif ve framework bağımsız bir yapı.
 *
 * @package IoTCore\Database
 */

namespace IoTCore\Database;

use PDO;
use PDOStatement;
use Generator;
use Exception;

/**
 * PdoDbs Class
 *
 * Advanced wrapper class for database operations using PDO (PHP Data Objects).
 * Provides simplified handling for database connection, CRUD operations,
 * transaction management, batch operations, and query building.
 *
 * Compatible with PHP 8.1+
 *
 * @author   iot-core <iotcore@hotmail.com>
 * @license  GNU General Public License v3.0 or later (GPL-3.0+)
 * @link     https://github.com/iot-core/pdo-dbs
 */
class PdoDbs
{
    /** @var array Database connection parameters. */
    private array $connectionParams = [
        'type'     => 'mysql',
        'host'     => null,
        'username' => null,
        'password' => null,
        'dbname'   => null,
        'port'     => null,
        'charset'  => 'utf8mb4'
    ];

    /** @var bool Whether to use FOR UPDATE lock in SELECT queries. */
    private bool $forUpdate = false;

    /** @var array Dynamic type list for GROUP BY clause. */
    private array $groupBy = [];

    /** @var array Array holding HAVING conditions. */
    private array $having = [];

    /** @var ?PdoDbs Singleton instance of the class. */
    private static ?PdoDbs $instance = null;

    /** @var bool Indicates whether the current object is a subquery. */
    private bool $isSubQuery = false;

    /** @var array Array holding JOIN conditions. */
    private array $join = [];

    /** @var ?array Last error information. */
    private ?array $lastError = null;

    /** @var string|int|null Last error code. */
    private string|int|null $lastErrorCode = '';

    /** @var string|int|null Auto-increment column ID. */
    private string|int|null $lastInsertId = null;

    /** @var string Last executed SQL query. */
    private string $lastQuery = '';

    /** @var bool LOCK IN SHARE MODE flag for SELECT queries. */
    private bool $lockInShareMode = false;

    /** @var array ORDER BY clause. */
    private array $orderBy = [];

    /** @var array Bound parameters. */
    private array $params = [];

    /** @var ?PDO PDO object. */
    private ?PDO $pdo = null;

    /** @var string Database table prefix. */
    private string $prefix = '';

    /** @var string Query string. */
    private string $query = '';

    /** @var array Query options (SQL_CALC_FOUND_ROWS etc.). */
    private array $queryOptions = [];

    /** @var string Query type (SELECT, INSERT, UPDATE, DELETE). */
    private string $queryType = '';

    /** @var int Return type of results. */
    private int $returnType = PDO::FETCH_ASSOC;

    /** @var int Number of affected rows. */
    private int $rowCount = 0;

    /** @var bool Transaction flag. */
    private bool $transaction = false;

    /** @var int Total row count (when withTotalCount is used). */
    public int $totalCount = 0;

    /** @var int Total page count (for pagination scenarios). */
    public int $totalPages = 0;

    /** @var ?array Columns to update when using onDuplicate method. */
    protected ?array $updateColumns = null;

    /** @var bool Option to use generator (yield) in get() and rawQuery methods. */
    private bool $useGenerator = false;

    /** @var array Array holding WHERE conditions. */
    private array $where = [];

    /** @var bool SQL_CALC_FOUND_ROWS flag. */
    private bool $withTotalCount = false;

    /**
     * Constructor method.
     *
     * @param string|array|object $type Connection type, parameter array or PDO object.
     * @param string|null $host
     * @param string|null $username
     * @param string|null $password
     * @param string|null $dbname
     * @param int|null $port
     * @param string|null $charset
     */
    public function __construct(
        string|array|object $type,
        ?string $host = null,
        ?string $username = null,
        ?string $password = null,
        ?string $dbname = null,
        ?int $port = null,
        ?string $charset = null
    ) {
        // ...
    }

    /**
     * Build WHERE/HAVING conditions.
     *
     * @param string $operator SQL operator (AND/OR).
     * @param array $conditions Conditions array.
     */
    private function buildCondition(string $operator, array $conditions): void { /* ... */ }

    /** Build insert/update data pairs. */
    private function buildDataPairs(array $tableData, array $tableColumns, bool $isInsert): void { /* ... */ }

    /** Build GROUP BY clause. */
    protected function buildGroupBy(): void { /* ... */ }

    /** Build INSERT query. */
    private function buildInsert(string $tableName, array $insertData, string $operation): int|bool { /* ... */ }

    /** Build LIMIT clause. */
    protected function _buildLimit(int|array|null $numRows): void { /* ... */ }

    /** Build JOIN clause. */
    private function buildJoin(): void { /* ... */ }

    /** Build LIMIT alias. */
    private function buildLimit(int|array|null $numRows): void { /* ... */ }

    /** Build ON DUPLICATE KEY UPDATE clause. */
    protected function buildOnDuplicate(?array $tableData = null): void { /* ... */ }

    /** Build ORDER BY clause. */
    private function buildOrderBy(): void { /* ... */ }

    /** Build value and parameter pair. */
    private function buildPair(string $operator, mixed $value): string { /* ... */ }

    /** Build main query. */
    private function buildQuery(int|array|null $numRows, ?array $tableData = null): PDOStatement|bool|null { /* ... */ }

    /** Return result (Array or Generator). */
    private function buildResult(PDOStatement $stmt): array|Generator { /* ... */ }

    /** Return result using Generator (yield). */
    private function buildResultGenerator(PDOStatement $stmt): Generator { /* ... */ }

    /** Check transaction status and roll back if error occurs. */
    public function checkTransactionStatus(): void { /* ... */ }

    /** Begin transaction. */
    public function beginTransaction(): bool { /* ... */ }

    /** Commit transaction. */
    public function commit(): bool { /* ... */ }

    /** Rollback transaction. */
    public function rollBack(): bool { /* ... */ }

    /** Create savepoint. */
    public function savepoint(string $name): bool { /* ... */ }

    /** Rollback to savepoint. */
    public function rollbackTo(string $name): bool { /* ... */ }

    /** Establish database connection. */
    public function connect(): void { /* ... */ }

    /** Create a copy of the object (excluding connection). */
    public function copy(): self { /* ... */ }

    /** Decrement expression. */
    public function dec(int|float $num = 1): array { /* ... */ }

    /** Delete data (DELETE). */
    public function delete(string $tableName, int|array|null $numRows = null): bool { /* ... */ }

    /** Determine value type. */
    private function determineType(mixed $item): int { /* ... */ }

    /** Escape value (PDO::quote). */
    public function escape(mixed $value): string { /* ... */ }

    /** Use SQL function. */
    public function func(string $expr, ?array $bindParams = null): array { /* ... */ }

    /** Fetch data (SELECT). */
    public function get(string $tableName, int|array|null $numRows = null, string|array $columns = '*'): array|Generator|null { /* ... */ }

    /** Fetch single row. */
    public function getOne(string $tableName, string|array $columns = '*'): mixed { /* ... */ }

    /** Fetch data with lazy loading (Generator). */
    public function getLazy(string $tableName, int|array|null $numRows = null, string|array $columns = '*'): Generator { /* ... */ }

    /** Execute raw SQL query (SELECT). */
    public function rawQuery(string $query, array $params = []): array|bool { /* ... */ }

       /**
     * Singleton instance getter.
     *
     * @return ?PdoDbs Returns the static instance if available.
     */
    public static function getInstance(): ?PdoDbs
    {
        return self::$instance;
    }

    /**
     * Get last error message(s).
     *
     * @return ?array Returns array of error messages or null if none.
     */
    public function getLastError(): ?array
    {
        if (!$this->pdo) return ["Database connection not available."];
        return $this->lastError;
    }

    /**
     * Get last error code.
     *
     * @return string|int|null Error code or null if none.
     */
    public function getLastErrorCode(): string|int|null
    {
        return $this->lastErrorCode;
    }

    /**
     * Get last inserted ID.
     *
     * @return string|int|false Returns last insert ID or false if unavailable.
     * @throws Exception If PDO connection is not established.
     */
    public function getLastInsertId(): string|int|false
    {
        if (!$this->pdo) throw new Exception("Database connection could not be established.");
        return $this->pdo->lastInsertId();
    }

    /**
     * Get last executed SQL query.
     *
     * @return string SQL query string.
     */
    public function getLastQuery(): string
    {
        return $this->lastQuery;
    }

    /**
     * Get number of affected rows.
     *
     * @return int Number of rows affected by last query.
     */
    public function getRowCount(): int
    {
        return $this->rowCount;
    }

    /**
     * Reset query state.
     *
     * Clears query string, parameters, options, and temporary flags.
     */
    private function reset(): void
    {
        $this->query = '';
        $this->params = [];
        $this->queryOptions = [];
        $this->queryType = '';
        $this->where = [];
        $this->having = [];
        $this->join = [];
        $this->groupBy = [];
        $this->orderBy = [];
        $this->updateColumns = null;
        $this->forUpdate = false;
        $this->lockInShareMode = false;
        $this->withTotalCount = false;
    }

    /**
     * Prepare PDO statement.
     *
     * @return ?PDOStatement Prepared statement or null if failed.
     * @throws Exception If PDO connection is not established.
     */
    private function prepare(): ?PDOStatement
    {
        if (!$this->pdo) throw new Exception("Database connection could not be established.");
        return $this->pdo->prepare($this->query);
    }

    /**
     * Get table name with prefix.
     *
     * @param string $table Table name.
     * @return string Prefixed table name.
     */
    private function getTableName(string $table): string
    {
        return !empty($this->prefix) ? $this->prefix . $table : $table;
    }

    /**
     * Set table prefix.
     *
     * @param string $prefix Prefix string.
     */
    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }

    /**
     * Get subquery details.
     *
     * @return ?array Returns subquery details (query, params, alias) or null if not a subquery.
     */
    public function getSubQuery(): ?array
    {
        if ($this->isSubQuery) {
            return [
                'query' => $this->query,
                'params' => $this->params,
                'alias' => ''
            ];
        }
        return null;
    }
}
