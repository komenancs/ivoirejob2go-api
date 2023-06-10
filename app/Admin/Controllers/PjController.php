<?php

namespace App\Admin\Controllers;

use App\Models\Pj;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PjController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pj';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Pj());

        $grid->column('id', __('Id'));
        $grid->column('message_id', __('Message id'));
        $grid->column('filename', __('Filename'));
        $grid->column('extension', __('Extension'));
        $grid->column('path', __('Path'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Pj::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('message_id', __('Message id'));
        $show->field('filename', __('Filename'));
        $show->field('extension', __('Extension'));
        $show->field('path', __('Path'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Pj());

        $form->number('message_id', __('Message id'));
        $form->text('filename', __('Filename'));
        $form->text('extension', __('Extension'));
        $form->text('path', __('Path'));

        return $form;
    }
}
