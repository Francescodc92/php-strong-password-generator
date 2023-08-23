<?php 
  session_start();

  $randomPasswordEndMaxLangth = $_SESSION['randomPasswordEndMaxLangth'];

?>


<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--bootstrap-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <!--style css-->
  <link rel="stylesheet" href="./CSS/style.css">
  <title>PHP Strong Password Generator</title>
</head>
<body class="bg-primary bg-gradient vh-100">
  <div class="container">
    <h1 class="text-center pt-5">Strong Password Generator</h1>
    <h2 class="text-center mt-2">Genera una password sicura </h2>

    <p class="mt-5 bg-info bg-opacity-75 px-2 py-3 rounded text-white fw-bold">
      Password Generata :
      <span class="text-success">
        <?php 
          if(isset($randomPasswordEndMaxLangth)){
            echo $randomPasswordEndMaxLangth['password'];
          }else{
            echo 'nessun parametro valido inserito';
          }
        
        ?>
      </span>
      
    </p>
</body>
</html>