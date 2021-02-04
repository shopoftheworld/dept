<?php

use Drupal\Core\Database\Database;
use Drupal\user\Entity\User;

/**
  * @file
  * Contains  \Drupal\dept
  */
namespace Drupal\dept;

/**
 * Defines a service for authenticating user
 */
class AuthenticateUser {
    
  /**
  * Constructor
  */
  public function __construct()  {

  }

  /** 
  * calls the authenticate for give user
  */
  public function get($user) {

        user_login_finalize($user);
  }
}