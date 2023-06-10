<?php

namespace App\Admin\Controllers;

use App\Models\Certificat;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CertificatController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Certificat';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Certificat());

        $grid->column('id', __('Id'));
        $grid->column('type_certificat_id', __('Type certificat id'));
        $grid->column('candidat_id', __('Candidat id'));
        $grid->column('nom', __('Nom'));
        $grid->column('numero_certificat', __('Numero certificat'));
        $grid->column('date_obtention', __('Date obtention'));
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
        $show = new Show(Certificat::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('type_certificat_id', __('Type certificat id'));
        $show->field('candidat_id', __('Candidat id'));
        $show->field('nom', __('Nom'));
        $show->field('numero_certificat', __('Numero certificat'));
        $show->field('date_obtention', __('Date obtention'));
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
        $form = new Form(new Certificat());

        $form->number('type_certificat_id', __('Type certificat id'));
        $form->number('candidat_id', __('Candidat id'));
        $form->text('nom', __('Nom'));
        $form->text('numero_certificat', __('Numero certificat'));
        $form->date('date_obtention', __('Date obtention'))->default(date('Y-m-d'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
