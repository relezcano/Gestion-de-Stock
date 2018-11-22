<?
class MyDB extends SQLite3
{
    function __construct()
    {
        $this->open('../db/SC_database.db');
    }
}

$db = new MyDB();

?>
