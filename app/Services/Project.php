<?php

namespace App\Services;
use App\Models\ProjectDetail;

class Project
{
    public static function getMetaData($row, $existDetail)
    {
        $existDetail = ProjectDetail::where('url', $row['url'])->first();
        $data = [
          'sitemap'                               => $row['sitemap'] ?? ( $existDetail ? $existDetail->sitemap : null ),
          'sessions'                              => $row['sessions'] ?? ( $existDetail ? $existDetail->sessions : null ),
          'change_sessions'                       => $row['change_sessions'] ?? ( $existDetail ? $existDetail->change_sessions : null ),
          'landing_page_path'                     => $row['landing_page_path'] ?? ( $existDetail ? $existDetail->landing_page_path : '' ),
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
          'impressions'                           => $row['impressions'] ?? ( $existDetail ? $existDetail->impressions : null ),
          'clicks'                                => $row['clicks'] ?? ( $existDetail ? $existDetail->clicks : null ),
          'ctr'                                   => $row['ctr'] ?? ( $existDetail ? $existDetail->ctr : null ),
          'average_position'                      => $row['average_position'] ?? ( $existDetail ? $existDetail->average_position : null ),
          'keyword'                               => $row['keyword'] ?? ( $existDetail ? $existDetail->keyword : null ),
          'position'                              => $row['position'] ?? ( $existDetail ? $existDetail->position : null ),
          'previous_position'                     => $row['previous_position'] ?? ( $existDetail ? $existDetail->previous_position : null ),
          'search_volume'                         => $row['search_volume'] ?? ( $existDetail ? $existDetail->search_volume : null ),
          'keyword_difficulty'                    => $row['keyword_difficulty'] ?? ( $existDetail ? $existDetail->keyword_difficulty : null ),
          'cpc'                                   => $row['cpc'] ?? ( $existDetail ? $existDetail->cpc : null ),
          'traffic'                               => $row['traffic'] ?? ( $existDetail ? $existDetail->traffic : null ),
          'traffic_cost'                          => $row['traffic_cost'] ?? ( $existDetail ? $existDetail->traffic_cost : null ),
          'competition'                           => $row['competition'] ?? ( $existDetail ? $existDetail->competition : null ),
          'number_of_results'                     => $row['number_of_results'] ?? ( $existDetail ? $existDetail->number_of_results : null ),
          'trends'                                => $row['trends'] ?? ( $existDetail ? $existDetail->trends : null ),
          'timestamp'                             => $row['timestamp'] ?? ( $existDetail ? $existDetail->timestamp : null ),
          'serp_features_by_keyword'              => $row['serp_features_by_keyword'] ?? ( $existDetail ? $existDetail->serp_features_by_keyword : null ),
        ];
        return $data;
    }
}
