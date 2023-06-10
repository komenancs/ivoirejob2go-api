<?php

namespace App\Admin\Controllers;

use App\Models\Demande;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DemandeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Demande';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Demande());

        $grid->column('id', __('Id'));
        $grid->column('titre', __('Titre'));
        $grid->column('employeur_id', __('Employeur id'));
        $grid->column('description', __('Description'));
        $grid->column('nombre_poste', __('Nombre poste'));
        $grid->column('salaire', __('Salaire'));
        $grid->column('type_contrat_id', __('Type contrat id'));
        $grid->column('date_publication', __('Date publication'));
        $grid->column('date_expiration', __('Date expiration'));
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
        $show = new Show(Demande::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('titre', __('Titre'));
        $show->field('employeur_id', __('Employeur id'));
        $show->field('description', __('Description'));
        $show->field('nombre_poste', __('Nombre poste'));
        $show->field('salaire', __('Salaire'));
        $show->field('type_contrat_id', __('Type contrat id'));
        $show->field('date_publication', __('Date publication'));
        $show->field('date_expiration', __('Date expiration'));
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
        $form = new Form(new Demande());

        $form->text('titre', __('Titre'));
        $form->number('employeur_id', __('Employeur id'));
        $form->textarea('description', __('Description'));
        $form->number('nombre_poste', __('Nombre poste'));
        $form->decimal('salaire', __('Salaire'));
        $form->number('type_contrat_id', __('Type contrat id'));
        $form->date('date_publication', __('Date publication'))->default(date('Y-m-d'));
        $form->date('date_expiration', __('Date expiration'))->default(date('Y-m-d'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
