<?php

namespace App\Admin\Controllers;

use App\Models\Formation;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FormationController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Formation';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Formation());

        $grid->column('id', __('Id'));
        $grid->column('candidat_id', __('Candidat id'));
        $grid->column('titre', __('Titre'));
        $grid->column('ecole', __('Ecole'));
        $grid->column('date_debut', __('Date debut'));
        $grid->column('date_fin', __('Date fin'));
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
        $show = new Show(Formation::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('candidat_id', __('Candidat id'));
        $show->field('titre', __('Titre'));
        $show->field('ecole', __('Ecole'));
        $show->field('date_debut', __('Date debut'));
        $show->field('date_fin', __('Date fin'));
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
        $form = new Form(new Formation());

        $form->number('candidat_id', __('Candidat id'));
        $form->text('titre', __('Titre'));
        $form->text('ecole', __('Ecole'));
        $form->date('date_debut', __('Date debut'))->default(date('Y-m-d'));
        $form->date('date_fin', __('Date fin'))->default(date('Y-m-d'));
        $form->textarea('description', __('Description'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
