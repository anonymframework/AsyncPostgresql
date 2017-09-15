<?php

namespace Cable\Postgresql;


/**
 * Interface ConnectionInterface
 * @package Cable\Postgresql
 */
interface ConnectionInterface
{

    /**
     * @return resource
     */
    public function getConnection();

}