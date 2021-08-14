<?php
/**
 * Resolve database query with wpdb class
 *
 * @package Brocooly
 * @since 0.11.0
 */

declare(strict_types=1);

namespace Brocooly\Support\Builders;

use wpdb;

class DBQueryBuilder
{

	/**
	 * WordPress wpdb object
	 *
	 * @var object
	 */
	private wpdb $db;

	/**
	 * Database table prefix
	 *
	 * @var string
	 */
	private string $prefix;

	/**
	 * Table name for query
	 *
	 * @var string
	 */
	private $table;

	/**
	 * Query params
	 *
	 * @var array
	 */
	private array $clauses;

	/**
	 * Order by
	 *
	 * @var string
	 */
	private string $orderBy = '';

	public function __construct(){
		global $wpdb;

		$this->db     = $wpdb;
		$this->prefix = $this->db->prefix;
	}

	/**
	 * Define table to work with
	 *
	 * @param string  $tableName | table name.
	 * @param boolean $withPrefix | prefix table or not.
	 * @return self
	 */
	public function table( string $tableName, bool $withPrefix = true ) {
		$tableName   = esc_sql( $tableName );
		$this->table = $withPrefix ? $this->prefix . $tableName : $tableName;
		return $this;
	}

	/**
	 * WHERE clause for SQL query
	 * ! Should be called once
	 *
	 * @param string  $key | key for WHERE clause.
	 * @param string  $value | value of the key for WHERE clause.
	 * @param string  $sign | sign to compare key and value.
	 * @param boolean $not | NOT clause.
	 * @return self
	 */
	public function where( $key, $value, $sign = '=', $not = false ) {
		[ $key, $value, $sign, $not ] = $this->sanitizeClause( $key, $value, $sign, $not );

		$start = $not ? 'NOT ' : '';

		$this->clauses[] = "$start $key $sign '$value'";
		return $this;
	}

	/**
	 * AND WHERE clause for SQL query
	 *
	 * @param string  $key | key for WHERE clause.
	 * @param string  $value | value of the key for WHERE clause.
	 * @param string  $sign | sign to compare key and value.
	 * @param boolean $not | NOT clause.
	 * @return self
	 */
	public function andWhere( $key, $value, $sign = '=', $not = false ) {
		[ $key, $value, $sign, $not ] = $this->sanitizeClause( $key, $value, $sign, $not );

		$start = $not ? 'NOT ' : '';

		$this->clauses[] = "AND $start $key $sign '$value'";
		return $this;
	}

	/**
	 * OR WHERE clause for SQL query
	 *
	 * @param string  $key | key for WHERE clause.
	 * @param string  $value | value of the key for WHERE clause.
	 * @param string  $sign | sign to compare key and value.
	 * @param boolean $not | NOT clause.
	 * @return self
	 */
	public function orWhere( $key, $value, $sign = '=', $not = false ) {
		[ $key, $value, $sign, $not ] = $this->sanitizeClause( $key, $value, $sign, $not );

		$start = $not ? 'NOT ' : '';

		$this->clauses[] = "OR $start $key $sign '$value'";
		return $this;
	}

	/**
	 * Sanitize WHERE clause for query
	 *
	 * @param string $key | key for WHERE clause.
	 * @param string $value | value of the key for WHERE clause.
	 * @param string $sign | sign to compare key and value.
	 * @param boolean $not | NOT clause.
	 * @return array
	 */
	private function sanitizeClause( ...$keys ) {
		$arrayToSanitize = [ ...$keys ];
		$sanitizedArray  = array_map( 'esc_sql', $arrayToSanitize );
		return $sanitizedArray;
	}

	/**
	 * Convert WHERE to string
	 *
	 * @return string
	 */
	private function getWhereClauseString() {
		$where = implode( ' ', $this->clauses );
		return $where;
	}

	/**
	 * Order query by key.
	 *
	 * @param string $orderBy | key to sort.
	 * @return string
	 */
	public function orderBy( string $orderBy ) {
		$orderBy       = $this->sanitizeClause( $orderBy );
		$this->orderBy = "ORDER BY $orderBy";
		return $this;
	}

	/**
	 * Get database query results
	 *
	 * @param string $columnKey | columns to get from query.
	 * @return array
	 */
	public function get( $columnKey = '*' ) {
		$select = esc_sql( $columnKey );
		$where  = $this->getWhereClauseString();

		return $this->sql( $select, $where );
	}

	/**
	 * Get database query results
	 *
	 * @param string $columnKey | columns to get from query.
	 * @return array
	 */
	public function first( $columnKey = '*' ) {
		$select = esc_sql( $columnKey );
		$where  = $this->getWhereClauseString();

		return $this->sql( $select, $where, 'get_row' );
	}

	/**
	 * SQL query
	 *
	 * @param string $select | select query.
	 * @param string $where | where clause.
	 * @param string $tableQuery | table query name.
	 * @return mixed
	 */
	private function sql( $select, $where, $tableQuery = 'get_results' ) {
		$query = $this->db->$tableQuery(
			"SELECT $select FROM {$this->table} WHERE $where {$this->orderBy}"
		);
		return $query;
	}
}
