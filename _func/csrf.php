<?php
/**
* @author [bangameck.rra]
* @email [rahmad.looker@gmail.com]
* @create date 2021-06-11 14:32:29
* @modify date 2021-06-11 14:34:09
* @desc [description]
*/

function createToken()
{
    $token = base64_encode(openssl_random_pseudo_bytes(32));
    $_SESSION['csrfvalue'] = $token;
    return $token;
}
function unsetToken()
{
    unset($_SESSION['csrfvalue']);
}
function validation()
{
    include 'database.php';
    $csrfvalue = isset($_SESSION['csrfvalue']) ? mysqli_real_escape_string($db, $_SESSION['csrfvalue']) : '';
    if (isset($_POST['csrf_name'])) {
        $value_input = $_POST['csrf_name'];
        if ($value_input == $csrfvalue) {
            unsetToken();
            return true;
        } else {
            unsetToken();
            return false;
        }
    } else {
        unsetToken();
        return false;
    }
}