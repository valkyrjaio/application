<?php

/*
 *-------------------------------------------------------------------------
 * Logging Configuration
 *-------------------------------------------------------------------------
 *
 * Logging is very helpful in understanding what occurs within your
 * application when its deployed and used by multiple users aside
 * from you and your developers. Configure that helpfulness here.
 *
 */

use Valkyrja\Config\Enums\ConfigKeyPart as CKP;
use Valkyrja\Config\Enums\EnvKey;

return [
    /*
     *-------------------------------------------------------------------------
     * Logging Log Name
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    CKP::NAME      => env(EnvKey::LOGGER_NAME, 'ApplicationLog'),

    /*
     *-------------------------------------------------------------------------
     * Logging Log File Path
     *-------------------------------------------------------------------------
     *
     * //
     *
     */
    CKP::FILE_PATH => env(EnvKey::LOGGER_FILE_PATH, storagePath('logs/valkyrja.log')),
];
