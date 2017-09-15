<?php

namespace Cable\Postgresql;


class AsyncPreparedStatement
{

    use ConnectionAwareTrait;
    /**
     * @var string
     */
    private $id;


    /**
     * PreparedStatement constructor.
     * @param string $id
     * @param ConnectionInterface $connection
     */
    public function __construct($id, ConnectionInterface $connection)
    {
        $this->id = $id;
        $this->connection = $connection;
    }


    /**
     * @param array $parameters
     * @return QueryResult
     */
    public function execute(array $parameters = array()){
        $result = pg_send_execute($this->connection->getConnection(), $this->id, $parameters);

        return new QueryPending($this->connection, $result);
    }

}
