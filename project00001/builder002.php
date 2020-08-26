<?php
	class MysqlQueryBuilder {
		protected $query;
		protected function reset() 	{
			$this->query = new \stdClass;
		}
		public function select(string $table, array $fields) {
			$this->reset();
			$this->query->base = "SELECT ". implode(", ", $fields) . " FROM " . $table;
			//print_r($this->query->base);
			$this->query->type = 'select';
			return $this;
		}
		public function where(string $field, string $value, string $operator = '=') {
			if (!in_array($this->query->type, ['select', 'update', 'delete'])){
				return false;
			}
			$this->query->where[] = "$field $operator '$value'";
			return $this;
		}
		public function getSQL(){
			$query = $this->query;
			$sql = $query->base;
			if(!empty($query->where)){
				$sql .= " WHERE " . implode(' AND ', $query->where);
			}
			$sql .= ";";
			return $sql;
		}
	}
	function clientCode(MysqlQueryBuilder $queryBuilder){
		// $query = $queryBuilder->select('users', ['email', 'username'])->getSQL();
		$query = $queryBuilder->select('users', ['email'])->where("id", 1, ">")->getSQL();
		//$query = $queryBuilder->select('users', ['email'])->where('id', 1)->getSQL();
        echo $query;
	}
	clientCode(new MysqlQueryBuilder);
?>