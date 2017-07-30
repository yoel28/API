<?php
namespace Api\Traits;

use Illuminate\Support\Collection;

trait HasPermission{

    use HasRole;

    public function hasPermission(string $resource):bool{
        return $this->permissions()
                ->contains(
                    $this->actionController($resource)
                );
    }

    protected function getPermissionsAttribute():array {
        return $this->permissions()->unique()->all();
    }

    protected function permissions():Collection {
        return $this->roles()->get()->pluck('permissions')->collapse();
    }

    private function actionController(string $actionName):string {
        return strtoupper(
            str_replace(
                array('@','Controller'),array('_',''),
                substr($actionName, strrpos($actionName, '\\') + 1)
            )
        );
    }
}