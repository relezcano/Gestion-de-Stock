<?php

class MyDB extends SQLite3 {
  function __construct() {

    $this->open('SC_database.db');
  }
}

$db = new MyDB();

?>
