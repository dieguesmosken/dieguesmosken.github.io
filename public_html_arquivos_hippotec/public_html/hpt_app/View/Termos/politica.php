<html>
<?php
session_start();
?>
<head>
    <meta name="viewport" content="user-scalable=no, initial-scale=1, width=device-width">
    <title>POLITICA APP</title>
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
                <li><a class="active" href="javascript:void(0)" onclick="openNav()"><i class="fas fa-bars"
                            style="color: Teal;"></i></a></li>
                <li><a href="../index.php"><i class="fas fa-h-square"></i></li>
                <li><i class="fas fa-coffee"></i></a></li>


            </ul>
            <!-- Menu Lateral-->
            <div class="sidenav" id="sidenav">
                <div class="sidenavshape"></div>
                <div class="profile">
                <?php
                     if(!empty($_SESSION['id'])){
						echo "<br><img src='../img/User/img_user".$_SESSION['id'].".png' class='img_personal1' width='50%' height='50%' alt='mg_user".$_SESSION['id'].".png'>";
					}else{
						echo "<br><img src='../img/User/img_user0.png' width='50%' height='50%' alt='User_Empty'>";
					}
			   
                    ?>
                    <h3 style="color:white;">Menu</h3>
                </div>
                <!-- Itens do Menu Lateral  -->
                <div class="clearfix"></div>
                <ul>
                    <li><a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i
                                class="fas fa-times"></i></a></li>
                    <li><a href="#"><?php echo $_SESSION['nome'];?></a></li>
                    <li><a href="Termos/politica.php"> Termos </a></li>
                    <li><a href="#"> DOENÇAS </a></li>
                    <li><a href="sobreapp.php"> SOBRE </a></li>
                    <li><a href="index.php"> INICIO </a></li>
                    <li><a onclick="href='sair.php'"><i class="fas fa-sign-out-alt"></i>Sair</a></li>
                </ul>
            </div>

            <div class="news">

                <div></div>

                <div>
        <h4>Política de privacidade</h4>
        <h6 class="autor">Matheus MD</h6>
    </div>

    <p>Esta Política de Privacidade foi atualizada pela última vez <b><i>14 em Maio de 2021</i></b>, tem como objetivo informar a
        você, usuário da Hippotec, sobre quais informações são coletadas, além de como elas são tratadas, em que
        situações são compartilhadas e quando são excluídas.</p>

    <p>A aceitação desta Política de Privacidade se dará no ato do seu clique no botão "Aceito", de modo que o usuário
        concorda e permite o acesso às suas informações a partir de seu cadastro na Plataforma, manifestando
        consentimento livre, expresso e informado. Se o usuário não concordar com a política de tratamento de dados
        descrita nesse documento, não deve utilizar a Plataforma.</p>

    <p>O usuário poderá verificar o conteúdo desta Política diretamente por meio do link:<a href="http://localhost/2021/hpt_V2.0/View/Termos/politica.php">Politica de Privacidade</a>
    </p>

    <p>Caso reste alguma dúvida entre em contato conosco, pela central de atendimento no link: <a href="http://localhost/2021/hpt_V2.0/View/Termos/fale-conosco/" target="_blank">Fale Conosco</a>
        ou pelo e-mail atendimento.hippotec@gmail.com</p>



    <h2>1. Dados coletados</h2>
    <p>A Hippotec coleta todos os dados inseridos pelo usuário na Plataforma, tais como dados cadastrais, fotos,
        sintomas, relatorio do pré dignostico etc. São coletados pela Hippotec todos os dados ativamente
        disponibilizadas pelo usuário na utilização da Plataforma.</p>

    <p>A Hiipotec também coleta algumas informações automaticamente quando o usuário acessa e utiliza a Plataforma, tais
        como características do dispositivo de acesso, do navegador, Protocolo de Internet (IP, com data e hora), origem
        do IP, informações sobre cliques, páginas acessadas, as páginas seguintes acessadas após a saída da Plataforma,
        ou qualquer termo de busca digitado na Plataforma, dentre outros. A Hippotecc também poderá utilizar algumas
        tecnologias padrões para coletar informações do usuário, tais como cookies, pixel tags e local shared objects,
        de modo a melhorar sua experiência de navegação.</p>

    <p>O usuário pode, a qualquer momento, bloquear algumas destas tecnologias para coleta automática de dados através
        do seu navegador. Nesse caso é possível que algumas das funções oferecidas pela Plataforma deixem de funcionar
        corretamente.</p>

    <p>Desta forma, o usuário desde já se encontra ciente acerca das informações coletadas por meio da Plataforma e
        expressa consentimento livre, expresso e informado com relação à coleta de tais informações.</p>



    <h2>2. Finalidade dos dados coletados</h2>
    <p>A Hippotec considera todos os dados coletados por meio da Plataforma como confidenciais. Portanto, somente as
        utilizará da forma aqui descrita e autorizada pelo usuário. Todos os dados cadastrados e coletados na Plataforma são
        utilizados para a prestação de serviços pela Hippotec, para melhorar a experiência de navegação do usuário na
        Plataforma, bem como para fins de marketing.</p>

    <p>A Hippotec poderá trabalhar com empresas terceirizadas para a divulgação de anúncios aos usuários durante seu acesso
    à Plataforma. Tais empresas poderão coletar informações sobre as visitas de usuários à Plataforma, no intuito de
    fornecer anúncios personalizados sobre bens e serviços do interesse do usuário. Tais informações não incluem nome,
    endereço, e-mail ou número de telefone do usuário.</p>

    <p>O usuário dá o consentimento livre, expresso e informado para que a Hippotecc e seus parceiros utilizem as
    informações coletadas por meio da Plataforma para fins publicitários e comerciais, bem como para adequada prestação
    de serviços pela Hippotec.</p>

    <p>O usuário que não desejar receber mais e-mails promocionais e de comunicação, deverá enviar um e-mail para
    atendimento@Hippotec.com.br, solicitando o não recebimento dessas mensagens ou então ele próprio realizar sua
    exclusão através dos links disponibilizados nos e-mails.</p>

    <p>Importante lembrar que a Plataforma pode conter links para outras páginas, que possuem Política de Privacidade com
    previsões diversas do disposto neste documento. Dessa forma, a Hippotec não se responsabiliza pela coleta,
    utilização, compartilhamento e armazenamento de dados dos usuários pelos responsáveis por tais páginas.</p>



    <h2>3. Com quem são compartilhados os dados dos usuários</h2>
    <h3>A Hippotec poderá compartilhar os dados coletados por meio da Plataforma, nas seguintes situações:</h3>

    <p>empresas parceiras da Hippotec, para fins publicitários, conforme descrito no item 2 acima; Quando necessário às
    atividades comerciais da Hippotec, como por exemplo, mas não se limitando à, operadoras de cartão de crédito, para o
    recebimento de pagamentos; Para proteção dos interesses da Hippotec em qualquer tipo de conflito, incluindo ações
    judiciais; No caso de transações e alterações societárias envolvendo Hippotec, hipótese em que a transferência das
    informações será necessária para a continuidade dos serviços; Mediante ordem judicial ou pelo requerimento de
    autoridades administrativas que detenham competência legal para sua requisição. Armazenamento das Informações As
    informações dos usuários serão armazenadas pela Hippotec, em servidores próprios ou por ela contratados.</p>



    <h2>4. Segurança</h2>
    <h3>A Hippotec emprega todos os esforços de mercado para garantir a segurança de seus sistemas na guarda de referidos
    dados, tais como:</h3>

    <p>Utilização de métodos padrões e de mercado para criptografar e anonimizar os dados coletados; Utilização de software
    de proteção contra acesso não autorizado aos nossos sistemas; Autorização de acesso somente a pessoas previamente
    estabelecidas aos locais onde armazenamos as informações; Aqueles que entrarem em contato com as informações deverão
    se comprometer a manter sigilo absoluto. A quebra do sigilo acarretará responsabilidade civil e o responsável será
    processado nos moldes da legislação brasileira. Esta Política representa esforço da Hippotec no sentido de
    resguardar as informações dos usuários de sua Plataforma. No entanto, em razão da própria natureza da Internet, não
    é possível garantir que terceiros mal intencionados não obtenham sucesso em acessar indevidamente as informações
    armazenadas.</p>

    <p>A Hippotec adota medidas de segurança adequadas para proteger-se contra acesso não autorizado, alteração, divulgação
    ou destruição dos dados pessoais do usuário por nós coletados e armazenados. Essas medidas variam com base no tipo e
    na confidencialidade dos dados. Infelizmente, no entanto, nenhum sistema pode ser 100% protegido. Por isso, não
    podemos garantir que as comunicações entre o usuário e a Hippotec, os Serviços ou qualquer informação fornecida à
    Hippotec em relação aos dados por nós coletados por meio dos Serviços estejam livres de acesso não autorizado por
    terceiros. A senha do usuário é uma parte importante do nosso sistema de segurança, e é responsabilidade do usuário
    protegê-la. Não compartilhe a senha com terceiros. Em caso de suspeita de violação da senha ou conta, altere-a
    imediatamente e entre em contato com atendimento@Hippotec.com.br para sanar a situação.</p>



    <h2>5. Exclusão das informações</h2>
    <p>Mediante solicitação do usuário, pelo email atendimento@Hippotec.com.br, as informações referidas na presente
    Política serão excluídas pela Hippotec quando deixarem de ser úteis aos propósitos para os quais foram coletadas.</p>

    <p>A Hippotec fará os melhores esforços para atender a todos os pedidos de exclusão, no menor espaço de tempo possível.
    Tal exclusão, no entanto, removerá também o cadastro do usuário da Plataforma, que não conseguirá mais acessá-la,
    inclusive no que diz respeito aos conteúdos por ele assistidos.</p>

    <p>Porém, o usuário deve estar ciente de que, mesmo em caso de requisição de exclusão, a Hippotec respeitará o prazo de
    armazenamento mínimo de informações determinado pela legislação brasileira.</p>



    <h2>6. Atualização desta política</h2>
    <p>Reservamo-nos o direito de alterar essa Política de Privacidade sempre que necessário, como objetivo de fornecer
    maior segurança e praticidade ao usuário, o que poderá se dar sem prévia notificação ao usuário, salvo em caso de
    expressa vedação legal. Por isso é importante que o usuário leia a Política a cada nova atualização, conforme data
    de modificação informada ao final deste documento.</p>



    <h2>7. Legislação e foro competentes</h2>
    <p>Essa Política de Privacidade será regida, interpretada e executada de acordo com as leis da República Federativa do
    Brasil, independentemente dos conflitos dessas leis com leis de outros estados ou países, sendo competente o Foro do
    local de residência do usuário, no Brasil, para dirimir qualquer dúvida decorrente deste instrumento. O usuário
    consente, expressamente, com a competência desse juízo, e renuncia, neste ato, à competência de qualquer outro foro,
    por mais privilegiado que seja ou venha a ser.<p>





            </div>

        </div>
    </div>
  



    <script src="../../js/jquery.min.js"></script>
    <script>
    function openNav() {
        document.getElementById("sidenav").style.width = "300px";
    }

    function closeNav() {
        document.getElementById("sidenav").style.width = "0";
    }
    </script>
</body>

</html>