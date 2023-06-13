<?php

namespace App\Admin\Controllers;

use App\Models\Employeur;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class EmployeurController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Employeur';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Employeur());

        $grid->column('id', __('Id'));
        $grid->column('localisation_id', __('Localisation id'));
        $grid->column('description', __('Description'));
        $grid->column('logo', __('Logo'));
        $grid->column('email', __('Email'));
        $grid->column('abonnement_id', __('Abonnement id'));
        $grid->column('nombre_demandes_restantes', __('Nombre demandes restantes'));
        $grid->column('contact_1', __('Contact 1'));
        $grid->column('contact_2', __('Contact 2'));
        $grid->column('site_web', __('Site web'));
        $grid->column('lien_twitter', __('Lien twitter'));
        $grid->column('lien_facebook', __('Lien facebook'));
        $grid->column('lien_linkedin', __('Lien linkedin'));
        $grid->column('user_id', __('User id'));
        $grid->column('user_create_id', __('User create id'));
        $grid->column('user_update_id', __('User update id'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('nom', __('Nom'));

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
        $show = new Show(Employeur::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('localisation_id', __('Localisation id'));
        $show->field('description', __('Description'));
        $show->field('logo', __('Logo'));
        $show->field('email', __('Email'));
        $show->field('abonnement_id', __('Abonnement id'));
        $show->field('nombre_demandes_restantes', __('Nombre demandes restantes'));
        $show->field('contact_1', __('Contact 1'));
        $show->field('contact_2', __('Contact 2'));
        $show->field('site_web', __('Site web'));
        $show->field('lien_twitter', __('Lien twitter'));
        $show->field('lien_facebook', __('Lien facebook'));
        $show->field('lien_linkedin', __('Lien linkedin'));
        $show->field('user_id', __('User id'));
        $show->field('user_create_id', __('User create id'));
        $show->field('user_update_id', __('User update id'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('nom', __('Nom'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Employeur());

        $form->number('localisation_id', __('Localisation id'));
        $form->textarea('description', __('Description'));
        $form->text('logo', __('Logo'));
        $form->email('email', __('Email'));
        $form->number('abonnement_id', __('Abonnement id'));
        $form->number('nombre_demandes_restantes', __('Nombre demandes restantes'));
        $form->text('contact_1', __('Contact 1'));
        $form->text('contact_2', __('Contact 2'));
        $form->text('site_web', __('Site web'));
        $form->text('lien_twitter', __('Lien twitter'));
        $form->text('lien_facebook', __('Lien facebook'));
        $form->text('lien_linkedin', __('Lien linkedin'));
        $form->number('user_id', __('User id'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));
        $form->text('nom', __('Nom'));

        return $form;
    }
}
