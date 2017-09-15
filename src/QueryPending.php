<?php
namespace Cable\Postgresql;

/**
 * Class QueryPending
 * @package Cable\Postgresql
 */
class QueryPending
{

    use ConnectionAwareTrait;

    /**
     * @var bool
     */
    private $result;


    /**
     * @var callable
     */
    private $callback;

    /**
     * QueryPending constructor.
     * @param ConnectionInterface $connection
     * @param bool $result
     */
    public function __construct(ConnectionInterface  $connection, $result)
    {
        $this->connection = $connection;
        $this->result = $result;
    }


    /**
     * @param callable $callback
     * @return $this
     */
    public function then(callable  $callback)
    {
        $this->callback = $callback;
        $this->resolve();
        return $this;
    }

    /**
     *
     */
    public function resolve(){

        if ($this->result === false) {
            throw new AsyncQueryFailedException('Your query is failed');
        }

        $result = pg_get_result($this->connection->getConnection());

        $callback = $this->callback;
        $callback($result);
    }

}
