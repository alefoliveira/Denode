<?php

define("ROOT", dirname(__FILE__));
//Pega o diretório completo do arquivo em execução no caso o index.php e tbm  
//remove o problema com caminhos relativos

$debug= false;
if($debug){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
}  // depurador para  encontrar a causa de um erro já detectado

//	admin está pegando do diretório os arquivos css, javascript

class Admin {
	//public é  o modificador de acesso.
	// Ou seja quando empregada em uma variavel ela pode ser acessada por qualquer 
	//classe dentro (e fora) do projeto
	// No static a classe não precisa ser instanciada para chamar este método.
	//por exemplo:
	//Teste teste = new Teste();
   //teste.Segundaacao(); // Este é o método não-estático
    //Teste.Acao(); // Este é o método estático

	public static $theme = ""; 
	public static $root = "";
	public static $user = null;
	public static $debug_sql = false;

	public static function includeCSS(){
		$path = "res/css/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<link rel='stylesheet' type='text/css' href='".$fullpath."' />";

					}
				}
			}
		closedir($handle);
		}

	}

	public static function alert($text){
		echo "<script>alert('".$text."');</script>";
	}

	public static function redir($url){
		echo "<script>window.location='".$url."';</script>";
	}

	public static function includeJS(){
		$path = "res/js/";
		$handle=opendir($path);
		if($handle){
			while (false !== ($entry = readdir($handle)))  {
				if($entry!="." && $entry!=".."){
					$fullpath = $path.$entry;
				if(!is_dir($fullpath)){
						echo "<script type='text/javascript' src='".$fullpath."'></script>";

					}
				}
			}
		closedir($handle);
		}

	}

}


//	view está carregando iniciando a variavel view que foi criado para chamar  as páginas para aparecer
// no $root  juntamente com o menu que está na variavel $theme , então ele verificada
// se a variavel view foi iniciada e pede para
// que no diretorio admin/ ele pegue apenas arquivos com final view.php
// e na variavel $url está exeutando todo o caminho do diretório



class View {
	
	public static function load($view){
		// Module::$module;
		if(!isset($_GET['view'])){
			if(Admin::$root==""){
				include "admin/".$view."-view.php";
			}else if(Admin::$root=="admin"){
				include "admin/".Admin::$theme."/view/".$view."-view.php";				
			}
		}else{


			if(View::isValid()){
				$url ="";
			if(Admin::$root==""){
			$url = "admin/".$_GET['view']."-view.php";
			}else if(Admin::$root=="admin"){
			$url = "admin/".Admin::$theme."/view/".$_GET['view']."-view.php";				
			}
				include $url;				
			}else{
				View::Error("<b>404 NOT FOUND</b> View <b>".$_GET['view']."");
			}



		}
	}

	
	public static function isValid(){
		$valid=false;
		if(isset($_GET["view"])){
			$url ="";
			if(Admin::$root==""){
			$url = "admin/".$_GET['view']."-view.php";
			}else if(Admin::$root=="admin"){
			$url = "admin/".Admin::$theme."/view/".$_GET['view']."-view.php";				
			}
			if(file_exists($file = $url)){
				$valid = true;
			}
		}
		return $valid;
	}

	public static function Error($message){
		print $message;
	}

}



//	module está iniciando o menu no $root

class Module {

	public static function loadMenu(){
		if(Admin::$root==""){
		include "admin/menu.php";
		}else if(Admin::$root=="admin"){
		include "admin/".Admin::$theme."menu.php";
		}
	}


}

//	database está fazendo a conexão com o banco

class Database {

	public static $banco;
	public static $conexao;
	function Database(){

	include 'config.php';
	$this->usuario="$usuario";
	$this->senha="$senha";
	$this->host="$host";
	$this->dbanco="$banco";
	}

	function connect(){
		$conexao = new mysqli($this->host,$this->usuario,$this->senha,$this->dbanco);
		$conexao->query("set sql_mode=''");
		return $conexao;
	}

	public static function getCon(){
		if(self::$conexao==null && self::$banco==null){
			self::$banco = new Database();
			self::$conexao = self::$banco->connect();
		}
		return self::$conexao;
	}
	
}

//executor está executando as dados obtidos no Database
//Executor::doit  

class Executor {

	public static function doit($sql){
		$conexao = Database::getCon();
		if(Admin::$debug_sql){
			print "<pre>".$sql."</pre>";
		}
		return array($conexao->query($sql),$conexao->insert_id);
	}
}


//	Na classe model 

class Model {

	public static function exists($modelname){	  // Verifica se a função  existe ($ modelname) 
		$fullpath = self::getFullpath($modelname); // Se o caminho completo existe e foi encontrado ele  não carrega
		$found=false;
		if(file_exists($fullpath)){  // Se o caminho completo existe e foi encontrado ele carrega
			$found = true;
		}
		return $found;
}
	public static function getFullpath($modelname){
		return Admin::$root."admin/".$modelname.".php";
	}

	public static function many($query,$aclass){
		$cnt = 0;
		$array = array();
		while($r = $query->fetch_array()){
			$array[$cnt] = new $aclass;
			$cnt2=1;
			foreach ($r as $key => $v) {
				if($cnt2>0 && $cnt2%2==0){ 
					$array[$cnt]->$key = $v;
				}
				$cnt2++;
			}
			$cnt++;
		}
		return $array;
	}
	
	public static function one($query,$aclass){
		$cnt = 0;
		$found = null;
		$data = new $aclass;
		while($r = $query->fetch_array()){
			$cnt=1;
			foreach ($r as $key => $v) {
				if($cnt>0 && $cnt%2==0){ 
					$data->$key = $v;
				}
				$cnt++;
			}

			$found = $data;
			break;
		}
		return $found;
	}

}

// Classe criada para  identificar, iniciar e remover sessões cridas a partir da ID di funcionário
//get e o set são utilizados para encapsular o atributo da classe para que ele não seja acessado diretamente
//fora de sua própria classe

class Session{
	public static function setUID($uid){
		$_SESSION['ID_PERFUSU'] = $uid;
	}

	public static function unsetUID(){
		if(isset($_SESSION['ID_PERFUSU']))
			unset($_SESSION['ID_PERFUSU']);
	}

	public static function issetUID(){
		if(isset($_SESSION['ID_PERFUSU']))
			return true;
		else return false;
	}

	public static function getUID(){
		if(isset($_SESSION['ID_PERFUSU']))
			return $_SESSION['ID_PERFUSU'];
		else return false;
	}

}


// Classe que impede que o usuário acesse a dashboard sem logar, para isso ele verifica  se o a url do diretório foi 
//carregado se a sessão foi iniciada, depois disso carrega o index 

class Lb {

	public function Lb(){
	}

	public function start(){
	function __autoload($modelname){  // para fazer carregamento automático das classes.
	if(Model::exists($modelname)){
		include Model::getFullPath($modelname); //getFullPath- O arquivo ou diretório para o qual as informações
		// de caminho absoluto serão obtidas.
	} 
}

if(isset($_SESSION["ID_PERFUSU"])){
	Admin::$user = UsuarioData::getById($_SESSION["ID_PERFUSU"]);
}

if(!isset($_GET["action"])){
	Module:: loadMenu("index");
}else{
	Action::load($_GET["action"]);
}
	}

}



ob_start();
session_start();
Admin::$root="";


$lb = new Lb();
$lb->start();

?>
