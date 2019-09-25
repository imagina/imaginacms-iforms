<?php


namespace Modules\Iform\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;

class LeadsExport implements FromCollection
{

  private $leads;
  
  public function __construct($leads)
  {
    $this->leads = $leads;
  }

  public function collection()
  {
    return $this->leads;
  }
}
