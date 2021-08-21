<?php

declare(strict_types=1);

namespace Config;

use App\ORM\Entities\User;
use Valkyrja\Auth\Config\Config as Model;
use Valkyrja\Auth\Constants\ConfigValue;

/**
 * Class Auth.
 */
class Auth extends Model
{
    /**
     * Auth constructor.
     */
    public function __construct()
    {
        $this->adapter              = ConfigValue::ADAPTER;
        $this->userEntity           = User::class;
        $this->adapters             = array_merge(ConfigValue::ADAPTERS, []);
        $this->repository           = ConfigValue::REPOSITORY;
        $this->alwaysAuthenticate   = false;
        $this->keepUserFresh        = false;
        $this->authenticateRoute    = ConfigValue::AUTHENTICATE_ROUTE;
        $this->authenticateUrl      = ConfigValue::AUTHENTICATE_URL;
        $this->notAuthenticateRoute = ConfigValue::NOT_AUTHENTICATE_ROUTE;
        $this->notAuthenticateUrl   = ConfigValue::NOT_AUTHENTICATE_URL;
        $this->passwordConfirmRoute = ConfigValue::PASSWORD_CONFIRM_ROUTE;
        $this->useSession           = true;
        $this->useToken             = false;

        parent::__construct([], true);
    }
}
