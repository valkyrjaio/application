<?php

/*
 *-------------------------------------------------------------------------
 * Path Configuration
 *-------------------------------------------------------------------------
 *
 * //
 *
 */

use Valkyrja\Config\Enums\ConfigKeyPart as CKP;
use Valkyrja\Config\Enums\EnvKey;
use Valkyrja\Path\Enums\Config;

return [
    /*
     *-------------------------------------------------------------------------
     * Path Patterns
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    CKP::PATTERNS => env(
        EnvKey::PATH_PATTERNS,
        array_merge(
            Config::PATTERNS,
            [
                'number' => '(\d+)',
            ]
        )
    ),
];
