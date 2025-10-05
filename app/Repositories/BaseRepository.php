<?php

namespace App\Repositories;

use App\Helpers\FormatHelpers;
use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{

    protected $model;


    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

}
