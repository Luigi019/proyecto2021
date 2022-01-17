<?php

namespace App\Helpers;

use Mautic\Auth\ApiAuth;
use Mautic\Exception\ContextNotFoundException;
use Mautic\MauticApi;

class Mautic
{
   private static $instance;
   private $baseURL;
   private $Api;
   private $ApiURL;
   private $auth;
   private $companyName;
   private $userName;
   private $userPass;

   public function __construct()
   {
      $this->userName = config('mautic.userName');
      $this->userPass = config('mautic.userPass');
      $this->baseURL = config('mautic.baseURL');
      $this->companyName = config('mautic.companyName');

      $this->Api = new MauticApi();
      $this->ApiURL = $this->baseURL . '/api/';
   }

   private function basicAuth()
   {

      $settings = [
         'userName' => $this->userName, // Create a new user
         'password' => $this->userPass, // Make it a secure password
      ];

      // Initiate the auth object specifying to use BasicAuth
      $initAuth = new ApiAuth();
      $auth = $initAuth->newAuth($settings, 'BasicAuth');
      $timeout = 10;
      $auth->setCurlTimeout($timeout);
      $this->auth = $auth;
   }

   /**
    * Instantiates a new API interface
    *
    * @param string $apiName
    * @return object
    * @throws ContextNotFoundException
    */
   private function setApi(string $apiName): object
   {
      if (!$this->auth) {
         $this->basicAuth();
      }
      return $this->Api->newApi($apiName, $this->auth, $this->ApiURL);
   }

   /**
    * Creates or updates data of a contact
    *
    * @param array $data
    * @return array
    */
   public function setContact(array $data): array
   {
      $contactApi = $this->setApi('contacts');
      return $contactApi->create($data);
   }

   /**
    * Creates a new contact
    *
    * @param string $name
    * @param string $phone
    * @param string $email
    * @param string $companyName
    * @return array
    */
   public function createContact(string $name, string $email): array
   {


      $data = array(
         'name'               => $name,
         'email'              => $email,
         'ipAddress'          => $_SERVER['REMOTE_ADDR'],
         'overwriteWithBlank' => true,
      );
      return $this->setContact($data);
   }

   /**
    * Updates the contact name
    *
    * @param string $email
    * @param string $newName
    * @return array
    */
   public function updateName(string $email, string $newName): void
   {
      $data = array(
         'name'          => $newName,
         'email'              => $email,
         'ipAddress'          => $_SERVER['REMOTE_ADDR'],
         'overwriteWithBlank' => false,
      );
      $this->setContact($data);
   }

   /**
    * Updates the contact phone
    *
    * @param string $email
    * @param string $newPhone
    * @return void
    */
   public function updatePhone(string $email): void
   {
      $data = array(
         'email'              => $email,
         'ipAddress'          => $_SERVER['REMOTE_ADDR'],
         'overwriteWithBlank' => false,
         'lastActive' => gmdate('Y-m-d H:i:s'),
      );
      $this->setContact($data);
   }

   /**
    * Updates the contact email
    *
    * @param string $oldMail
    * @param string $newMail
    * @return array
    */
   public function updateMail(string $oldMail, string $newMail): void
   {
      $contactId = $this->getContactId($oldMail);
      $data = array(
         'email' => $newMail,
      );
      $contactApi = $this->setApi('contacts');
      $contactApi->edit($contactId, $data, false);
   }

   /**
    * Returns a contact's id
    *
    * @param string $email
    * @return integer
    */
   public function getContactId(string $email): int
   {
      $data = array(
         'email' => $email,
      );
      $newContact = $this->setContact($data);
      $contactId = $newContact['contact']['id'];
      return $contactId;
   }

   /**
    * Updates the last login date and time of the user
    *
    * @param string $email
    * @return array
    */
   public function checkIn(string $email): array
   {
      $data = array(
         'email' => $email,
         'lastActive' => gmdate('Y-m-d H:i:s'),
      );
      return $this->setContact($data);
   }

   /**
    * Adicionar una tag al contacto correspondiente en Mautic
    *
    * @param string $email
    * @param string $tag
    * @return void
    */
   public function setTag(string $email, string $tag): void
   {
      $data = array(
         'email' => $email,
         'tags' => array(
            $tag
         ),
      );
      $this->setContact($data);
   }
   
}
