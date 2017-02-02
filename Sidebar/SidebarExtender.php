<?php

namespace Modules\Iforms\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\User\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {


            $group->item(trans('iforms::form.list'), function (Item $item) {
                $item->icon('fa fa-pencil-square-o');
                $item->item(trans('iforms::form.list'), function (Item $item) {
                    $item->icon('fa fa fa-list-alt');
                    $item->weight(5);
                    $item->append('crud.iforms.form.create');
                    $item->route('crud.iforms.form.index');
                    $item->authorize(
                        $this->auth->hasAccess('iforms.forms.index')
                    );
                });




                $item->item(trans('iforms::lead.list'), function (Item $item) {
                    $item->icon('fa fa-list');
                    $item->weight(5);
                    $item->route('crud.iforms.lead.index');
                    $item->authorize(
                        $this->auth->hasAccess('iforms.leads.index')
                    );
                });



                $item->authorize(
                    $this->auth->hasAccess('iforms.forms.index')
                );

            });
        });

        return $menu;
    }
}
