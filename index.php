<?php
  define('LOGIN','root');
  define('PASSWORD','toor');
  $errorMessage = '';
 
  // Test de l'envoi du formulaire
  if(!empty($_POST)) 
  {
    // Les identifiants sont transmis ?
    if(!empty($_POST['login']) && !empty($_POST['password'])) 
    {
      // Sont-ils les mêmes que les constantes ?
      if($_POST['login'] !== LOGIN) 
      {
        $errorMessage = 'Mauvais login !';
      }
        elseif($_POST['password'] !== PASSWORD) 
      {  
        $errorMessage = 'Mauvais password !';
      }
        else
      {
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['login'] = LOGIN;
        // On redirige vers le fichier index.php
        header('Location: list.php');
        exit();
      }
    }
      else
    {
      $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
  }
?>
<html lang = "en">
   
   <head>
      <title>login</title>
      <link href = "log.css" rel = "stylesheet">
      
   </head>
	
   <body>
      
        <div class="log">
	        <h1>Login</h1>
            <form method="post" action="index.php">
                <label for="login"></label>
                <input type="text" id ="login" name="login" placeholder="Username" required="required" />

                <label for="password"></label>
                <input type="password" name="password" id ="password" placeholder="Password" required="required" />

                <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
            </form>
            Click here to clean <a href = "logout.php" tite = "Logout">Session.
        </div> 
        
   </body>
</html>