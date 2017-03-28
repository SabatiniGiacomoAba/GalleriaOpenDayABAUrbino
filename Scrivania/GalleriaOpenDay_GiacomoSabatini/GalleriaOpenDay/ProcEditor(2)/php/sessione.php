<?php
// Registra le chiavi di sessione
function login($info){
    $_SESSION['loggedin_site']=$info;
}
// Richiede le chiavi di sessione
function isLogged(){
    return $_SESSION['loggedin_site'];
}
?>
