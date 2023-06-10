<?php

namespace App\Admin\Controllers;

use App\Models\Candidature;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CandidatureController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Candidature';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Candidature());

        $grid->column('id', __('Id'));
        $grid->column('candidat_id', __('Candidat id'));
        $grid->column('demande_id', __('Demande id'));
        $grid->column('nombre_etoiles', __('Nombre etoiles'));
        $grid->column('demande_date', __('Demande date'));
        $grid->column('derniere_etoile_date', __('Derniere etoile date'));
        $grid->column('approbation_date', __('Approbation date'));
        $grid->column('status_paiement', __('Status paiement'));
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
        $show = new Show(Candidature::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('candidat_id', __('Candidat id'));
        $show->field('demande_id', __('Demande id'));
        $show->field('nombre_etoiles', __('Nombre etoiles'));
        $show->field('demande_date', __('Demande date'));
        $show->field('derniere_etoile_date', __('Derniere etoile date'));
        $show->field('approbation_date', __('Approbation date'));
        $show->field('status_paiement', __('Status paiement'));
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
        $form = new Form(new Candidature());

        $form->number('candidat_id', __('Candidat id'));
        $form->number('demande_id', __('Demande id'));
        $form->number('nombre_etoiles', __('Nombre etoiles'));
        $form->datetime('demande_date', __('Demande date'))->default(date('Y-m-d H:i:s'));
        $form->datetime('derniere_etoile_date', __('Derniere etoile date'))->default(date('Y-m-d H:i:s'));
        $form->datetime('approbation_date', __('Approbation date'))->default(date('Y-m-d H:i:s'));
        $form->switch('status_paiement', __('Status paiement'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
