<?php

namespace App\DataTables;

use App\Models\Testimonial;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TestimonialDataTable extends DataTable
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
            ->editColumn('image',function ($row) {
                if($row['image'] != null ){
                    return '<img src="/upload/testimonial/'.$row['image'].'" class="img-fluid rounded" style="height: 70px;width: 70px;" >';
                }else{ 
                    return '<img src="/media/no-image.png" class="img-fluid rounded" style="height: 70px;width: 70px;" >';
                }
            })
            ->editColumn('status',function ($row) {
                if($row['status'] == 1 )
                {
                    return '<div class="media-body switch-sm">
                          <label class="switch">
                            <input type="checkbox" checked="" onclick="changeStatus(event.target,'.$row['id'].',\'Testimonial\');"><span class="switch-state"></span>
                          </label>
                        </div>';
                }
                else
                { 
                    return '<div class="media-body switch-sm">
                          <label class="switch">
                            <input type="checkbox" onclick="changeStatus(event.target,'.$row['id'].',\'Testimonial\');"><span class="switch-state"></span>
                          </label>
                        </div>';
                }
            })
            ->rawColumns(['action','status','image']);
    }

    public function checkrights($row)
    {
        $menu = '';
        $editUrl = route('testimonial.edit', [$row->id]);
        $deleteUrl = route('testimonial.destroy', [$row->id]);
        $viewUrl = route('testimonial.model-log', $row->id);

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
        
        $menu .='<li><a class="dropdown-item" onclick="dataDelete(event.target,'.$row->id.',\''.url('admin/testimonial').'/'.$row->id.'\');" data-id="'.$row->id.'">Delete </a></li>';
        $menu .='<li><a class="dropdown-item kt_info_toggle_custom" 
                 href="#" data-url="'.$viewUrl.'" data-bs-toggle="modal" data-bs-target="#logInfoModal">Info</a></li>';
        $menu .='</ul></div>';
        
                 
        
        return $menu;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Testimonial $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Testimonial $model)
    {
        $model = Testimonial::select()->orderBy('id','desc');

        if (request()->get('title', false)) {
            $model->where('title', 'like', "%" . request()->get("title") . "%");
        }

        if (request()->get('category_id', false)) {
            $model->where('category_id', request()->get("category_id"));
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
                    ->setTableId('testimonial-table')
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
        return 'Testimonial_' . date('YmdHis');
    }
}
