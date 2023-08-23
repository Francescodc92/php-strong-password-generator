<?php 
  function passwordGenerator($passLength, $passWhitNumbers, $passWhitLetters, $passWhitSpecials, $repeatPermission) {
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

        if(!$repeatPermission && strpos($randomPassword, $charsAccepted[$randomIndex]) === false){
         
          $randomPassword .= $charsAccepted[$randomIndex];
        
        }elseif($repeatPermission){
          $randomPassword .= $charsAccepted[$randomIndex];
        }

      }

    
      
      return [
        'password' => $randomPassword, 
        'maxValueAcepted' => strlen($charsAccepted), 
      ];
  };
?>