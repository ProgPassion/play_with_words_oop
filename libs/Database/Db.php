<?php

    require_once 'database.inc.php';

    class Db {

        private static $instance = null;
        private $connection;
        private $cols = [];
        private $vals = [];
        private $placeholders = [];

        private function __construct($dbparams) {
            try {
                $dns = 'mysql:host=' . $dbparams["host"] . ";dbname=" . $dbparams["db"];
                $this->connection = new PDO($dns, $dbparams["user"], $dbparams["pass"]);
            }
            catch(PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br>";
                die();
            }
            
        }

        public static function init($dbparams) {
            if(self::$instance == null)
                self::$instance = new Db($dbparams);
            
            return self::$instance;
        }
        
        public function query($sql, $bind = []) {

            if(!is_array($bind)) {
                $bind = array($bind);
            }

            $stmt = $this->connection->prepare($sql);
            $stmt->execute($bind);
            return $stmt;
        }

        public function selectAll($table, $where = []) {
            $stmt = $this->_select([], $table, $where);
            return $stmt->fetchAll();
        }

        public function select($tableColumns = [], $table, $where = []) {
            $stmt = $this->_select($tableColumns, $table, $where);
            return $stmt->fetchAll();
        }

        public function selectRow($tableColumns = [], $table, $where = []) {
            $stmt = $this->_select($tableColumns, $table, $where);
            return $stmt->fetch();
        }

        public function selectOne($tableColumns = [], $table, $where = []) {
            $stmt = $this->_select($tableColumns, $table, $where);
            return $stmt->fetchColumn(0);
        }

        public function insert($table, $bind) {
            $this->_separatePlaceholdersColsAndVals($bind);
            $sql = "INSERT INTO {$table}(" . implode(", ", $this->cols) . ")";
            $sql .= "VALUES(" . implode(",", $this->placeholders) . ")";

            $stmt = $this->query($sql, $this->vals);
            $result = $stmt->rowCount();
            return $result;
        }

        public function update($table, $bind = [], $where = []) {
            $this->_separatePlaceholdersColsAndVals($bind);
            $sql = "UPDATE {$table} SET ";
            foreach($this->cols as $key => $col) {
                $sql .= $col . " = " . $this->placeholders[$key] . ", ";
            }
            $sql = substr($sql, 0, -2);
            $this->cols = [];
            $sql .= $this->_prepareWhereQueryPart($where);
            
            $stmt = $this->query($sql, $this->vals);
            $result = $stmt->rowCount();
            return $result;
        }

        private function _select($tableColumns, $table, $where) {
            
            $sql = "SELECT ";
            if(is_array($tableColumns) && count($tableColumns) > 0) 
                $sql .= implode(", ", $tableColumns);
            else 
                $sql .= "* ";

            $sql .= " FROM ${table}";
            $sql .= $this->_prepareWhereQueryPart($where);
            $stmt = $this->query($sql, $this->vals);
            return $stmt;
        }

        private function _prepareWhereQueryPart($filterArray) {
            
            $sql = "";
            if(is_array($filterArray) && count($filterArray) > 0) {
                $sql .= " WHERE ";
                
                $this->_separatePlaceholdersColsAndVals($filterArray);
                for($i = 0; $i < count($this->cols); $i++) {
                    $sql .= "{$this->cols[$i]} = ? AND ";
                }
                $sql = substr($sql, 0, -5);
            }
            return $sql;
        }

        private function _separatePlaceholdersColsAndVals($bindingArray) {

            foreach($bindingArray as $key => $val) {
                $this->cols[] = $key;
                $this->vals[] = $val;
                $this->placeholders[] = '?';
            }
        }

    }

