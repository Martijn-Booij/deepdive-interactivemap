<!-- <?php
// class userController {
//     function login()
//     {
//         if (isset($_POST["submit"])) {
//             $email = $_POST["email2"];
//             $password1 = $_POST["password1"];
//             $sql = "SELECT * FROM gebruikers_accounts WHERE email = :email AND password = :password1";
//             $stmt = $conectie->prepare($sql);
//             $stmt->bindParam(':email2', $email);
//             $stmt->bindParam(':password1', $password1);
//             $stmt->execute();
//             $result = $stmt->fetch(PDO::FETCH_ASSOC);
//             if ($result) {
//                 $_SESSION["id"] = $result["id"];
//                 $_SESSION["email"] = $result["email"];
//                 $_SESSION["password1"] = $result["password1"];
//                 $_SESSION["vollenaam"] = $result["vollenaam"];
//                 header("Location: index.php");
//             } else {
//                 echo "Uw wachtwoord is incorrect!";
//             }
//         }

//     }
//     function logout()
//     {
//         session_start();
//         session_destroy();
//         header("Location: login.php");

//     }
// } -->