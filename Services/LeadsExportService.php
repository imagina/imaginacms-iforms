<?php


namespace Modules\Iform\Services;

use Modules\Iform\Exports\LeadsExport;

class LeadsExportService
{
  public function exportFile ($data)
  {
    $values = [];
    foreach ($data as $item){
      $values[] = json_decode($item->values);
    }
    $response = [];
    foreach ($values as $indexValue => $value) {
      foreach ($value as $indexField => $field) {
        $response[$indexValue][$indexField] = $field->model;
      }
    }
    //return $response;
    return \Excel::download(new LeadsExport( collect($response) ), 'leads.xlsx');
  }
}
