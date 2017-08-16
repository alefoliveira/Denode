<?php
class ExercicioData {
	public static $tabela = "exercicios_plat";
	public function ExercicioData(){
		$this->title = "";
		$this->email = "";
		$this->image = "";
		$this->password = "";
		$this->is_public = "0";
		$this->DURACAO_ATIPLA = "NOW()";
	}


	public function add(){
		$sql = "insert into ".self::$tabela." (TITULO_EXERPLAT) ";
		$sql .= "value (\"$this->TITULO_EXERPLAT\")";
		Executor::doit($sql);
	}

	public static function delById($ID_EXERPLAT){
		$sql = "delete from ".self::$tabela." where ID_EXERPLAT=$ID_EXERPLAT";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tabela." where ID_EXERPLAT=$this->ID_EXERPLAT";
		Executor::doit($sql);
	}

	public function update_active(){
		$sql = "update ".self::$tabela." set last_active_at=NOW() where ID_EXERPLAT=$this->ID_EXERPLAT";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tabela." set TITULO_EXERPLAT=\"$this->TITULO_EXERPLAT\" where ID_EXERPLAT=$this->ID_EXERPLAT";
		Executor::doit($sql);
	}

	public static function getById($ID_EXERPLAT){
		$sql = "select * from ".self::$tabela." where ID_EXERPLAT=$ID_EXERPLAT";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ExercicioData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tabela;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExercicioData());
	}

	public static function getAllActive(){
		$sql = "select * from client where last_active_at>=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExercicioData());
	}

	public static function getAllUnActive(){
		$sql = "select * from client where last_active_at<=date_sub(NOW(),interval 3 second)";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExercicioData());
	}


	public function getUnreads(){ return MessageData::getUnreadsByClientId($this->ID_EXERPLAT); }


	public static function getLike($q){
		$sql = "select * from ".self::$tabela." where title like '%$q%' or email like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ExercicioData());
	}


}

?>