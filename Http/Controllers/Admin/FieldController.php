<?php

namespace Modules\Iform\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Iform\Entities\Field;
use Modules\Iform\Http\Requests\CreateFieldRequest;
use Modules\Iform\Http\Requests\UpdateFieldRequest;
use Modules\Iform\Repositories\FieldRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FieldController extends AdminBaseController
{
    /**
     * @var FieldRepository
     */
    private $field;

    public function __construct(FieldRepository $field)
    {
        parent::__construct();

        $this->field = $field;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$fields = $this->field->all();

        return view('iform::admin.fields.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('iform::admin.fields.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFieldRequest $request
     * @return Response
     */
    public function store(CreateFieldRequest $request)
    {
        $this->field->create($request->all());

        return redirect()->route('admin.iform.field.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('iform::fields.title.fields')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Field $field
     * @return Response
     */
    public function edit(Field $field)
    {
        return view('iform::admin.fields.edit', compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Field $field
     * @param  UpdateFieldRequest $request
     * @return Response
     */
    public function update(Field $field, UpdateFieldRequest $request)
    {
        $this->field->update($field, $request->all());

        return redirect()->route('admin.iform.field.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('iform::fields.title.fields')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Field $field
     * @return Response
     */
    public function destroy(Field $field)
    {
        $this->field->destroy($field);

        return redirect()->route('admin.iform.field.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('iform::fields.title.fields')]));
    }
}
