<?php
session_start();
require ('dbconn.php');
if (isset($_GET['enviamail'])) {
    $exp = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/';
    if ($_GET['usermail'] == "") {
        $_SESSION['message'] = "Debe introducir un mail";
        header('Location: email.php');
        die();
    }
    if (preg_match($exp, $_GET['usermail'])) {
        $nuevoMail = $_GET['usermail'];
        $mi_query_sel = "SELECT * FROM emails";
        $mi_query_sel_exec = mysqli_query($conn, $mi_query_sel);
        //$query_sel = mysqli_fetch_array($mi_query_sel_exec);
        while ($query_sel = mysqli_fetch_array($mi_query_sel_exec)){
            if($query_sel['email'] == $nuevoMail){
                $_SESSION['message'] = "El mail ya existe en la base de datos";
                header('Location: email.php');
                die();
                break;
            }
        }
        $mi_query_insert = "INSERT INTO emails (email) VALUES ('$nuevoMail')";
        $mi_query_insert_exec = mysqli_query($conn, $mi_query_insert);
        //$query_login_resinsert = mysqli_fetch_array($mi_query_insert);
        $_SESSION['message'] = "El mail ha sido introducido en la base de datos";
        header('Location: email.php');
        die();
    }else{
        $_SESSION['message'] = "El Email introducido no es correcto";
        header('Location: email.php');
    }
}

?>