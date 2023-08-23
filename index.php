<?php
  session_start();
  require_once __DIR__ .'/helpers/function.php';

  if(isset($_GET['passwordLength'])){    
    $passwordLength = (int) $_GET['passwordLength'];
    $repeatPermission = ($_GET['acceptRepetitions'] ?? 'true') === 'true' ? true : false ;
    $passWithNumbers = ($_GET['number'] ?? true)  == 'on' ? true : false ;
    $passWithLetters = ($_GET['letters'] ?? false)  == 'on' ? true : false ;
    $passWithSpecials = ($_GET['specials'] ?? false)  == 'on' ? true : false ;
    $randomPasswordEndMaxLangth = passwordGenerator($passwordLength,$passWithNumbers, $passWithLetters, $passWithSpecials, $repeatPermission );
    $_SESSION['randomPasswordEndMaxLangth'] = $randomPasswordEndMaxLangth;
    
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
              value="<?= isset($passwordLength) ? (string) $passwordLength : '';?>"
            >
          </div>
          <div class="form-check">
            
            <input 
              class="form-check-input" 
              type="radio" 
              name="acceptRepetitions" 
              id="acceptRepetitions1" 
              value="true" 
              <?= isset($repeatPermission) &&  $repeatPermission ? 'checked': '' ?> 
            >

            <label class="form-check-label" for="acceptRepetitions1">
               permetti ripetizioni di caratteri
            </label>
          </div>
          <div class="form-check mb-3">

            <input 
              class="form-check-input" 
              type="radio" 
              name="acceptRepetitions" 
              id="acceptRepetitions2" 
              value="false" 
              <?= isset($repeatPermission) &&  $repeatPermission ? '': 'checked' ?> 
            >

            <label class="form-check-label" for="acceptRepetitions2">
              non permettere ripetizioni di caratteri
            </label>

          </div>
          <p class="mb-2">La password potrà contenere?<span class="text-info fs-6 fst-italic">seleziona almeno 1 o più tipi di caratteri</span> </p>
          <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
            <input 
              type="checkbox" 
              class="btn-check" 
              id="number" 
              autocomplete="off" 
              name="number"
              <?= isset($passWithNumbers) && $passWithNumbers ? 'checked' : ''?>
            >
            <label class="btn btn-outline-primary" for="number">Numeri</label>

            <input 
              type="checkbox" 
              class="btn-check" 
              id="letters"
              name="letters" 
              autocomplete="off"
              <?= isset($passWithLetters) && $passWithLetters ? 'checked' : ''?>
            >
            <label class="btn btn-outline-primary" for="letters">Lettere</label>

            <input 
              type="checkbox" 
              class="btn-check" 
              id="specials" 
              name="specials"  
              autocomplete="off"
              <?= isset($passWithSpecials) && $passWithSpecials ? 'checked' : ''?>
            >
            <label class="btn btn-outline-primary" for="specials">caratteri speciali</label>
          </div>

          <div class="mt-3">
            <button type="submit" class="btn btn-primary">
              Genera Password
            </button>
            <button type="button" class="btn btn-secondary">
              Annulla
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
