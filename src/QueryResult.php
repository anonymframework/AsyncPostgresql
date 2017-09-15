<?php


namespace Cable\Postgresql;


/**
 * Class QueryResult
 * @package Cable\Postgresql
 */
class QueryResult
{

    /**
     * @var bool|resource
     */
    private $result;


    /**
     * QueryResult constructor.
     * @param resource|boolean $result
     */
    public function __construct($result)
    {
        $this->result = $result;
    }


    /**
     * @return bool
     */
    public function isSuccess(){
        return is_resource($this->result);
    }

    /**
     * @return bool
     */
    public function isFailure()
    {
        return is_bool($this->result);
    }
}
