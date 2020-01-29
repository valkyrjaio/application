<?php

/*
 *-------------------------------------------------------------------------
 * Crypt Configuration
 *-------------------------------------------------------------------------
 *
 * Cryptography configurations for securing data.
 *
 */

use Valkyrja\Config\Enums\ConfigKeyPart as CKP;
use Valkyrja\Config\Enums\EnvKey;

return [
    /*
     *-------------------------------------------------------------------------
     * Crypt Key
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    CKP::KEY      => env(EnvKey::CRYPT_KEY, 'default_key_phrase'),

    /*
     *-------------------------------------------------------------------------
     * Crypt Key Path
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    CKP::KEY_PATH => env(EnvKey::CRYPT_KEY_PATH, envPath('key')),
];
