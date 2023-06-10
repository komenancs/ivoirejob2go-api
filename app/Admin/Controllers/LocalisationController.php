<?php

namespace App\Admin\Controllers;

use App\Models\Localisation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LocalisationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Localisation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Localisation());

        $grid->column('id', __('Id'));
        $grid->column('pays', __('Pays'));
        $grid->column('ville', __('Ville'));
        $grid->column('quatier', __('Quatier'));
        $grid->column('rue', __('Rue'));
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
        $show = new Show(Localisation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('pays', __('Pays'));
        $show->field('ville', __('Ville'));
        $show->field('quatier', __('Quatier'));
        $show->field('rue', __('Rue'));
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
        $form = new Form(new Localisation());

        $form->text('pays', __('Pays'));
        $form->text('ville', __('Ville'));
        $form->text('quatier', __('Quatier'));
        $form->text('rue', __('Rue'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
