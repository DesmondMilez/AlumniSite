<?php


namespace App\Applications\Datatables;


use App\Models\JobAdvert;

class JobAdvertDatatable extends AbstractDatatable
{

    protected function editColumns()
    {
        $this->datatable->add_column('actions', function ($row) {
            $editLink = route('admin.job-ad.edit', $row->id);
            $deleteLink = route('admin.job-ad.delete', $row->id);
            $edit = "<a href='{$editLink}' class='btn btn-default'>Промени</a>";
            $delete = "<a href='{$deleteLink}' class='btn btn-default'>Избриши</a>";

            return "{$edit} {$delete}";
        });

        $this->datatable->add_column('techs', function ($row) {
            /** @var JobAdvert $job */
            $job = JobAdvert::find($row->id);

            return implode(', ', $job->Skills->lists('name')->toArray());
        });

        return $this->datatable;
    }
}