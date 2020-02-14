<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

use App\Models\Project;
use App\Models\SemRush;

class SemRushImport implements ToCollection,WithHeadingRow
{
    public $project;

    public function __construct(Project $project)
    {
        HeadingRowFormatter::default('none');
        $this->project = $project;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if(isset($row['URL'])) {
              $projectDetail      = SemRush::where(['url' => $row['URL'], 'keyword' => $row['Keyword'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row);
              if($projectDetail) {
                $projectDetail = $projectDetail->update($data);
              } else {
                $projectDetail = SemRush::create($data);
              }
            }
        }
    }

    public function getMetaData($row)
    {
        $data = [
          'project_id'               => $this->project->id,
          'keyword'                  => $row['Keyword'] ?? null,
          'position'                 => $row['Position'] ?? null,
          'previous_position'        => $row['Previous position'] ?? null,
          'search_volume'            => $row['Search Volume'] ?? null,
          'keyword_difficulty'       => $row['Keyword Difficulty'] ?? null,
          'cpc'                      => $row['CPC'] ?? null,
          'url'                      => $row['URL'] ?? null,
          'traffic'                  => $row['Traffic'] ?? null,
          'traffic_percentage'       => $row['Traffic (%)'] ?? null,
          'traffic_cost'             => $row['Traffic Cost'] ?? null,
          'competition'              => $row['Competition'] ?? null,
          'number_of_results'        => $row['Number of Results'] ?? null,
          'trends'                   => $row['Trends'] ?? null,
          'timestamp'                => $row['Timestamp'] ?? null,
          'serp_features_by_keyword' => $row['SERP Features by Keyword'] ?? null,
        ];
        return $data;
    }
}
