<?php
if(isset($_POST['submit'])){

    $firstName = htmlentities($_POST['firstName']);
    $lastName = htmlentities($_POST['lastName']);
    $email = htmlentities($_POST['email']);
    $tel = htmlentities($_POST['tel']);
    $message = htmlentities($_POST['message']);

    $recapS = '6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe';
    $response = $_POST['g-recaptcha-response'];
    
    $payload = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$recapS.'&response='.$response);
    $resultRecap = json_decode($payload, true);
    
    if(!empty($response)){
        if($resultRecap['success'] != 1){
            return false;
            header("Location: /pages/contact.php?message=Please verify that you are not a robot.");
        }else{
            if(!empty($firstName) && !empty($lastName) && !empty($email) && !empty($message)){
                if(filter_var($email, FILTER_VALIDATE_EMAIL) 
                    && preg_match("/^[a-zA-Z]*$/", $firstName) 
                    && preg_match("/^[a-zA-Z]*$/", $lastName)){
                        if(empty($tel)){
                            emailDataPrep($firstName, $lastName, $email, $tel, $message);
                        }
                        else{
                            if(preg_match("/^[0-9]+$/", $tel)){
                                emailDataPrep($firstName, $lastName, $email, $tel, $message);
                            }
                            else{
                                header("Location: /pages/contact.php?message=Een of meer velden hebben een error. Probeer het later nog eens.");
                            }
                        }
                }else{
                    header("Location: /pages/contact.php?message=One or more fields have an error. Please check and try again.");
                }
            }else{
                header("Location: /pages/contact.php?message=One or more fields have an error. Please check and try again.");
            }
        }
    }else{
        header("Location: /pages/contact.php?message=Please verify that you are not a robot.");
    }
}else{
    header("Location: /404 ");
}

function emailDataPrep($firstName, $lastName, $email, $tel, $message)
{
    $emailDataPrep = array();
                            
    $emailDataPrep['adminEmail'] = "02e1e733e5-9d74f3@inbox.mailtrap.io";
    $emailDataPrep['voorNaam'] = $firstName;
    $emailDataPrep['achterNaam'] = $lastName;
    $emailDataPrep['email'] = $email;
    $emailDataPrep['tel'] = $tel;
    $emailDataPrep['Bericht'] = $message;

    session_start();
    $_SESSION['emailData'] = $emailDataPrep;

    header("Location: /src/php/mail/index.php");
}