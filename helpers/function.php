<?php 
  function passwordGenerator($passLength, $passWithNumbers, $passWithLetters, $passWithSpecials, $repeatPermission) {
      $randomPassword = '';
      $charsNumber ='0123456789';
      $charsLetters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charsSpecials ='!@#$%^&*()';
      $charsAccepted = '';

      if ($passWithNumbers) {
        $charsAccepted .= $charsNumber;
      }

      if ($passWithLetters) {
          $charsAccepted .= $charsLetters;
      }

      if ($passWithSpecials) {
          $charsAccepted .= $charsSpecials;
      }

      while (strlen($randomPassword) < $passLength ) {
        $randomIndex = rand(0, strlen($charsAccepted) - 1);

        if(!$repeatPermission && strpos($randomPassword, $charsAccepted[$randomIndex]) === false){
         
          $randomPassword .= $charsAccepted[$randomIndex];
        
        }elseif($repeatPermission){
          $randomPassword .= $charsAccepted[$randomIndex];
        }elseif(!$repeatPermission && strlen($randomPassword) == strlen($charsAccepted)){
          break;
        }

      }

    
      header("Location: " . './results.php');
      return [
        'password' => $randomPassword, 
        'maxValueAcepted' => strlen($charsAccepted), 
      ];
  };
?>