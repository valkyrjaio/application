<?php

namespace App\ORM\Repositories;

use Valkyrja\ORM\Repositories\NativeRepository;

/**
 * Class UserRepository.
 */
class UserRepository extends NativeRepository
{
    // We can do custom stuff for all User entities.
    //  Examples:
    //      $entityManager->repository(User::class)->create(new User());
    //      $entityManager->create(new User(), true);
}
