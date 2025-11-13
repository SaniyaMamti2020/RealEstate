<?php

namespace App\DataTables;

use App\Models\Pages;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PagesDataTable extends DataTable
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
            ->editColumn('page_img',function ($row) {
                if($row['page_img'] != null ){
                    return '<img src="/upload/pages/'.$row['page_img'].'" class="img-fluid rounded" style="height: 70px;width: 70px;" >';
                }else{ 
                    return '<img src="/media/no-image.png" class="img-fluid rounded" style="height: 70px;width: 70px;" >';
                }
            })
            ->editColumn('status',function ($row) {
                if($row['status'] == 1 )
                {
                    return '<div class="media-body switch-sm">
                          <label class="switch">
                            <input type="checkbox" checked="" onclick="changeStatus(event.target,'.$row['id'].',\'Pages\');"><span class="switch-state"></span>
                          </label>
                        </div>';
                }
                else
                { 
                    return '<div class="media-body switch-sm">
                          <label class="switch">
                            <input type="checkbox" onclick="changeStatus(event.target,'.$row['id'].',\'Pages\');"><span class="switch-state"></span>
                          </label>
                        </div>';
                }
            })
            ->rawColumns(['page_img','action','status']);
    }

    public function checkrights($row)
    {
        $menu = '';
        $editUrl = route('pages.edit', [$row->id]);
        $deleteUrl = route('pages.destroy', [$row->id]);
        $viewUrl = route('pages.model-log', $row->id);
        $menu .='<div class="dropdown">';
        $menu .='<button class="btn" 
                 type="button" data-bs-toggle="dropdown"
                 aria-expanded="false"><span><i 
                 class="fa fa-ellipsis-v fa-1x text-dark" 
                 aria-hidden="true"></i></span>
                  </button>';
        $menu .='<ul class="dropdown-menu">';
        $menu .='<li><a class="dropdown-item" 
                 href="'.$editUrl.'">Edit</a></li>';
        $menu .='<li><a class="dropdown-item" onclick="dataDelete(event.target,'.$row->id.',\''.url('admin/pages').'/'.$row->id.'\');" data-id="'.$row->id.'">Delete </a></li>';
        $menu .='<li><a class="dropdown-item kt_info_toggle_custom" 
                 href="#" data-url="'.$viewUrl.'" data-bs-toggle="modal" data-bs-target="#logInfoModal">Info</a></li>';
        $menu .='</ul></div>';
        
                 
        
        return $menu;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Page $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Pages $model)
    {
        $model = Pages::select();

        if (request()->get('page_name', false)) {
            $model->where('page_name', 'like', "%" . request()->get("page_name") . "%");
        }
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('pages-table')
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
        return 'Pages_' . date('YmdHis');
    }
}
