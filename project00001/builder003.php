<?php
	// this sample of builder design pattern create a string that compatible with SQL syntax from user values
	// for example create "SELECT name, family FROM users WHERE name = 'amin' AND age > 14"
	// with this command : 
	//    echo $obj -> select('users',['name','family'])->where('name','amin')->where('age',14,'>')->getSQL();
	class MYSQLBUILDER {
		public $query;
		public function reset(){
			$this -> query = new stdclass;
		}
		public function select($table,$fields = ['*']){
			$this->reset();
			$this->query->type = "select";
			$this->query->base = "SELECT " . implode(', ', $fields) . " FROM " . $table;
			return $this;
		}
		// INSERT INTO users () VALUES ();
		public function insert($table,$fields,$values){
			$this->reset();
			$this->query->type = "insert";
			$this->query->base = "INSERT INTO " . $table . " ( " . implode(", ",$fields) .
			" ) VALUES ( " . implode(", ",$values) . " )";
			return $this;
		}
		public function where ($field,$value,$operand = "=") {
			if(!in_array($this->query->type, ['select','delete','update'])){
				echo "WHERE section not applied for this type of SQL ( " . $this -> query -> type . " ) <br>"  ;
				return $this;
			}
			$this->query->where[] = " $field $operand $value "; 
			return $this;
		}
		public function getSQL (){
			$query = $this->query->base;
			if(!empty($this->query->where)){
				$query .= " WHERE " . implode(" AND ", $this->query->where) . " ;";
			}
			return $query;			
		}
	}
	$obj = new MYSQLBUILDER;
	echo $obj -> select('users')->where('name','amin')->where('age',14,'>')->getSQL();
	echo "<hr>";
	echo $obj ->insert('users', ['name','family','age'], ['behrang','raadmanesh',12] )->where('id',10)->getSQL();
	echo "<hr>";
	echo $obj ->insert('users',['name','family','age'],['behrang','raadmanesh',12])->getSQL();
?>		