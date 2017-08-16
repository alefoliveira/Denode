<?php
class AtividadeData {
	public static $tabela = "atividades_plat";


	public function AtividadeData(){
		$this->NOME_PERFUSU = "";
		$this->SOBRENOME_PERFUSU = "";
		$this->EMAIL_PERFUSU = "";
		$this->SENHA_PERFUSU = "";
		$this->DURACAO_ATIPLA = "NOW()";
	}

	public function getProject(){ return ExercicioData::getById($this->EXERCICIOS_ID_PLAT); }
	public function getprioridade_plat(){ return PrioridadeData::getById($this->PRIORIDADE_PLAT_ID); }
	public function getStatus(){ return StatusData::getById($this->STATUS_ID); }
	public function getTIPO_PERFUSU(){ return TipoData::getById($this->TIPO_PERFUSU_id); }
	public function getCategory(){ return SessaoData::getById($this->SESSAO_ID_PLAT); }

	public function add(){
		$sql = "insert into atividades_plat (TITULO_ATIPLA,DESCRICAO_ATIPLA,SESSAO_ID_PLAT,EXERCICIOS_ID_PLAT,PRIORIDADE_PLAT_ID,ID_PERFUSU,STATUS_ID,TIPO_PERFUSU_id,DURACAO_ATIPLA) ";
		$sql .= "value (\"$this->TITULO_ATIPLA\",\"$this->DESCRICAO_ATIPLA\",\"$this->SESSAO_ID_PLAT\",\"$this->EXERCICIOS_ID_PLAT\",$this->PRIORIDADE_PLAT_ID,$this->ID_PERFUSU,$this->STATUS_ID,$this->TIPO_PERFUSU_id,$this->DURACAO_ATIPLA)";
		return Executor::doit($sql);
	}

	public static function delById($ID_ATIPLA){
		$sql = "delete from ".self::$tabela." where ID_ATIPLA=$ID_ATIPLA";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tabela." where ID_ATIPLA=$this->ID_ATIPLA";
		Executor::doit($sql);
	}


	public function update(){
		$sql = "update ".self::$tabela." set TITULO_ATIPLA=\"$this->TITULO_ATIPLA\",SESSAO_ID_PLAT=\"$this->SESSAO_ID_PLAT\",EXERCICIOS_ID_PLAT=\"$this->EXERCICIOS_ID_PLAT\",PRIORIDADE_PLAT_ID=\"$this->PRIORIDADE_PLAT_ID\",DESCRICAO_ATIPLA=\"$this->DESCRICAO_ATIPLA\",STATUS_ID=\"$this->STATUS_ID\",TIPO_PERFUSU_id=\"$this->TIPO_PERFUSU_id\",ATUALIZADO_EM=NOW() where id=$this->ID_ATIPLA";
		Executor::doit($sql);
	}

	public static function getById($ID_ATIPLA){
		$sql = "select * from ".self::$tabela." where ID_ATIPLA=$ID_ATIPLA";
		$query = Executor::doit($sql);
		return Model::one($query[0],new AtividadeData());
	}

	

	public static function getEvery(){
		$sql = "select * from ".self::$tabela;
		$query = Executor::doit($sql);
		return Model::many($query[0],new AtividadeData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tabela." order by DURACAO_ATIPLA desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AtividadeData());
	}

	public static function getAllPendings(){
		$sql = "select * from ".self::$tabela." where STATUS_ID=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AtividadeData());
	}




	public static function getBySQL($sql){
		$query = Executor::doit($sql);
		return Model::many($query[0],new AtividadeData());
	}

	public static function getOld(){
		$sql = "select * from ".self::$tabela." where date(date_at)<date(NOW()) order by date_at";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AtividadeData());
	}
	
	public static function getLike($q){
		$sql = "select * from ".self::$tabela." where TITULO_ATIPLA like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AtividadeData());
	}


}

?>