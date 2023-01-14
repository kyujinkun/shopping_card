<?php
namespace src\inc;

class connection
{
  public $host;
  public $user_name;
  public $password;
  public $db_name;
  public $table_name;
  public $pdo;

  public function __construct(
    $host = 'localhost',
    $user_name = 'root',
    $password = '',
    $db_name = 'shopping_card',
    $table_name = 'products'
  )
  {
    $this->host = $host;
    $this->user_name = $user_name;
    $this->password = $password;
    $this->db_name = $db_name;
    $this->table_name = $table_name;

    // create connection
    try {
      $this->pdo = new \PDO(
        "mysql:host=$host;dbname=$db_name",
        $user_name,
        $password,
        [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ]
      );
    } catch (\PDOException $e) {
      die(print_r($e->getMessage(), true));
    }
  }
}