<?php
  function passwordGenerator($passLength, $passWhitNumbers, $passWhitLetters, $passWhitSpecials) {
    $randomPassword = '';
    $charsNumber ='0123456789';
    $charsLetters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charsSpecials ='!@#$%^&*()';
    $charsAccepted = '';
    if ($passWhitNumbers) {
      $charsAccepted .= $charsNumber;
    }

    if ($passWhitLetters) {
        $charsAccepted .= $charsLetters;
    }

    if ($passWhitSpecials) {
        $charsAccepted .= $charsSpecials;
    }

    while (strlen($randomPassword) < $passLength) {
      $randomIndex = rand(0, strlen($charsAccepted) - 1);

      if(strpos($randomPassword, $charsAccepted[$randomIndex]) === false){
        $randomPassword .= $charsAccepted[$randomIndex];
      }
    }



    return [
            'password' => $randomPassword, 
            'maxValueAcepted' => strlen($charsAccepted), 
          ];
  };

  if(isset($_GET['passwordLength'])){
    $passwordLength = (int) $_GET['passwordLength'];
    $passWhitNumbers = true;
    $passWhitLetters = true;
    $passWhitSpecials = true;
    $randomPassword = passwordGenerator($passwordLength,$passWhitNumbers, $passWhitLetters, $passWhitSpecials );
  }
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

    <p class="mt-5 bg-info bg-opacity-50 px-2 py-3 rounded text-white fw-bold">
      Password Generata :
      <span class="text-danger">
        <?php 
          if(isset($passwordLength)){
            echo $randomPassword['password'];
          }else{
            echo 'nessun parametro valido inserito';
          }
        
        ?>
      </span>
      
    </p>

    <div class="row">
      <div class="coll">
        <form class="mt-5 bg-white p-3 rounded" action="index.php" method="get">
          <div class="mb-3">
            <label for="passwordLength" class="form-label">
              Lunghezza password:  
            </label>
            <input 
              type="number" 
              class="form-control" 
              id="passwordLength" 
              name="passwordLength" 
              min="0"
              max="<?=$randomPassword['maxValueAcepted'] ?? '72'?>" 
              value="<?php 
                  if(isset($passwordLength)){
                    echo (string) $passwordLength;
                  }
              ?>"
            >
          </div>
          <button type="submit" class="btn btn-primary">
            Genera Password
          </button>
          <button type="button" class="btn btn-secondary">
            Annulla
          </button>
        </form>
      </div>
    </div>
  </div>

</body>
</html>