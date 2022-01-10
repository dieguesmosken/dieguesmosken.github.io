<?php
session_start();
?>
<html>

<head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1, width=device-width">
	<title>ACNE INFO </title>
    <link rel="stylesheet" type="text/css" href="../../css/fontawesome/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/style.css">

	<link rel="stylesheet" type="text/css" href="../../mobileui/style.css" />
	
</head>
<body style="background-color: PaleTurquoise"> 
       <!-- Botões MenuShape Menu Superior  --> 
	<div class="container">
		<div class="app">
			
			<ul class="menubar">
				<li><a class="active"  href="javascript:void(0)" onclick="openNav()"><i class="fas fa-bars" style="color: Teal;"></i></a></li>
				<li><a href="../index.php"><i class="fas fa-h-square"></i></li>
				<li><a href="doenca.php"><i class="fas fa-arrow-left"></i></a></li>
		
				
			</ul>
			  <!-- Menu Lateral--> 
			  <div class="sidenav" id="sidenav">
                <div class="sidenavshape"></div>
                <div class="profile">
                <?php
                     if(!empty($_SESSION['id'])){
						echo "<br><img src='../../img/User/img_user".$_SESSION['id'].".png' class='img_personal1' width='50%' height='50%' alt='mg_user".$_SESSION['id'].".png'>";
					}else{
						echo "<br><img src='../../img/User/img_user0.png' width='50%' height='50%' alt='User_Empty'>";
					}
			   
                    ?>
                    <h3 style="color:white;">ACNE</h3>
                </div>
                <!-- Itens do Menu Lateral  -->
                <div class="clearfix"></div>
                <ul>
                    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i
                                class="fas fa-times"></i></a></li>
                    <li><a href="#"><?php echo $_SESSION['nome'];?></a></li>
                    <li><a href="../Termos/politica.php"> Termos </a></li>
                    <li><a href="doenca.php"> DOENÇAS </a></li>
                    <li><a href="./sobre.php"> SOBRE </a></li>
                    <li><a href="../index.php"> INICIO </a></li>
                    <li><a onclick="href='sair.php'"><i class="fas fa-sign-out-alt"></i>Sair</a></li>
                </ul>
            </div>
		<div class="news">
		
	<div></div>
	
		<h1> ACNE </h1> 
		<hr>
		
		<h3> O QUE É ? </h3> 
	   <p> A acne nada mais é que uma lesão causada pelo aumento da produção de sebo vinda das glândulas sebáceas. 
	   Esse excesso de oleosidade deixa os poros obstruídos e aumenta a proliferação de bactérias, resultando nos comedões,
	   que chamamos mais comumente de cravos. Quando ocorre a inflamação, chamamos de espinha.</p>
	   
	   <hr>
	   
	   <h3>GRAUS DA ACNE: </h3>
	   
	   <h6> Acne não inflamatória </h6>

       <h4> Grau 1: </h4>	   
	   
	   <p> acne comedônica, composta por “cravos” abertos ou fechados. </p>
	   
	   <h6> Acne inflamatória </h6>
	   
	   <h4> Grau 2: </h4>
	   
	   <p> Acne pápulo-pustulosa, apresentando lesões dolorosas,
	   avermelhadas e elevadas, podendo ter secreção amarelada no seu interior. </p>
	   
	   <h4> Grau 3: </h4>
	   
	   <p> Acne nódulo-cística, mostrando lesões nodulares, podendo ter pus no seu interior. </h3> 
	   
	   
	   <h4> Grau 4: </h4> 
	   
	   <p> Acne conglobata, com lesões maiores e com grande saída de secreção. Tendência à formação de cicatrizes. </p>
	   
	   <h4> Grau 5 </h4>
	   
	   <p> Acne fulminante, com grande processo inflamatório na pele, com possibilidade de febre e mal estar. Grande tendência cicatricial. </p>
	    
		<hr>
		
	   <h3> Sintomas : </h3> 
	   
	   <li> Pontos negros </li>
	   <li>Pontos brancos</li>
<li>	Pápulas </li>
<li> Pústulas </li>
<li>Nódulos </li>
<li>	Quistos </li>
<hr>

     <h3> TRATAMENTOS : </h3> 
	 
	 <p> Podem ser utilizados cremes, géis, sabonetes e antibióticos para controlar a proliferação bacteriana, de aplicação tópica (diretamente na zona afetada), ou, em situações mais graves, medicação oral.
O dermatologista pode ainda recomendar outros tratamentos complementares como a extração de comedões, punção ou drenagem de pústulas, nódulos e quistos. Peeling, laser ou dermobrasão podem ser necessários para o tratamento de marcas associadas às lesões provocadas pela acne.
Quanto às manchas, estas podem ser tratadas em casa com recurso a cremes ou em consultório com recurso a fototerapia de luz azul. </p>
 <hr>
 
 <h3> COMO EVITAR: </h3>
 
 <li>	LAVAR O ROSTO 2 VEZES OU MAIS AO DIA </li>
<li>UTILIZAR OPCIONALMENTE SABONETES ESPECIAIS</li>
<li>NÃO COÇAR E PASSAR A MÃO NOS POROS PARA EVITAR A PASSAGEM DE DIFERENTES BACTERIAS.</li>
<li>REDUZIR AO MAXIMO A OLEOSIDADE DO ROSTO.</li>


	   
	   
	   
	   
</div>
	   
	 	</div>
	</div>
 </div>
	    
	
	   
	  <script src="../../js/jquery.min.js"></script>
		<script>
		 function openNav()
		 {
		 document.getElementById("sidenav").style.width="300px";
		 }
		 function closeNav()
		 {
		 document.getElementById("sidenav").style.width="0";
		 }
		 </script>
		 </body>
		 </html>