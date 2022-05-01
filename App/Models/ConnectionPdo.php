<?php
    namespace App\Models;

    use App\Models\connectionInfo as C;

    class ConnectionPdo {

        public static function connectionDb () {
            $connPdo = new \PDO(constant(C::class.'::DBDRIVER').':host='.constant(C::class.'::DBHOST').';dbname='.constant(C::class.'::DBNAME').';charset=utf8', constant(C::class.'::DBUSER'),constant(C::class.'::DBPASS'));

            return $connPdo;
        }
    }

?>