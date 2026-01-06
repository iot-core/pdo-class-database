
<?php
declare(strict_types=1);

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
    /**
     * Database connection parameters.
     */
    private array $connectionParams = [
        'type'     => 'mysql',
        'host'     => null,
        'username' => null,
        'password' => null,
        'dbname'   => null,
        'port'     => null,
        'charset'  => 'utf8mb4'
    ];

    /**
     * Whether to use FOR UPDATE lock in SELECT queries.
     */
    private bool $forUpdate = false;

    /**
     * Dynamic type list for GROUP BY clause.
     */
    private array $groupBy = [];

    /**
     * Array holding HAVING conditions.
     */
    private array $having = [];

    /**
     * Static instance of the class (Singleton pattern).
     */
    private static ?PdoDbs $instance = null;

    /**
     * Indicates whether the current object is a subquery.
     */
    private bool $isSubQuery = false;

    /**
     * Array holding JOIN conditions.
     */
    private array $join = [];

    /**
     * Last error information.
     */
    private ?array $lastError = null;

    /**
     * Last error code.
     */
    private string|int|null $lastErrorCode = '';

    /**
     * Auto-increment column ID.
     */
    private string|int|null $lastInsertId = null;

    /**
     * Last executed SQL query.
     */
    private string $lastQuery = '';

    /**
     * LOCK IN SHARE MODE flag for SELECT queries.
     */
    private bool $lockInShareMode = false;

    /**
     * ORDER BY clause.
     */
    private array $orderBy = [];

    /**
     * Bound parameters.
     */
    private array $params = [];

    /**
     * PDO object.
     */
    private ?PDO $pdo = null;

    /**
     * Database table prefix.
     */
    private string $prefix = '';

    /**
     * Query string.
     */
    private string $query = '';

    /**
     * Query options (SQL_CALC_FOUND_ROWS etc.).
     */
    private array $queryOptions = [];

    /**
     * Query type (SELECT, INSERT, UPDATE, DELETE).
     */
    private string $queryType = '';

    /**
     * Return type of results.
     */
    private int $returnType = PDO::FETCH_ASSOC;

    /**
     * Number of affected rows.
     */
    private int $rowCount = 0;

    /**
     * Transaction flag.
     */
    private bool $transaction = false;

    /**
     * Total row count (when withTotalCount is used).
     */
    public int $totalCount = 0;

    /**
     * Total page count (for pagination scenarios).
     */
    public int $totalPages = 0;

    /**
     * Columns to update when using onDuplicate method.
     */
    protected ?array $updateColumns = null;

    /**
     * Option to use generator (yield) in get() and rawQuery methods.
     */
    private bool $useGenerator = false;

    /**
     * Array holding WHERE conditions.
     */
    private array $where = [];

    /**
     * SQL_CALC_FOUND_ROWS flag.
     */
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
     * Helper method to build WHERE/HAVING conditions.
     */
    private function buildCondition(string $operator, array $conditions): void
    {
        // ...
    }

    /**
     * Builds insert/update data pairs.
     */
    private function buildDataPairs(array $tableData, array $tableColumns, bool $isInsert): void
    {
        // ...
    }

    /**
     * Builds GROUP BY clause.
     */
    protected function buildGroupBy(): void
    {
        // ...
    }

    /**
     * Builds INSERT query.
     */
    private function buildInsert(string $tableName, array $insertData, string $operation): int|bool
    {
        // ...
    }

    /**
     * Builds LIMIT clause.
     */
    protected function _buildLimit(int|array|null $numRows): void
    {
        // ...
    }

    /**
     * Builds JOIN clause.
     */
    private function buildJoin(): void
    {
        // ...
    }

    /**
     * LIMIT alias.
     */
    private function buildLimit(int|array|null $numRows): void
    {
        // ...
    }

    /**
     * Builds ON DUPLICATE KEY UPDATE clause.
     */
    protected function buildOnDuplicate(?array $tableData = null): void
    {
        // ...
    }

    /**
     * Builds ORDER BY clause.
     */
    private function buildOrderBy(): void
    {
        // ...
    }

    /**
     * Builds value and parameter pair.
     */
    private function buildPair(string $operator, mixed $value): string
    {
        // ...
    }

    /**
     * Builds main query.
     */
    private function buildQuery(int|array|null $numRows, ?array $tableData = null): PDOStatement|bool|null
    {
        // ...
    }

    /**
     * Returns result (Array or Generator).
     */
    private function buildResult(PDOStatement $stmt): array|Generator
    {
        // ...
    }

    /**
     * Returns result using Generator (yield).
     */
    private function buildResultGenerator(PDOStatement $stmt): Generator
    {
        // ...
    }

    /**
     * Checks transaction status and rolls back if error occurs.
     */
    public function checkTransactionStatus(): void
    {
        // ...
    }

    /**
     * Begin transaction.
     */
    public function beginTransaction(): bool
    {
        // ...
    }

    /**
     * Commit transaction.
     */
    public function commit(): bool
    {
        // ...
    }

    /**
     * Rollback transaction.
     */
    public function rollBack(): bool
    {
        // ...
    }

    /**
     * Create savepoint.
     */
    public function savepoint(string $name): bool
    {
        // ...
    }

    /**
     * Rollback to savepoint.
     */
    public function rollbackTo(string $name): bool
    {
        // ...
    }

    /**
     * Establish database connection.
     */
    public function connect(): void
    {
        // ...
    }

    /**
     * Create a copy of the object (excluding connection).
     */
    public function copy(): self
    {
        // ...
    }

    /**
     * Decrement expression.
     */
    public function dec(int|float $num = 1): array
    {
        // ...
    }

    /**
     * Delete data (DELETE).
     */
    public function delete(string $tableName, int|array|null $numRows = null): bool
    {
        // ...
    }

    /**
     * Determine value type.
     */
    private function determineType(mixed $item): int
    {
        // ...
    }

    /**
     * Escape value (PDO::quote).
     */
    public function escape(mixed $value): string
    {
        // ...
    }

    /**
     * Use SQL function.
     */
    public function func(string $expr, ?array $bindParams = null): array
    {
        // ...
    }

    /**
     * Fetch data (SELECT).
     */
    public function get(string $tableName, int|array|null $numRows = null, string|array $columns = '*'): array|Generator|null
    {
        // ...
    }

    /**
     * Fetch single row.
     */
    public function getOne(string $tableName, string|array $columns = '*'): mixed
    {
        // ...
    }

    /**
     * Fetch data with lazy loading (Generator).
     */
    public function getLazy(string $tableName, int|array|null $numRows = null, string|array $columns = '*'): Generator
    {
        // ...
    }

    /**
     * Execute raw SQL query (SELECT).
     *
     * @param string $query SQL query
     * @param array $params Parameters
     * @return array|bool Rows or false if failed
     */
    public function rawQuery(string $query, array $params = []    /**
     * Singleton instance.
     */
    public static function getInstance(): ?PdoDbs
    {
        return self::$instance;
    }

    /**
     * Get last error.
     */
    public function getLastError(): ?array
    {
        if (!$this->pdo) return ["Database connection not available."];
        return $this->lastError;
    }

    /**
     * Get last error code.
     */
    public function getLastErrorCode(): string|int|null
    {
        return $this->lastErrorCode;
    }

    /**
     * Get last insert ID.
     */
    public function getLastInsertId(): string|int|false
    {
        if (!$this->pdo()) throw new Exception("Database connection could not be established.");
        return $this->pdo()->lastInsertId();
    }

    /**
     * Last executed query.
     */
    public function getLastQuery(): string
    {
        return $this->lastQuery;
    }

    /**
     * Get number of affected rows.
     */
    public function getRowCount(): int
    {
        return $this->rowCount;
    }

    /**
     * Reset query state.
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
     */
    private function prepare(): ?PDOStatement
    {
        if (!$this->pdo()) throw new Exception("Database connection could not be established.");
        return $this->pdo()->prepare($this->query);
    }

    /**
     * Get table name with prefix.
     */
    private function getTableName(string $table): string
    {
        return !empty($this->prefix) ? $this->prefix . $table : $table;
    }

    /**
     * Set table prefix.
     */
    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }

    /**
     * Get subquery details.
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
