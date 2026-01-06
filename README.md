# ⚡ PDO DB
PDO DB is a modern, lightweight, and framework-agnostic PHP database library designed to simplify database interactions.  
It provides a unified and consistent API across multiple platforms including MySQL, MariaDB, PostgreSQL, SQLite, Microsoft SQL Server (MSSQL), and Oracle.  
With built-in support for CRUD operations, transactions, prepared statements, and query building, PDOdb helps developers write secure, portable, and maintainable code with ease. 

![PHP Version](https://img.shields.io/badge/PHP-8.1%2B-777bb4.svg)
![Latest Version](https://img.shields.io/github/v/release/iot-core/pdo-class-database?color=brightgreen)
![Tests](https://img.shields.io/badge/tests-PHPUnit-success.svg)
![PHPStan](https://img.shields.io/badge/PHPStan-Level%208-blue.svg)
![Coverage](https://img.shields.io/codecov/c/github/iot-core/pdo-class-database)
![License](https://img.shields.io/badge/license-GPL--3.0-blue.svg)
![Downloads](https://img.shields.io/packagist/dt/iot-core/pdo-class-database)
![GitHub Stars](https://img.shields.io/github/stars/iot-core/pdo-class-database?style=social) 


## ✨ Features
- Simplified database connection management
- CRUD operations (SELECT, INSERT, UPDATE, DELETE)
- Transaction support (begin, commit, rollback, savepoint)
- Batch operations
- Query builder with WHERE, JOIN, GROUP BY, HAVING, ORDER BY
- Lazy loading with Generators
- Raw SQL execution
- On Duplicate Key Update support

## 📦 Installation
Install via Composer:

```bash
composer require iot-core/pdo-class-database


⚡ Usage Example

require 'vendor/autoload.php';

use IoT\Database\PdoDbs;

// Connection config
$config = [
    'type'     => 'mysql',
    'host'     => '127.0.0.1',
    'username' => 'root',
    'password' => 'secret',
    'dbname'   => 'test_db',
    'port'     => 3306,
    'charset'  => 'utf8mb4'
];

// Initialize
$db = new PdoDbs($config);

// SELECT example
$users = $db->get('users', 10, ['id', 'username', 'email']);
print_r($users);

// INSERT example
$newId = $db->insert('users', [
    'username' => 'newuser',
    'email'    => 'newuser@example.com'
]);
echo "Inserted ID: " . $newId;

🔧 Configuration
You can manage multiple connections via a config file:

return [
    'default' => 'mysql_main',
    'connections' => [
        'mysql_main' => [
            'type'     => 'mysql',
            'host'     => '127.0.0.1',
            'username' => 'root',
            'password' => 'secret',
            'dbname'   => 'my_database',
            'port'     => 3306,
            'charset'  => 'utf8mb4',
            'prefix'   => 'app_'
        ],
        'pgsql_reporting' => [
            'type'     => 'pgsql',
            'host'     => '127.0.0.1',
            'username' => 'report_user',
            'password' => 'report_pass',
            'dbname'   => 'reporting_db',
            'port'     => 5432,
            'charset'  => 'utf8'
        ]
    ]
];

🧪 Tests
Run unit tests with PHPUnit:
vendor/bin/phpunit

📜 License
GNU General Public License v3.0 or later (GPL-3.0+).
See LICENSE file for details.

👤 Author: iot-core
📧 Email: iotcore@hotmail.com
