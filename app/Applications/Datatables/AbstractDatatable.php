<?php


namespace App\Applications\Datatables;


use Datatables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

abstract class AbstractDatatable
{
    /** @var  Datatables */
    protected $datatable;

    /**
     * @param Builder|Collection $query
     */
    public function from($query)
    {
        $this->datatable = Datatables::of($query);
        $this->editColumns();

        return $this->datatable->make(true);
    }

    abstract protected function editColumns();
}