<?php

namespace Cable\Postgresql;


class PreparedStatement
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var ConnectionInterface
     */
    private $connection;

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
        $result = pg_execute($this->connection->getConnection(), $this->id, $parameters);

        return new QueryResult($result);
    }

}
