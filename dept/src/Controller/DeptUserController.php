<?php

namespace Drupal\dept\Controller;

use Drupal\Core\Database\Database;
use Drupal\user\Entity\User;
//use Drupal\Core\Controller\ControllerBase;
//use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
//use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class RestOutputController
 * @package Drupal\dept\Controller
 */
class DeptUserController {

  /**
   * @return array
   */
  public function updateUsers() {
    $build = [
      '#cache' => [
        'max-age' => 60,
        'contexts' => ['url']
      ]
    ];

    $count = 0;

    // check if there is a query string 
    // get the query string
    $query = \Drupal::request()->query->get('auth_token'); 

    if(isset($query)) {

      $db_connection = Database::getConnection();
      $results = $db_connection->query('SELECT uid FROM {users}')->fetchAllAssoc('uid');

      // check if a user exists with that token
      $results = $db_connection->query('SELECT uid FROM {users}')->fetchAllAssoc('uid');

      foreach ($results as $data) {

      // if user has the required token 
      $user = User::load($data->uid);

      if ($user->field_auth_token->value == $query) {

        $data = \Drupal::service('dept.authenticateuser');
        $response = $data->get($user);

        $message = 'A user ID = ' . $user->uid->value . ' was found with this token and the user was logged in'; 
        }
      }
    }

    $build['#title'] = 'Users updated';
    $build['#markup'] = $message;
    return $build;

  }
}
