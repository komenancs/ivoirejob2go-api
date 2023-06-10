<?php

namespace App\Admin\Controllers;

use App\Models\Experience;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ExperienceController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Experience';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Experience());

        $grid->column('id', __('Id'));
        $grid->column('candidat_id', __('Candidat id'));
        $grid->column('job_title', __('Job title'));
        $grid->column('activity_description', __('Activity description'));
        $grid->column('start_date', __('Start date'));
        $grid->column('end_date', __('End date'));
        $grid->column('company_name', __('Company name'));
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
        $show = new Show(Experience::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('candidat_id', __('Candidat id'));
        $show->field('job_title', __('Job title'));
        $show->field('activity_description', __('Activity description'));
        $show->field('start_date', __('Start date'));
        $show->field('end_date', __('End date'));
        $show->field('company_name', __('Company name'));
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
        $form = new Form(new Experience());

        $form->number('candidat_id', __('Candidat id'));
        $form->text('job_title', __('Job title'));
        $form->textarea('activity_description', __('Activity description'));
        $form->date('start_date', __('Start date'))->default(date('Y-m-d'));
        $form->date('end_date', __('End date'))->default(date('Y-m-d'));
        $form->text('company_name', __('Company name'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
