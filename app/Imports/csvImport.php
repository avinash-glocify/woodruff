<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\Csv;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


class csvImport implements ToCollection,WithHeadingRow
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
            if(isset($row['Keyword'])) {
              $projectDetail      = Csv::where(['url' => $row['Keyword'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row, $existDetail ?? false);
              $projectDetail      = Csv::updateOrCreate(['keyword' => $row['Keyword'], 'url' => $data['url']],$data);
            }
        }
    }

    public function getMetaData($row, $existDetail)
    {
        $data   = [
          'project_id'               => $this->project->id,
          'url'                      => $row['URL'] ?? ( $existDetail ? $existDetail->url : null ),
          'position'                 => $row['Position'] ?? ( $existDetail ? $existDetail->position : null ),
          'previous_position'        => $row['Previous position'] ?? ( $existDetail ? $existDetail->previous_position : null ),
          'search_volume'            => $row['Search Volume'] ?? ( $existDetail ? $existDetail->search_volume : null ),
          'keyword_difficulty'       => $row['Keyword Difficulty'] ?? ( $existDetail ? $existDetail->keyword_difficulty : null ),
          'cpc'                      => $row['CPC'] ?? ( $existDetail ? $existDetail->cpc : null ),
          'traffic'                  => $row['Traffic'] ?? ( $existDetail ? $existDetail->traffic : null ),
          'traffic_percentage'       => $row['Traffic (%)'] ?? ( $existDetail ? $existDetail->traffic_percentage : null ),
          'traffic_cost'             => $row['Traffic Cost'] ?? ( $existDetail ? $existDetail->traffic_cost : null ),
          'competition'              => $row['Competition'] ?? ( $existDetail ? $existDetail->competition : null ),
          'number_of_results'        => $row['Number of Results'] ?? ( $existDetail ? $existDetail->number_of_results : null ),
          'trends'                   => $row['Trends'] ?? ( $existDetail ? $existDetail->trends : null ),
          'timestamp'                => $row['Timestamp'] ?? ( $existDetail ? $existDetail->timestamp : null ),
          'serp_features_by_keyword' => $row['SERP Features by Keyword'] ?? ( $existDetail ? $existDetail->serp_features_by_keyword : null ),
        ];
        return $data;
    }
}
