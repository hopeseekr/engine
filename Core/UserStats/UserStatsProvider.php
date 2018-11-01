<?php

/**
 * Minds UserStatus Provider
 *
 * @author Theodore R. Smith
 */

namespace Minds\Core\UserStats;

use Minds\Core\Di\Provider;

class UserStatsProvider extends Provider
{
    public function register()
    {
        $this->di->bind('UserStats', function ($di) {
            return new UserStats();
        });
    }
}
