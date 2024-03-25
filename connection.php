<?php
$dbname = "gestionbriefs";
$user = "root";
$pass = "";

//partie de connection
try {
    $connect = new PDO("mysql:host=localhost;dbname=$dbname", $user, $pass);
    
} catch (PDOException $ex) {
    echo $ex->getMessage();
    
}
//les fonctions 
function login_Apprenant($email, $password, $pdo)
{
    $stmLoginApprenant = $pdo->prepare("SELECT* FROM apprenant WHERE email=:email and motPass=:pw");
    $stmLoginApprenant->bindParam(':email', $email);
    $stmLoginApprenant->bindParam(':pw', $password);
    $stmLoginApprenant->execute();
    $apprenant = $stmLoginApprenant->fetch(PDO::FETCH_ASSOC);
    if ($apprenant)
        return $apprenant['idApprenant'];

    else
        return false;
}

function login_Formateur($email, $pw, $pdo)
{
    $stmLoginFormateur = $pdo->prepare("SELECT * FROM formateur WHERE email=:email and motPass=:pw");
    $stmLoginFormateur->bindParam(':email', $email);
    $stmLoginFormateur->bindParam(':pw', $pw);
    $stmLoginFormateur->execute();
    $data = $stmLoginFormateur->fetch(PDO::FETCH_ASSOC);

    return $data['idFormateur'];
}