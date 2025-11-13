<?php

namespace App\DataTables;

use Spatie\Permission\Models\Role;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RoleDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action',function ($row) {
                return $this->checkrights($row);
            })
            ->rawColumns(['action']);
    }

    public function checkrights($row)
    {
        $menu = '';
        $editUrl = route('roles.edit', [$row->id]);
        $deleteUrl = route('roles.destroy', [$row->id]);
        $showUrl = route('roles.show', [$row->id]);
        $menu .='<div class="dropdown">';
        $menu .='<button class="btn" 
                 type="button" data-bs-toggle="dropdown"
                 aria-expanded="false"><span><i 
                 class="fa fa-ellipsis-v fa-1x text-dark" 
                 aria-hidden="true"></i></span>
                  </button>';
        $menu .='<ul class="dropdown-menu">';

        if(Auth()->user()->can('role-edit')) 
        {
            $menu .='<li><a class="dropdown-item" 
                 href="'.$editUrl.'">Edit</a></li>';
        }
        if(Auth()->user()->can('role-delete')) 
        {
            $menu .='<li><a class="dropdown-item" onclick="dataDelete(event.target,'.$row->id.',\''.url('admin/roles').'/'.$row->id.'\');" data-id="'.$row->id.'">Delete </a></li>';
        }
        $menu .='<li><a class="dropdown-item" 
                 href="'.$showUrl.'">Show</a></li>';
        $menu .='</ul></div>';
        
                 
        
        return $menu;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        $model = Role::select()->orderBy('id','desc');
        return $this->applyScopes($model->newQuery());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('Role-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('add your columns'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Role_' . date('YmdHis');
    }
}
