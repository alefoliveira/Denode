<?php
class StatusData {
	public static $tabela = "status";


	public function StatusData(){
		$this->NOME_PERFUSU = "";
		$this->SOBRENOME_PERFUSU = "";
		$this->EMAIL_PERFUSU = "";
		$this->SENHA_PERFUSU = "";
		$this->DURACAO_ATIPLA = "NOW()";
	}

	public function add(){
		$sql = "insert into status (name) ";
		$sql .= "value (\"$this->name\")";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tabela." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tabela." where id=$this->id";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tabela." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tabela." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new StatusData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tabela;
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tabela." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new StatusData());
	}


}

?>