# Changelog

All notable changes to this project will be documented in this file.  
This project adheres to [Semantic Versioning](https://semver.org/).

---

## [v1.0.0] - 2026-01-06
### Added
- Initial release of ** PDO Class Database, A modern, lightweight, and secure PDO wrapper for PHP databases**
- Core `PdoDbs` class with advanced PDO wrapper functionality
- Database connection management with configurable parameters
- CRUD operations (SELECT, INSERT, UPDATE, DELETE)
- Transaction support (begin, commit, rollback, savepoint, rollbackTo)
- Batch operations and query builder (WHERE, JOIN, GROUP BY, HAVING, ORDER BY)
- Lazy loading with Generators
- Raw SQL execution (`rawQuery`)
- On Duplicate Key Update support
- Error handling and logging (`getLastError`, `getLastErrorCode`)
- Utility methods (`escape`, `func`, `dec`, `copy`)

---

## [Unreleased]
### Planned
- Extended support for multiple database drivers (SQLite, PostgreSQL, etc.)
- More advanced query builder features (subqueries, unions)
- Integration tests and CI/CD pipeline
- Performance optimizations and caching layer
