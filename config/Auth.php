<?php

declare(strict_types=1);

namespace Config;

use Valkyrja\Auth\Enums\ConfigValue;
use Valkyrja\Config\Configs\Auth as Model;

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
        parent::__construct(false);

        $this->setAdapter(ConfigValue::ADAPTER);
        $this->setUserEntity(ConfigValue::USER);
        $this->setAdapters(array_merge(ConfigValue::ADAPTERS, []));
        $this->setRepository(ConfigValue::REPOSITORY);
        $this->setAlwaysAuthenticate(ConfigValue::ALWAYS_AUTHENTICATE);
        $this->setKeepUserFresh(ConfigValue::KEEP_USER_FRESH);
        $this->setAuthenticateRoute(ConfigValue::AUTHENTICATE_ROUTE);
        $this->setPasswordConfirmRoute(ConfigValue::PASSWORD_CONFIRM_ROUTE);
    }
}
