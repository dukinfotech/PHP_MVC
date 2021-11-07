<?php
    namespace Core;
    use Core\Exception;

    class BaseModel
    {
        protected $conn = null;
        protected $table = null;

        public function __construct() {
            try {
                $this->conn = new \PDO(\DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
            } catch (\Exception $e) {
                new Exception($e->getCode(), $e->getMessage());
            }
        }

        public function all()
        {
            $sql = 'SELECT * FROM '.$this->table;

            $command = $this->conn->prepare($sql);
            $command->execute();

            $rows = $command->fetchAll();
            return $rows;
        }
    }