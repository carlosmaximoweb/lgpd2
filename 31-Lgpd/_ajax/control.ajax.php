<?php

echo "<p>controle de cookie</p>";

//DEFINE O CALLBACK E RECUPERA O POST
$jSON = null;
$PostData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$CallBack = 'cookiePolicy';

//VALIDA AÇÃO
if ($PostData && $PostData['callback_action'] && $PostData['callback_action'] == $CallBack):
    $data = filter_var_array($PostData, FILTER_SANITIZE_STRIPPED);
    setcookie("cookiePolicy", $data["cookie"], time() + 3600 * 24 * 30 * 12 * 5, "/");
    $jSON["agree"] = true;
    echo json_encode($jSON);    
endif;
?>
