<?php

class Patients extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $sex;

    /**
     *
     * @var string
     */
    public $religion;

    /**
     *
     * @var string
     */
    public $phone;

    /**
     *
     * @var string
     */
    public $address;

    /**
     *
     * @var integer
     */
    public $nik;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("patients");
        $this->setSource("datars");
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Patients[]|Patients|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null): \Phalcon\Mvc\Model\ResultsetInterface
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Patients|\Phalcon\Mvc\Model\ResultInterface|\Phalcon\Mvc\ModelInterface|null
     */
    public static function findFirst($parameters = null): ?\Phalcon\Mvc\ModelInterface
    {
        return parent::findFirst($parameters);
    }

}
