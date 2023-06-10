<?php

namespace App\Admin\Controllers;

use App\Models\Candidat;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CandidatController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Candidat';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Candidat());

        $grid->column('id', __('Id'));
        $grid->column('fin_abonnement', __('Fin abonnement'));
        $grid->column('presentation', __('Presentation'));
        $grid->column('nombre_demandes_restantes', __('Nombre demandes restantes'));
        $grid->column('user_id', __('User id'));
        $grid->column('abonnement_id', __('Abonnement id'));
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
        $show = new Show(Candidat::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('fin_abonnement', __('Fin abonnement'));
        $show->field('presentation', __('Presentation'));
        $show->field('nombre_demandes_restantes', __('Nombre demandes restantes'));
        $show->field('user_id', __('User id'));
        $show->field('abonnement_id', __('Abonnement id'));
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
        $form = new Form(new Candidat());

        $form->date('fin_abonnement', __('Fin abonnement'))->default(date('Y-m-d'));
        $form->textarea('presentation', __('Presentation'));
        $form->number('nombre_demandes_restantes', __('Nombre demandes restantes'));
        $form->number('user_id', __('User id'));
        $form->number('abonnement_id', __('Abonnement id'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
