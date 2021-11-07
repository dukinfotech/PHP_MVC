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
                new Exception($e->getMessage(), $e->getCode());
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
        
        public function store($data = []) {
            $sql = 'INSERT INTO '.$this->table.' (';
            foreach ($data as $key => $value) {
                $sql .= $key . ', ';
            }
            $sql = trim($sql, ', ');
            $sql .= ') VALUES (';
            foreach ($data as $key => $value) {
                $sql .= ':' . $key . ', ';
            }
            $sql = trim($sql, ', ');
            $sql .= ');';
            
            $data2 = [];
            foreach ($data as $key => $value) {
                $data2[':'.$key] = $value;
            }
            
            $command = $this->conn->prepare($sql);
            return $command->execute($data2);
        }

        public function findOne($data = [])
        {
            $sql = 'SELECT * FROM '.$this->table.' WHERE ';

            foreach ($data as $key => $value) {
                $sql .= $key . '=:' . $key . ' AND ';
            }
            $sql = trim($sql, ' AND');
            $sql .= ' LIMIT 1';

            $data2 = [];
            foreach ($data as $key => $value) {
                $data2[':'.$key] = $value;
            }
            
            $command = $this->conn->prepare($sql);
            $command->execute($data2);

            $row = $command->fetch();
            return $row;
        }
    }