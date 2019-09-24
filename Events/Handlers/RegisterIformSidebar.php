<?php

namespace Modules\Iform\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterIformSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('iform::iforms.title.iforms'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('iform::forms.title.forms'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.iform.form.create');
                    $item->route('admin.iform.form.index');
                    $item->authorize(
                        $this->auth->hasAccess('iform.forms.index')
                    );
                });
                $item->item(trans('iform::fields.title.fields'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.iform.field.create');
                    $item->route('admin.iform.field.index');
                    $item->authorize(
                        $this->auth->hasAccess('iform.fields.index')
                    );
                });
                $item->item(trans('iform::leads.title.leads'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.iform.lead.create');
                    $item->route('admin.iform.lead.index');
                    $item->authorize(
                        $this->auth->hasAccess('iform.leads.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
