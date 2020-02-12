<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\MainKeyword;

class MainKeywordsImport implements ToCollection,WithHeadingRow
{
    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if(isset($row['url'])) {
              $projectDetail      = MainKeyword::where(['url' => $row['url'], 'keywords' => $row['keyword'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row, $existDetail ?? false);
              $projectDetail      = MainKeyword::updateOrCreate(['url' => $row['url'], 'keywords' => $row['keyword']],$data);
            }
        }
    }

    public function getMetaData($row, $existDetail)
    {
        $data = [
          'project_id'      => $this->project->id,
          'position'        => $row['position'] ?? ( $existDetail ? $existDetail->position : null ),
          'search_volume'   => $row['search_volume'] ?? ( $existDetail ? $existDetail->search_volume : null ),
        ];
        return $data;
    }
}
