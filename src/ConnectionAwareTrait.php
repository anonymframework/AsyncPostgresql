<?php
/**
 * Created by PhpStorm.
 * User: Acer
 * Date: 15.9.2017
 * Time: 18:09
 */

namespace Cable\Postgresql;


trait ConnectionAwareTrait
{

    /**
     * @var ConnectionInterface
     */
    protected $connection;

}