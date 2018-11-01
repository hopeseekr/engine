<?php
/**
 * User-centric statistics.
 *
 * @author Theodore R. Smith
 */
namespace Minds\Core\UserStats;

use Minds\Entities\User;

class UserStats
{
    /**
     * Returns the number of hours an account has been alive.
     */
    public function findHoursSinceCreation(User $user): int
    {
        $then = $this->getUserCreatedAt($user);
        $now = time();

        // Due to a quirk in PHP backward-compatibility, round() always
        // returns a float. Thus, we need to type-cast it to an integer.
        return (int) round(($now - $then) / 3600);
    }

    /**
     * Returns the epoch time from when the user was created.
     */
    protected function getUserCreatedAt(User $user): int
    {
        return (int) $user->time_created;
    }

}
