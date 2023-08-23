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
?>