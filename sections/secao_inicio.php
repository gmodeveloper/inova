<?php

?>
<header id="inicio">
  <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="item active" style="background-image: url(<?php echo URLPos::getURLDirRoot(); ?>images/slider/1.jpg)">
        <div class="caption">
          <div class="animated jackInTheBox"><center><img class="img-responsive" src="<?php echo URLPos::getURLDirRoot(); ?>images/logo_mini.png" alt="Inova Utilidades"></center></div>
          <h1 style="font-size:1em;" class="animated fadeInRightBig">Nossos <span>produtos</span> são <span>projetados</span> pensando no seu bem estar</h1>
          <!--<p class="animated fadeInRightBig">Nossos <span>móveis</span> são <span>projetados</span> pensando no seu bem estar.</p>-->
        </div>
      </div>
      <div class="item" style="background-image: url(<?php echo URLPos::getURLDirRoot(); ?>images/slider/2.jpg)">
        <div class="caption">
          <h1 class="animated fadeInLeftBig">Entregamos em todo o <span>País</span></h1>
          <p class="animated fadeInRightBig">Veja o catálogo e conheça nossos produtos</p>
        </div>
      </div>
    </div>
    <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
    <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

    <a id="tohash" href="#portfolio"><i class="fa fa-angle-down"></i></a>

  </div><!--/#home-slider-->
  <div class="main-nav">
    <div style="width:100%;" class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Alterar navegação</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#inicio">
          <h1><img class="img-responsive" style="height:40px;" src="<?php echo URLPos::getURLDirRoot(); ?>images/logo_mini.png" alt="logo"></h1>
        </a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="scroll active"><a href="#sobre-nos">A Empresa</a></li>
          <li style="background-color:rgba(255,255,255,0.2);" class="scroll"><a class="itemMiniblock" href="#portfolio">Catálogo de Produtos</a></li>
          <li class="scroll"><a href="#servicos">Serviços</a></li>
          <li class="scroll"><a href="#certificacoes">Certificações</a></li>
          <li class="scroll"><a href="#contact">Contato</a></li>
          <?php


        if(!Cookie::get("UID")){
          echo('<li><a class="itemMiniblock" onclick="modalLoginShow();" href="#inicio">Login do Representante</a></li>');
        }else{
          $UID = intval(Cookie::get("UID"));
          $data=DBCon::dbQuery("SELECT * FROM inova_representante WHERE id_rep=$UID;");
          if($data){
            $U_Data=array();
            if($data->num_rows==1){//Se achar algum resultado válido...
              $FRow = $data->fetch_array(MYSQLI_BOTH);
              echo('<li><a onclick="clienteModal();" href="#inicio" data-toggle="tooltip" data-placement="bottom" title="Seja bem-vindo(a) '.$FRow['nome'].'">Representante</a></li>');

            }else Cookie::del("UID"); //Se não houver alguém com ID, 'desloga'

          }
        }
        if(Usuario::$ativo) $palavra="pedido"; else $palavra="orçamento";
        echo('<li><a class="itemMiniblock" onclick="modalComprasShow();" href="#portfolio"><span id="itens-comprados" class="badge">0</span> itens no '.$palavra.'</a></li>');
          ?>

        </ul>
      </div>
    </div>
  </div><!--/#main-nav-->
</header><!--/#home-->
