<?php

namespace Core;

class Auth extends Database
{

   public function login($input)
   {
      $name = $input['name'] ?? '';
      $password = $input['password'] ?? '';

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

   public function getUser($id)
   {

      $userData = $this->select(
         "SELECT * FROM users WHERE id = :id",
         [
            'id' => $id
         ],
         false
      );

      return json_encode($userData);
   }

   public function checkJWT() {}
}
