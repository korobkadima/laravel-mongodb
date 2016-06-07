<?php namespace Jenssegers\Mongodb\Transactions;

/**
 * Class Transactions
 * @package Jenssegers\Mongodb\Transactions
 */

class Transactions {

    /**
     * MongoDB object
     *
     * @var $mongodb
     */
    private $mongodb;

    /**
     * Transactions constructor.
     */
    public function __construct()
    {
        $this->mongodb = \DB::connection('mongodb')->getMongoDB();
    }

    /**
     * Begin Transaction
     *
     * @return object
     */
    public function beginTransaction()
    {
        return $this->mongodb->command(["beginTransaction", "isolation" => [ "mvcc" ]]);
    }

    /**
     * Commit Transaction
     *
     * @return object
     */
    public function commitTransaction()
    {
        return $this->mongodb->command(["commitTransaction"]);
    }

    /**
     * Rollback Transaction
     *
     * @return object
     */
    public function rollbackTransaction()
    {
        return $this->mongodb->command(["rollbackTransaction"]);
    }
}