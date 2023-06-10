<?php

namespace App\Admin\Controllers;

use App\Models\Paiement;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PaiementController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Paiement';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Paiement());

        $grid->column('id', __('Id'));
        $grid->column('user_id', __('User id'));
        $grid->column('date_paiement', __('Date paiement'));
        $grid->column('montant', __('Montant'));
        $grid->column('reference', __('Reference'));
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
        $show = new Show(Paiement::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('user_id', __('User id'));
        $show->field('date_paiement', __('Date paiement'));
        $show->field('montant', __('Montant'));
        $show->field('reference', __('Reference'));
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
        $form = new Form(new Paiement());

        $form->number('user_id', __('User id'));
        $form->date('date_paiement', __('Date paiement'))->default(date('Y-m-d'));
        $form->decimal('montant', __('Montant'));
        $form->text('reference', __('Reference'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
