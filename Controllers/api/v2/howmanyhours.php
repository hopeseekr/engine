<?php
/**
 * Minds HowManyHours
 *
 * @version 2
 * @author Theodore R. Smith
 */
namespace Minds\Controllers\api\v2;

use Minds\Core;
use Minds\Core\Di\Di;
use Minds\Core\UserStats\UserStats;
use Minds\Interfaces;
use Minds\Api\Factory;
use Minds\Entities;

class howmanyhours implements Interfaces\Api, Interfaces\ApiIgnorePam
{
    /**
     * Equivalent to HTTP GET method
     * @param  array $pages
     * @return mixed|null
     */
    public function get($pages)
    {
        Factory::isLoggedIn();

        $response = [];
        /** @var UserStats $userStats */
        $userStats = Di::_()->get('UserStats');

        // Get the current logged-in user.
        /** @var Entities\User $currentUser */
        $currentUser = Core\Session::getLoggedinUser();

        $response['hours'] = $userStats->findHoursSinceCreation($currentUser);

        return Factory::response($response);
    }

    /**
     * Equivalent to HTTP POST method
     * @param  array $pages
     * @return mixed|null
     */
    public function post($pages)
    {
        return Factory::response([]);
    }

    /**
     * Equivalent to HTTP PUT method
     * @param  array $pages
     * @return mixed|null
     */
    public function put($pages)
    {
        return Factory::response([]);
    }

    /**
     * Equivalent to HTTP DELETE method
     * @param  array $pages
     * @return mixed|null
     */
    public function delete($pages)
    {
        return Factory::response([]);
    }
}
