<?php
class UsuarioData {
	public static $tabela = "perfil_usuario";

	public function UsuarioData(){
		$this->NOME_PERFUSU = "";
		$this->SOBRENOME_PERFUSU = "";
		$this->IDADE_PERFUSU = "";
		$this->CPF_PERFUSU = "";
		$this->SENHA_PERFUSU = "";
		$this->ATIVO_PERFUSU = "1";
		$this->DURACAO_ATIPLA = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tabela." (NOME_PERFUSU,SOBRENOME_PERFUSU,IDADE_PERFUSU,EMAIL_PERFUSU,CPF_PERFUSU,SENHA_PERFUSU,ATIVO_PERFUSU,TIPO_PERFUSU,DURACAO_ATIPLA) ";
		$sql .= "value (\"$this->NOME_PERFUSU\",\"$this->SOBRENOME_PERFUSU\",\"$this->IDADE_PERFUSU\",\"$this->EMAIL_PERFUSU\",\"$this->CPF_PERFUSU\",\"$this->SENHA_PERFUSU\",$this->ATIVO_PERFUSU,$this->TIPO_PERFUSU,$this->DURACAO_ATIPLA)";
		Executor::doit($sql);
	}

	public static function delById($ID_PERFUSU){
		$sql = "delete from ".self::$tabela." where ID_PERFUSU=$ID_PERFUSU";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tabela." where ID_PERFUSU=$this->ID_PERFUSU";
		Executor::doit($sql);
	}

	public function update(){
		$sql = "update ".self::$tabela." set NOME_PERFUSU=\"$this->NOME_PERFUSU\",EMAIL_PERFUSU=\"$this->EMAIL_PERFUSU\",SOBRENOME_PERFUSU=\"$this->SOBRENOME_PERFUSU\",IDADE_PERFUSU=\"$this->IDADE_PERFUSU\",CPF_PERFUSU=\"$this->CPF_PERFUSU\",ATIVO_PERFUSU=$this->ATIVO_PERFUSU,TIPO_PERFUSU=$this->TIPO_PERFUSU where ID_PERFUSU=$this->ID_PERFUSU";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tabela." set SENHA_PERFUSU=\"$this->SENHA_PERFUSU\" where ID_PERFUSU=$this->ID_PERFUSU";
		Executor::doit($sql);
	}

	public static function getById($ID_PERFUSU){
		$sql = "select * from ".self::$tabela." where ID_PERFUSU=$ID_PERFUSU";
		$query = Executor::doit($sql);
		return Model::one($query[0],new UsuarioData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tabela." order by DURACAO_ATIPLA desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UsuarioData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tabela." where TITULO_ATIPLA like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new UsuarioData());
	}


}

?>