
<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use IoT\Database\PdoDbs;

final class PdoDbsTest extends TestCase
{
    private PdoDbs $db;

    protected function setUp(): void
    {
        // Use SQLite in-memory DB for testing
        $config = [
            'type'   => 'sqlite',
            'dbname' => ':memory:'
        ];
        $this->db = new PdoDbs($config);
        $this->db->connect();

        // Create a sample table
        $this->db->rawQuery("CREATE TABLE users (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            username TEXT,
            email TEXT
        )");
    }

    public function testConnection(): void
    {
        $this->assertInstanceOf(PdoDbs::class, $this->db);
    }

    public function testInsertAndGet(): void
    {
        $id = $this->db->insert('users', [
            'username' => 'testuser',
            'email'    => 'test@example.com'
        ]);

        $this->assertIsInt($id);

        $user = $this->db->getOne('users', ['id', 'username', 'email']);
        $this->assertEquals('testuser', $user['username']);
        $this->assertEquals('test@example.com', $user['email']);
    }

    public function testDelete(): void
    {
        $id = $this->db->insert('users', [
            'username' => 'deleteuser',
            'email'    => 'delete@example.com'
        ]);

        $this->assertTrue($this->db->delete('users'));
    }

    public function testTransaction(): void
    {
        $this->db->beginTransaction();
        $id = $this->db->insert('users', [
            'username' => 'txuser',
            'email'    => 'tx@example.com'
        ]);
        $this->db->rollBack();

        $user = $this->db->getOne('users', ['id', 'username', 'email']);
        $this->assertNull($user);
    }
}
