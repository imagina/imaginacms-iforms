<?php

namespace Modules\Iforms\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Iforms\Entities\Field;
use Illuminate\Support\Facades\DB;

class UpdateFieldOptionsSeeder extends Seeder
{
  public function run()
  {
    $seedUniquesUse = DB::table('isite__seeds')->where("name", 'UpdateFieldOptionsSeeder')->first();

    if (empty($seedUniquesUse)) {
      // Get available locales
      $locales = array_keys(\LaravelLocalization::getSupportedLocales());// Get site languages

      // Fetch all Field records
      Field::all()->each(function ($field) use ($locales) {
        // Decode options column
        $options = $field->options;
        // Check if fieldOptions exist
        if (!empty($options['fieldOptions']) && is_array($options['fieldOptions'])) {
          // Prepare data structure for isFillable
          $extraFields = [];

          foreach ($locales as $locale) {
            $extraFields[$locale]['field_options'] = $options['fieldOptions'];
          }
          // Save translations
          $field->syncExtraFillable(['data' => $extraFields]);
        }
      });
      //Save unique time
      DB::table('isite__seeds')->insert(['name' => 'UpdateFieldOptionsSeeder']);
    }
  }
}
