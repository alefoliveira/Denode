<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <title>Admin - Dashboard</title>

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link href=" css/bootstrap.min.css" rel="stylesheet" />
    <link href=" css/material-dashboard.css" rel="stylesheet"/>
       <link href=" css/style.css" rel="stylesheet"/>
  <script src=" js/jquery.min.js" type="text/javascript"></script>

<?php if(isset($_GET["view"]) && $_GET["view"]=="home"):?>

<?php endif; ?>

</head>

<body>
<?php if(isset($_SESSION["ID_PERFUSU"])):?>
  <div class="wrapper">

      <div class="sidebar" id="menulateral">
      <div class="logo">
        <a href="./" class="simple-text" id="topicosmenu">
          Denode
        </a>
      </div>

        <div class="sidebar-wrapper" >
              <ul class="nav" >
                  <li class="">
                      <a href="./" id="topicosmenu">
                          <img src="./img/home.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Home</img>
                      </a>
                  </li>
                  <li >
                      <a href="./?view=atividade" id="topicosmenu">
                          <img src="./img/atividades.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Atividades</img>
                        
                      </a>
                  </li>
                  <li >
                      <a href="./?view=exercicios" id="topicosmenu">
                           <img src="./img/exercicio.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Exercícios</img>
                        
                      </a>
                  </li>
                  <li>
                      <a href="./?view=sessao" id="topicosmenu">
                          <img src="./img/sessao.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Sessões</img>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=relatorios" id="topicosmenu">
                            <img src="./img/relatorios.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Relatórios</img>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=usuarios" id="topicosmenu">
                          <img src="./img/equipemenu.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Equipe</img>
                      </a>
                  </li>

                    <li>
                      <a href="./?view=planospremium" id="topicosmenu">
                         <img src="./img/premium.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Planos Premium</img>
                      </a>
                  </li>
                  <li>
                      <a href="./?view=pontuacoes" id="topicosmenu">
                        <img src="./img/conquistas.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Pontuações</img>
                     
                      </a>
                  </li>
                   <li>
                      <a href="./?view=feedback" id="topicosmenu">
                        <img src="./img/feedback.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Feedback</img>
                         
                      </a>
                  </li>

                   <li>
                      <a href="./?view=faq" id="topicosmenu">
                          <img src="./img/faq.svg"id="topicosmenu">&nbsp; &nbsp;&nbsp;&nbsp;Faq</img>
                        
                      </a>
                  </li>
              </ul>
        </div>
      </div>

      <div class="main-panel">
      <nav class="navbar navbar-transparent navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./"><b>Dashboard</b></a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
             <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="./img/notificacoes.svg"id="topicosmenu"></img>
                  </a>
                <ul class="dropdown-menu">
                  <li><a href="./?view=cfeedback">Notificação</a></li>
                
                </ul>
              </li> 

               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="./img/usuario.svg"id="topicosmenu"></img>
                  </a>
                <ul class="dropdown-menu">
                  <li><a href="./?view=usuarios"><img src="./img/perfil.svg"id="topicosmenu">&nbsp; &nbsp;Perfil</img></a></li>
                  <li class="divider"></li>

                  <li><a href="./?view=redifinirsenha"> <img src="./img/config.svg"id="topicosmenu">&nbsp; &nbsp;Configuração</img></a></li>
                  <li class="divider"></li>
                  <li><a href="logout.php"> <img src="./img/logout.svg"id="topicosmenu">&nbsp; &nbsp;Sair</img></a></li>
                </ul>

             
            </ul>

          </div>
        </div>
      </nav>

      <div class="content">
      <div class="container-fluid">
<?php 
  
  View::load("login");

?>
</div>
      </div>

    </div>
  </div>
<?php else:?>
  <?php 
  View::load("login");

?>

<?php endif;?>
</body>

  <script src=" js/bootstrap.min.js" type="text/javascript"></script>
  <script src=" js/material.min.js" type="text/javascript"></script>
  <script src=" js/material-dashboard.js"></script>

</html>
