<?php

namespace Modules\Iform\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Iform\Entities\Form;
use Modules\Iform\Http\Requests\CreateFormRequest;
use Modules\Iform\Http\Requests\UpdateFormRequest;
use Modules\Iform\Repositories\FormRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FormController extends AdminBaseController
{
    /**
     * @var FormRepository
     */
    private $form;

    public function __construct(FormRepository $form)
    {
        parent::__construct();

        $this->form = $form;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$forms = $this->form->all();

        return view('iform::admin.forms.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('iform::admin.forms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFormRequest $request
     * @return Response
     */
    public function store(CreateFormRequest $request)
    {
        $this->form->create($request->all());

        return redirect()->route('admin.iform.form.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('iform::forms.title.forms')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Form $form
     * @return Response
     */
    public function edit(Form $form)
    {
        return view('iform::admin.forms.edit', compact('form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Form $form
     * @param  UpdateFormRequest $request
     * @return Response
     */
    public function update(Form $form, UpdateFormRequest $request)
    {
        $this->form->update($form, $request->all());

        return redirect()->route('admin.iform.form.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('iform::forms.title.forms')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Form $form
     * @return Response
     */
    public function destroy(Form $form)
    {
        $this->form->destroy($form);

        return redirect()->route('admin.iform.form.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('iform::forms.title.forms')]));
    }
}
