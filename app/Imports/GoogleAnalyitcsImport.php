<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\GoogleAnalytics;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


class GoogleAnalyitcsImport implements ToCollection,WithHeadingRow
{
    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if(isset($row['landing_page_path'])) {
              $projectDetail      = GoogleAnalytics::where(['landing_page_path' => $row['landing_page_path'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row, $existDetail ?? false);
              $projectDetail      = GoogleAnalytics::updateOrCreate(['landing_page_path' => $row['landing_page_path'], 'project_id' => $this->project->id],$data);
            }
        }
    }

    public function getMetaData($row, $existDetail)
    {
        $data = [
          'project_id'                            => $this->project->id,
          'landing_page_path'                     => $row['landing_page_path'] ?? ( $existDetail ? $existDetail->landing_page_path : '' ),
          'sessions'                              => $row['sessions'] ?? ( $existDetail ? $existDetail->sessions : null ),
          'change_sessions'                       => $row['change_sessions'] ?? ( $existDetail ? $existDetail->change_sessions : null ),
          'goal_conversion_rate_all_goals'        => $row['goal_conversion_rate_all_goals'] ?? ( $existDetail ? $existDetail->goal_conversion_rate_all_goals : null ),
          'change_goal_conversion_rate_all_goals' => $row['change_goal_conversion_rate_all_goals'] ?? ( $existDetail ? $existDetail->change_goal_conversion_rate_all_goals : null ),
          'transaction_revenue'                   => $row['transaction_revenue'] ?? ( $existDetail ? $existDetail->transaction_revenue : null ),
          'change_transaction_revenue'            => $row['change_transaction_revenue'] ?? ( $existDetail ? $existDetail->change_transaction_revenue : null ),
          'ecommerce_conversion_rate'             => $row['ecommerce_conversion_rate'] ?? ( $existDetail ? $existDetail->ecommerce_conversion_rate : null ),
          'change_ecommerce_conversion_rate'      => $row['change_ecommerce_conversion_rate'] ?? ( $existDetail ? $existDetail->change_ecommerce_conversion_rate : null ),
          'bounce_rate'                           => $row['bounce_rate'] ?? ( $existDetail ? $existDetail->bounce_rate : null ),
          'change_bounce_rate'                    => $row['change_bounce_rate'] ?? ( $existDetail ? $existDetail->change_bounce_rate : null ),
          'avg_time_on_page'                      => $row['avg_time_on_page'] ?? ( $existDetail ? $existDetail->avg_time_on_page : null ),
          'change_avg_time_on_page'               => $row['change_avg_time_on_page'] ?? ( $existDetail ? $existDetail->change_avg_time_on_page : null ),
        ];
        return $data;
    }
}
