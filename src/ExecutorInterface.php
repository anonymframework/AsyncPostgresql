<?php
namespace Cable\Postgresql;

interface ExecutorInterface
{

    /**
     * @param ConnectionInterface postgresql connection
     * @param string $query the query string that will be executed
     * @param array $parameters
     * @return mixed
     */
    public function query(ConnectionInterface $connection, $query, array $parameters = array());

}
