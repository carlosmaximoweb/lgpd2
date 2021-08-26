<?php

if (!$WorkControlDefineConf):
    /*
     * URL DO SISTEMA
     */
    if($_SERVER['HTTP_HOST'] == 'localhost'):
        define('BASE', 'http://localhost/31-Lgpd'); //Url raiz do site no localhost
    else:
        define('BASE', 'http://localhost/31-Lgpd'); //Url raiz do site
    endif;
endif;

if (!$WorkControlDefineConf):
   
    /* PRIMEIRO PIXEL CRIADO */
    define('SEGMENT_FB_PIXEL_ID', ); //Id do pixel de rastreamento
    define('SEGMENT_GL_ANALYTICS_UA', ''); //ID do Google Analytics (UA-00000000-0)
    define('SEGMENT_GL_ADWORDS_ID', ''); //ID do pixel do Adwords (todo o site)
    define('SEGMENT_GTM', ''); //Label do pixel do Adwords (todo o site)
    
endif;