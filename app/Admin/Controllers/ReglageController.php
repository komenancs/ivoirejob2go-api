<?php

namespace App\Admin\Controllers;

use App\Models\Reglage;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ReglageController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Reglage';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reglage());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('value', __('Value'));
        $grid->column('comment', __('Comment'));
        $grid->column('user_create_id', __('User create id'));
        $grid->column('user_update_id', __('User update id'));
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
        $show = new Show(Reglage::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('value', __('Value'));
        $show->field('comment', __('Comment'));
        $show->field('user_create_id', __('User create id'));
        $show->field('user_update_id', __('User update id'));
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
        $form = new Form(new Reglage());

        $form->text('name', __('Name'));
        $form->text('value', __('Value'));
        $form->text('comment', __('Comment'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
