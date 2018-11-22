<?php

class MyDB extends SQLite3 {

  function __construct($url) {

      $this->open("$url/SC_database.db");

  }

}

?>
