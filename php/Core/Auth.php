<?php

namespace Core;

class Auth extends Database
{

   public function login($data)
   {
      $name = $data['name'] ?? '';
      $password = $data['password'] ?? '';

      $user = $this->select(
         "SELECT * FROM users WHERE name = :name AND password = :password",
         [
            'name' => $name,
            'password' => $password
         ],
         false
      );

      if ($user) {
         return "Giriş Başarılı";
      } else {
         return "Eksik ya da yanlış bilgi";
      }
   }

}
