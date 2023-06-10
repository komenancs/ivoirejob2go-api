<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Utilisateur';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('surname', __('Surname'));
        $grid->column('password', __('Password'));
        $grid->column('email', __('Email'));
        $grid->column('telephone', __('Telephone'));
        $grid->column('nom_entreprise', __('Nom entreprise'));
        $grid->column('poste_occupe', __('Poste occupe'));
        $grid->column('photo', __('Photo'));
        $grid->column('linkedin', __('Linkedin'));
        $grid->column('twitter', __('Twitter'));
        $grid->column('instagram', __('Instagram'));
        $grid->column('date_verification_email', __('Date verification email'));
        $grid->column('email_verified_at', __('Email verified at'));
        $grid->column('deleted_at', __('Deleted at'));
        $grid->column('remember_token', __('Remember token'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('role_id', __('Role id'));
        $grid->column('localisation_id', __('Localisation id'));

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
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('surname', __('Surname'));
        $show->field('password', __('Password'));
        $show->field('email', __('Email'));
        $show->field('telephone', __('Telephone'));
        $show->field('nom_entreprise', __('Nom entreprise'));
        $show->field('poste_occupe', __('Poste occupe'));
        $show->field('photo', __('Photo'));
        $show->field('linkedin', __('Linkedin'));
        $show->field('twitter', __('Twitter'));
        $show->field('instagram', __('Instagram'));
        $show->field('date_verification_email', __('Date verification email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('remember_token', __('Remember token'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('role_id', __('Role id'));
        $show->field('localisation_id', __('Localisation id'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('name', __('Name'));
        $form->text('surname', __('Surname'));
        $form->password('password', __('Password'));
        $form->email('email', __('Email'));
        $form->text('telephone', __('Telephone'));
        $form->text('nom_entreprise', __('Nom entreprise'));
        $form->text('poste_occupe', __('Poste occupe'));
        $form->text('photo', __('Photo'));
        $form->text('linkedin', __('Linkedin'));
        $form->text('twitter', __('Twitter'));
        $form->text('instagram', __('Instagram'));
        $form->date('date_verification_email', __('Date verification email'))->default(date('Y-m-d'));
        $form->datetime('email_verified_at', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->text('remember_token', __('Remember token'));
        $form->number('role_id', __('Role id'));
        $form->number('localisation_id', __('Localisation id'));

        return $form;
    }
}
