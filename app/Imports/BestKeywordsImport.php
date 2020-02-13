<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\BestKeywords;

class BestKeywordsImport implements ToCollection,WithHeadingRow
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
              $projectDetail      = BestKeywords::where(['url' => $row['url'], 'keywords' => $row['keyword'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row, $existDetail ?? false);
              $projectDetail      = BestKeywords::updateOrCreate(['url' => $row['url'], 'keywords' => $row['keyword'], 'project_id' => $this->project->id],$data);
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
