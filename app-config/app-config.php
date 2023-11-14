<?php

    // DATABASE
    // define("_HOST_", "localhost");
    // define("_USERNAME_", "root");
    // define("_PASSWORD_", "");
    // define("_DATABASE_", "iatm_db");
    
    define("_HOST_", "localhost");
    define("_USERNAME_", "planetbu_iatm_db");
    define("_PASSWORD_", "tVST6zCCwQps");
    define("_DATABASE_", "planetbu_iatm_db");

    // CLIENT NAME
    define("_APP_NAME_", "Atlas Gestion IATM");

    // OPTIONS
    define("_ENABLE_BACKUP_", true);
    define("_ENABLE_CAISSE_", true);
    define("_ENABLE_AVANCE_", _ENABLE_CAISSE_ && true);
    define("_ENABLE_DROITS_TIMBRE_", true);
    define("_ENABLE_CLIENT_USER_", true);
    define("_ENABLE_SUB_CATEGORIE_", true);
    define("_ENABLE_PRODUCTION_", true);
    define("_ENABLE_SERVICE_", true);
    define("_ENABLE_DEMONTAGE_", _ENABLE_PRODUCTION_ && true);
    define("_ENABLE_ERRORS_LOG_", true);

    // BACKUP EMAIL
    define("_EMAIL_PORT_", 2525);
    define("_EMAIL_HOST_", "send.smtp.com");
    define("_EMAIL_USERNAME_", "test@fms.works");
    define("_EMAIL_PASSWORD_", "E9y2utPfjPZZET4");
    
    // define("_EMAIL_BACKUP_", "iamt.backup.2022@gmail.com");
    define("_EMAIL_BACKUP_", "atlashost@gmail.com");

    // BACKUP KEY
    define("_BACKUP_KEY_NAME_", "BACKUPKEY");
    define("_BACKUP_KEY_VALUE_", 'FC:NkC]~kTaHBzNFuEq]N2Uv{bPTQ~zXw<Cxf&,EJ:V"HhUP{Jj<9eAT&2%^8!@Zfht^M.h3#$c6f)C(7HW8C)V>[$X{&TS->%S');

    // TIMEZONE
    define("_TIMEZONE_", "Africa/Casablanca");

    // URL
    define("_DOMAIN_NAME_", "");
    define("_APP_DIRECTORY_", "/iatm/");
    $PROTOCOL = (isset($_SERVER['HTTPS'])) ? ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http" : "http";
    $CURRENT = (!empty(_DOMAIN_NAME_) && strpos($_SERVER['HTTP_HOST'], _DOMAIN_NAME_) !== false) ? "/" : _APP_DIRECTORY_;
    define("_BASE_URL_", $PROTOCOL."://".$_SERVER['HTTP_HOST'].$CURRENT);
    define("_BASE_PATH_", $_SERVER["DOCUMENT_ROOT"].$CURRENT);
    define("_BACKUP_PATH_", _BASE_PATH_."app-config/backup/"); // Folder
    define("_UPLOADS_PATH_", _BASE_PATH_."app-config/uploads/"); // Folder

    // IMAGE
    $IMAGE = file_exists(_BASE_PATH_."app-config/logo_ste.png")
                ? "app-config/logo_ste.png"
                : "assets/logo_ste_default.png";
    define("_STE_LOGO_", $IMAGE);

    // REFRESH
    define("_REFRESH_", stat(_UPLOADS_PATH_)['mtime']+filemtime(_BASE_PATH_."assets/functions.js"));

    // SYSTEM
    ini_set("max_execution_time",180);

?>
