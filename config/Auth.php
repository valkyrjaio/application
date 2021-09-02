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
        $this->repository           = ConfigValue::REPOSITORY;
        $this->gate                 = ConfigValue::GATE;
        $this->policy               = ConfigValue::POLICY;
        $this->alwaysAuthenticate   = false;
        $this->keepUserFresh        = false;
        $this->authenticateRoute    = ConfigValue::AUTHENTICATE_ROUTE;
        $this->authenticateUrl      = ConfigValue::AUTHENTICATE_URL;
        $this->notAuthenticateRoute = ConfigValue::NOT_AUTHENTICATE_ROUTE;
        $this->notAuthenticateUrl   = ConfigValue::NOT_AUTHENTICATE_URL;
        $this->passwordConfirmRoute = ConfigValue::PASSWORD_CONFIRM_ROUTE;
        $this->useSession           = true;

        parent::__construct([], true);
    }
}
