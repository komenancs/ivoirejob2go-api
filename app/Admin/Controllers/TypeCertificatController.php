<?php

namespace App\Admin\Controllers;

use App\Models\TypeCertificat;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TypeCertificatController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'TypeCertificat';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TypeCertificat());

        $grid->column('id', __('Id'));
        $grid->column('organisme_nom', __('Organisme nom'));
        $grid->column('organisme_logo', __('Organisme logo'));
        $grid->column('certification_nom', __('Certification nom'));
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
        $show = new Show(TypeCertificat::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('organisme_nom', __('Organisme nom'));
        $show->field('organisme_logo', __('Organisme logo'));
        $show->field('certification_nom', __('Certification nom'));
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
        $form = new Form(new TypeCertificat());

        $form->text('organisme_nom', __('Organisme nom'));
        $form->text('organisme_logo', __('Organisme logo'));
        $form->text('certification_nom', __('Certification nom'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
