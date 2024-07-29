<!DOCTYPE html>
<html lang="pt">
<html>
	<head>	
        <meta charset="UTF-8">
		<title>Terapia Capilar</title>
		<link rel="shortcut icon" type="favicon" href="imagens/favicon.ico"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css">
        <script type="text/javascript" src="js/scriptTerapia.js"></script>
	</head>

	<body >  
        <?php
            session_start();
            if (isset($_SESSION ['login'])) {                               // Se existe usuário logado 
                header("location: /TerapiaCapilarTesteCss/clienteListar.php");  // Vai para as funcionalidades do site
                exit();
            }
        ?>
        <!-- Menu Superior -->
        <div class="p-top" id="LoginCadastro" >
            <div class="p-row p-white p-padding" >
                <div class="p-half" style="margin:0 0 0 0"><a href="."><img src='imagens/LOGO_THALI.png' alt=' Terapia capilar '></a></div>
                <div class="p-half p-margin-top p-wide p-hide-medium p-hide-small">
                </div>
            </div>
            <div class="p-bar p-theme p-large" style="z-index:-1">

                <a class="p-bar-item p-button p-hide-medium p-hide-small p-hover-light-gray p-padding-16" onclick="document.getElementById('id0L').style.display='block'" href="javascript:void(0)" >Login</a>

                <a class="p-bar-item p-button p-hide-medium p-hide-small p-hover-light-gray p-padding-16" onclick="document.getElementById('id0C').style.display='block'"href="javascript:void(0)" ">Cadastro</a>
            </div>
	    </div>

        <!-- Logo da página -->
        <div class="p-top">
            <div class="p-row p-white p-padding">
                <div class="p-half" style="margin:0 0 0 0">
                    <a href="."><img src='imagens/LOGO_THALI.png' alt=' Terapia capilar '></a>
                </div>
            </div>
      </div>
        </div>
 
        
		<div class="p-main p-container" style="margin-left:270px;margin-top:130px;">

            <div class="p-panel p-padding-large p-card-4 p-light-grey" >
            <section class="banner">

                <h1>THALI <span>TERAPEUTA CAPILAR</span></h1>

            </section>
                                      
                <!-- LOGIN MODAL: login incorreto ou cadastro incorreto --> 
                <?php
                    $msg        = "";
                    $msg_header = "";
                    if(isset($_SESSION['nao_autenticado'])){ 
                        $msg        = $_SESSION['mensagem'];
                        $msg_header = $_SESSION['mensagem_header'];
                ?>
                <?php 
                    }else{ 
                ?>
                
                <div id="LF" class="p-modal " style="display:none;">
                <?php
                    unset($_SESSION['nao_autenticado']);
                    }
                ?>
                    <div class="p-modal-content p-card-4 p-animate-zoom" style="max-width:400px">
                        <div class="p-center"> 
                            <span onclick="document.getElementById('LF').style.display='none'" class="p-button p-xlarge p-transparent" title="Close Modal">×</span>
                        
                        <h2 class="p-center p-xxlarge "><?php echo $msg_header; ?></h2>
                        <p class="p-container p-card-4 p-light-grey p-text-IE p-margin"><?php echo $msg; ?></p>
                        </div>
                        <br>
                    </div>
                </div>
                
                <!-- LOGIN MODAL: para realizar Login --> 
                <div id="id0L" class="p-modal ">

                    <div class="p-modal-content" style="max-width:400px">

                        <div class="p-center"> 
                            <span onclick="document.getElementById('id0L').style.display='none'" class="p-button p-xlarge p-transparent" title="Close Modal">×</span>
                        </div>

                        <h2 class="p-center p-xxlarge fontTitulo">Login</h2>

                        <form action="login.php" method="POST" class="p-container p-light-grey p-margin">
                            <div class="p-row p-section">
                                <div class="p-col" style="width:50px"><i class="p-xxlarge"></i></div>
                                <div class="p-rest">
                                <label class="p-text-IE"><b>Login do usuário</b></label>
                                <input class="p-input p-border p-margin-bottom" type="text" name="Login" placeholder="nome.sobrenome" required>
                                </div>
                            </div>

                            <label class="p-text-IE"><b>Senha</b></label>
                            <input class="p-input p-border" name="Senha" id="Senha" type="password"  
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,10}" placeholder="sua senha" 
                            title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 10 caracteres" 
                            required>
                            
                            <p>
                            <input type="checkbox" class="p-btn p-theme"  onclick="mostrarOcultarSenhaLogin()"> <b>Mostrar senha</b>
                            </p>
                            <button class="p-button p-block p-theme p-section p-padding" type="submit">Login</button>
                            
                        </form>

                        <div class="p-container p-border-top p-padding-16 p-light-grey">
                            <button onclick="document.getElementById('id0L').style.display='none'" type="button" class="p-button p-red">Cancelar</button>
                            <span class="p-right p-padding p-hide-small"><a href="#">Esqueceu a senha?</a></span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- LOGIN CADASTRO:para realizar Cadastro - --> 
                <div id="id0C" class="p-modal">

                    <div class="p-modal-content" style="max-width:400px">
                        
                        <div class="p-center"> 
                            <span onclick="document.getElementById('id0C').style.display='none'" class="p-button p-xlarge p-transparent" title="Close Modal">×</span>
                        </div>

                        <h2 class="p-center p-xxlarge fontTitulo">Cadastrar</h2>

                        <form action="cadastro.php" method="POST" class="p-container p-light-grey p-margin">

                            <div class="p-row p-section">
                                <div class="p-col" style="width:50px"><i class="p-xxlarge"></i></div>
                                    <div class="p-rest">
                                    <label class="p-text-IE"><b>Nome de usuário</b>*</label>
                                    <input class="p-input p-border" name="nome" type="text" placeholder="Nome">
                                    </div>
                            </div>
                            <div class="p-row p-section">
                            <div class="p-col" style="width:50px"><i class="p-xxlarge"></i></div>
                                <div class="p-rest">
                                <label class="p-text-IE"><b>Login</b>*</label>                        
                                <input class="p-input p-border" name="Login" type="text"
                                    pattern="[a-zA-Z]{2,20}\.[a-zA-Z]{2,20}" placeholder="nome.sobrenome" title="nome.sobrenome" required>
                                </div>
                            </div>
                            <div class="p-row p-section">
                            <div class="p-col" style="width:50px"><i class="p-xxlarge fa fa-envelope-o"></i></div>
                                <div class="p-rest">
                                <label class="p-text-IE"><b>Celular</b>*</label> 
                                <input class="p-input p-border " name="Celular" id="Celular"  type="text" maxlength="15"
                                    placeholder="(XX)XXXXX-XXXX" title="(XX)XXXXX-XXXX"  pattern="\([0-9]{2}\)[0-9]{4,6}-[0-9]{3,4}$" required
                                    onkeypress="mask(this, mphone);" onblur="mask(this, mphone);"> 
                                </div>
                            </div>
                            <div class="p-row p-section">
                            <div class="p-col" style="width:50px"></div>
                                <div class="p-rest">
                                <label class="p-text-IE"><b>Senha</b>*</label> 
                                <input class="p-input p-border " name="Senha1" id="Senha1" type="password" 
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,10}"
                                    title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 10 caracteres" 
                                    required> 
                                </div>
                            </div>

                            <div class="p-row p-section">
                            <div class="p-col" style="width:50px"></div>
                                <div class="p-rest">
                                <label class="p-text-IE"><b>Confirma Senha</b>*</label> 
                                <input class="p-input p-border" name="Senha2" id="Senha2" type="password" onkeyup="validarSenha()"
                                    pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,10}"
                                    title="Deve conter ao menos um número, uma letra maiúscula, uma letra minúscula, um caracter especial, e ter de 6 a 10 caracteres" 
                                    required> 
                                </div>
                            </div>
                            <p>
                                <input type="checkbox" class="p-btn p-theme"  onclick="mostrarOcultarSenhaCadastro()"> <b>Mostrar senha</b>
                            </p>
                            <p class="p-center">
                            <button class="p-button p-block p-theme p-section p-padding" type="submit"> Enviar </button>
                            </p>
                        </form>

                        <div class="p-container p-border-top p-padding-16 p-light-grey">
                            <button onclick="document.getElementById('id0C').style.display='none'" type="button" class="p-button p-red">Cancelar</button>
                        </div>

                    </div>
                </div>

                <?php require 'geral/sobre.php';?>
                <!-- FIM PRINCIPAL -->
                </div>
                <!-- Inclui RODAPE  -->
                <?php require 'geral/rodape.php';?>
	</body>
</html>