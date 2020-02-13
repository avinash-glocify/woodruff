<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\SiteMaps;

class SitemapImport implements ToCollection,WithHeadingRow
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
              $projectDetail      = SiteMaps::where(['url' => $row['url'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row, $existDetail ?? false);
              $projectDetail      = SiteMaps::updateOrCreate(['url' => $row['url'], 'project_id' => $this->project->id],$data);
            }
        }
    }

    public function getMetaData($row, $existDetail)
    {
        $data = [
          'name'       => $row['sitemap'] ?? ( $existDetail ? $existDetail->name : null ),
          'project_id' => $this->project->id
        ];
        return $data;
    }
}
