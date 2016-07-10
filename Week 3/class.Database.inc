<?php

/**
 * Jami Schwarzwalder
 * 7/9/16
 *
 * MySQLi database; only one connection is allowed. 
 *
 */
 
class Database {
  private $_connection;
  // We will retrieve one instance.
  private static $_instance;
  
  /**
   * Return one instance of the Database.
   * @return Database 
   */
  public static function getInstance() {
    if (!self::$_instance) {
      self::$_instance = new self();
    }
    return self::$_instance;
  }
  
  /**
   * Constructor 
   */
  public function __construct() {
    $this->_connection = new mysqli('localhost', 'sandbox', 'sandbox', 'sandbox');
    // Catch Error
    if (mysqli_connect_error()) {
      trigger_error('Failed to connect to MySQL: ' . mysqli_connect_error(), E_USER_ERROR);
    }
  }
  
  /**
   * Empty clone magic method to prevent duplication. 
   */
  private function __clone() {}
  
  /**
   * Get the mysqli connection. 
   */
  public function getConnection() {
    return $this->_connection;
  }
}