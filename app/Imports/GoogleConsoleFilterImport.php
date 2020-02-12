<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\GoogleSearchConsoleFilter;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


class GoogleConsoleFilterImport implements ToCollection,WithHeadingRow
{
    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if(isset($row['landing_page'])) {
              $projectDetail      = GoogleSearchConsoleFilter::where(['landing_page' => $row['landing_page'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row, $existDetail ?? false);
              $projectDetail      = GoogleSearchConsoleFilter::updateOrCreate(['landing_page' => $row['landing_page']],$data);
            }
        }
    }

    public function getMetaData($row, $existDetail)
    {
        $data = [
          'project_id'       => $this->project->id,
          'landing_page'     => $row['landing_page'] ?? ( $existDetail ? $existDetail->landing_page : '' ),
          'page_path'        => $row['page_path'] ?? ( $existDetail ? $existDetail->page_path : null ),
          'impressions'      => $row['impressions'] ?? ( $existDetail ? $existDetail->impressions : null ),
          'clicks'           => $row['clicks'] ?? ( $existDetail ? $existDetail->clicks : null ),
          'ctr'              => $row['ctr'] ?? ( $existDetail ? $existDetail->ctr : null ),
          'average_position' => $row['average_position'] ?? ( $existDetail ? $existDetail->average_position : null )
        ];
        return $data;
    }
}
