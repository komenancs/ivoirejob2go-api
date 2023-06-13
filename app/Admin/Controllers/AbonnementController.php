<?php

namespace App\Admin\Controllers;

use App\Models\Abonnement;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AbonnementController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Abonnement';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Abonnement());

        $grid->column('id', __('Id'));
        $grid->column('nom', __('Nom'));
        $grid->column('montant', __('Montant'));
        $grid->column('nombre_demande', __('Nombre demande'));
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
        $show = new Show(Abonnement::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('nom', __('Nom'));
        $show->field('montant', __('Montant'));
        $show->field('nombre_demande', __('Nombre demande'));
        $show->field('description', __('Description'));
        $show->field('user_create_id', __('User create id'));
        $show->field('user_update_id', __('User update id'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        $show->candidats('Candidats', function ($candidats) {

            $candidats->resource('/admin/candidats');

            $candidats->id();
            $candidats->created_at();
            $candidats->updated_at();

            $candidats->filter(function ($filter) {
                $filter->like('id');
            });
        });


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Abonnement());

        $form->text('nom', __('Nom'));
        $form->decimal('montant', __('Montant'));
        $form->number('nombre_demande', __('Nombre demande'))->default(3);
        $form->textarea('description', __('Description'));
        $form->number('user_create_id', __('User create id'));
        $form->number('user_update_id', __('User update id'));

        return $form;
    }
}
