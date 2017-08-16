<?php
class SessaoData {
	public static $tabela = "sessao_plat";


	public function SessaoData(){
		$this->NOME_PERFUSU = "";
		$this->SOBRENOME_PERFUSU = "";
		$this->EMAIL_PERFUSU = "";
		$this->SENHA_PERFUSU = "";
		$this->DURACAO_ATIPLA = "NOW()";
	}

	public function add(){
		$sql = "insert into sessao_plat (ID_EMP) ";
		$sql .= "value (\"$this->ID_EMP\")";
		return Executor::doit($sql);
	}

	public static function delById($ID_SESPLA){
		$sql = "delete from ".self::$tabela." where ID_SESPLA=$ID_SESPLA";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tabela." where ID_SESPLA=$this->ID_SESPLA";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tabela." set ID_EMP=\"$this->ID_EMP\" where ID_SESPLA=$this->ID_SESPLA";
		Executor::doit($sql);
	}

	public static function getById($ID_SESPLA){
		$sql = "select * from ".self::$tabela." where ID_SESPLA=$ID_SESPLA";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SessaoData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tabela;
		$query = Executor::doit($sql);
		return Model::many($query[0],new SessaoData());

	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tabela." where ID_EMP like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SessaoData());
	}


}

?>