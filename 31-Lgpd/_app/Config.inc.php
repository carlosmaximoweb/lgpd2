<?php

/*
 * BANCO DE DADOS
 */
if ($_SERVER['HTTP_HOST'] == 'localhost'):
    define('SIS_DB_HOST', 'localhost'); //Link do banco de dados no servidor
    define('SIS_DB_USER', 'root'); //Usuário do banco de dados no servidor
    define('SIS_DB_PASS', ''); //Senha  do banco de dados no servidor
    define('SIS_DB_DBSA', 'database'); //Nome  do banco de dados    
else:
    define('SIS_DB_HOST', ''); //Link do banco de dados
    define('SIS_DB_USER', ''); //Usuário do banco de dados
    define('SIS_DB_PASS', ''); //Senha  do banco de dados
    define('SIS_DB_DBSA', ''); //Nome  do banco de dados
endif;

/*
 * CACHE E CONFIG
 */
define('SIS_CACHE_TIME', 10); //Tempo em minutos de sessão
define("COOKIEPOLICY", filter_input(INPUT_COOKIE, "", FILTER_SANITIZE_STRIPPED));

/*
  AUTO LOAD DE CLASSES
 */

function MyAutoLoad($Class) {
    $cDir = ['Helpers', 'Models'];
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . '/' . $dirName . '/' . $Class . '.class.php') && !is_dir(__DIR__ . '/' . $dirName . '/' . $Class . '.class.php')):
            include_once (__DIR__ . '/' . $dirName . '/' . $Class . '.class.php');
            $iDir = true;
        endif;
    endforeach;
}

spl_autoload_register("MyAutoLoad");

$WorkControlDefineConf = null;

require 'Config/Config.inc.php';
require 'Config/Agency.inc.php';
require 'Config/Client.inc.php';

/*
 * Exibe erros lançados
 */

function Erro($ErrMsg, $ErrNo = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? 'trigger_info' : ($ErrNo == E_USER_WARNING ? 'trigger_alert' : ($ErrNo == E_USER_ERROR ? 'trigger_error' : 'trigger_success')));
    echo "<div class='trigger {$CssClass}'>{$ErrMsg}<span class='ajax_close'></span></div>";
}

/*
 * Exibe erros lançados por ajax
 */

function AjaxErro($ErrMsg, $ErrNo = null) {
    $CssClass = ($ErrNo == E_USER_NOTICE ? 'trigger_info' : ($ErrNo == E_USER_WARNING ? 'trigger_alert' : ($ErrNo == E_USER_ERROR ? 'trigger_error' : 'trigger_success')));
    return "<div class='trigger trigger_ajax {$CssClass}'>{$ErrMsg}<span class='ajax_close'></span></div>";
}

/*
 * personaliza o gatilho do PHP
 */

function PHPErro($ErrNo, $ErrMsg, $ErrFile, $ErrLine) {
    echo "<div class='trigger trigger_error'>";
    echo "<b>Erro na Linha: #{$ErrLine} ::</b> {$ErrMsg}<br>";
    echo "<small>{$ErrFile}</small>";
    echo "<span class='ajax_close'></span></div>";

    if ($ErrNo == E_USER_ERROR):
        die;
    endif;
}

set_error_handler('PHPErro');


/*
 * Descreve nivel de usuário
 */

function getWcLevel($Level = null)
{
    $UserLevel = [
        1 => 'Cliente (user)',
        2 => 'Assinante (user)',
        6 => 'Colaborador (adm)',
        7 => 'Suporte Geral (adm)',
        8 => 'Gerente Geral (adm)',
        9 => 'Administrador (adm)',
        10 => 'Super Admin (adm)'
    ];

    if (!empty($Level)):
        return $UserLevel[$Level];
    else:
        return $UserLevel;
    endif;
}

/*
 * Descreve estatus de pedidos
 */

function getOrderStatus($Status = null)
{
    $OrderStatus = [
        1 => 'Concluído',
        2 => 'Cancelado',
        3 => 'Novo Pedido',
        4 => 'Agd. Pagamento', //OPERADORA
        5 => 'Agd. Pagamento', //CONFIRMAÇÃO MANUAL (BOLETO, DEPÓSITO)
        6 => 'Processando'
    ];

    if (!empty($Status)):
        return $OrderStatus[$Status];
    else:
        return $OrderStatus;
    endif;
}

/*
 * Descreve tipos de pagamentos
 */

function getOrderPayment($Payment = null)
{
    $Payments = [
        1 => 'Pendente',
        101 => 'Cartão de Crédito', //PAGSEGURO
        102 => 'Boleto Bancário' //PAGSEGURO
    ];

    if (!empty($Payment)):
        return $Payments[$Payment];
    else:
        return $Payments;
    endif;
}


//APP_SERVICES
function getTypeService($Type = null) {
    $Services = [
        1 => 'Cartão de Visita',
        2 => 'Panfleto',
        3 => 'Banner/Faixa',
        4 => 'Logotipo',
        5 => 'Web Site',
        6 => 'Gestão de Conteúdo',
        8 => 'E-mail Marketing'
        
    ];
    
    if (!empty($Type)):
        return $Services[$Type];
    else:
        return $Services;
    endif;
}

//APP_SERVICES
function getTypePage($Type = null) {
    $Pages = [
        1 => 'Serviços',
        2 => 'Portfolio',
        3 => 'Serviços Gráficos',
        4 => 'Marketing',
        5 => 'Single'
    ];
    
    if (!empty($Type)):
        return $Pages[$Type];
    else:
        return $Pages;
    endif;
}

function getUserAction($Type = null) {
    $Actions = [
        1 => 'Informou e-mail',
        2 => 'Confirmou e-mail',
        3 => 'Baixou e-Book'
    ];
    
    if (!empty($Type)):
        return $Actions[$Type];
    else:
        return $Actions;
    endif;
}

function getCatAlbum($Cat = null)
{
    $CatAlbum = [
        1 => 'Clientes',
        2 => 'Serviços Gráficos',
        3 => 'Marketing Digital',
        4 => 'Desenvolvimento Web',
        5 => 'Midias Sociais'        
    ];

    if (!empty($Cat)):
        return $CatAlbum[$Cat];
    else:
        return $CatAlbum;
    endif;
}
