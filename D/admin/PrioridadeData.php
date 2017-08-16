<?php
class PrioridadeData {
	public static $tabela = "prioridade_plat";
	public function PrioridadeData(){
		$this->title = "";
		$this->EMAIL_PERFUSU = "";
		$this->image = "";
		$this->password = "";
		$this->is_public = "0";
		$this->DURACAO_ATIPLA = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tabela." (name,SOBRENOME_PERFUSU,gender,day_of_birth,address,phone,EMAIL_PERFUSU,sick,medicaments,alergy,DURACAO_ATIPLA) ";
		$sql .= "value (\"$this->name\",\"$this->SOBRENOME_PERFUSU\",\"$this->gender\",\"$this->day_of_birth\",\"$this->address\",\"$this->phone\",\"$this->NOME_PERFUSU\",\"$this->sick\",\"$this->medicaments\",\"$this->alergy\",$this->DURACAO_ATIPLA)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tabela." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tabela." where id=$this->id";
		Executor::doit($sql);
	}


	public function update_active(){
		$sql = "update ".self::$tabela." set last_active_at=NOW() where id=$this->id";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tabela." set name=\"$this->name\",SOBRENOME_PERFUSU=\"$this->SOBRENOME_PERFUSU\",address=\"$this->address\",phone=\"$this->phone\",EMAIL_PERFUSU=\"$this->EMAIL_PERFUSU\",gender=\"$this->gender\",day_of_birth=\"$this->day_of_birth\",sick=\"$this->sick\",medicaments=\"$this->medicaments\",alergy=\"$this->alergy\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tabela." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PrioridadeData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tabela;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PrioridadeData());
	}




	public static function getLike($q){
		$sql = "select * from ".self::$tabela." where title like '%$q%' or email like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PrioridadeData());
	}


}

?>