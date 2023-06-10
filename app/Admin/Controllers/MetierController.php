<?php

namespace App\Admin\Controllers;

use App\Models\Metier;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MetierController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Metier';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Metier());

        $grid->column('id', __('Id'));
        $grid->column('nom', __('Nom'));
        $grid->column('description', __('Description'));
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
        $show = new Show(Metier::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nom', __('Nom'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Metier());

        $form->text('nom', __('Nom'));
        $form->text('description', __('Description'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
