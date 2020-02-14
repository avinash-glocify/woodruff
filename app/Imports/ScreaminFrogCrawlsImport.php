<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\ScreamingFrog;

class ScreaminFrogCrawlsImport implements ToCollection,WithHeadingRow
{
    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if(isset($row['address'])) {
              $projectDetail      = ScreamingFrog::where(['address' => $row['address'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row);
              if($projectDetail) {
                $projectDetail   = $projectDetail->update($data);
              } else {
                $projectDetail   = ScreamingFrog::create($data);
              }
            }
        }
    }

    public function getMetaData($row)
    {
        $data   = [
          'project_id'                     => $this->project->id,
          'address'                        => $row['address'] ?? null,
          'content'                        => $row['content'] ?? null,
          'status_code'                    => $row['status_code'] ?? null,
          'status'                         => $row['status']   ?? null,
          'indexability'                   => $row['indexability'] ?? null,
          'indexability_status'            => $row['indexability_status'] ?? null,
          'title_1'                        => $row['title_1'] ?? null,
          'title_1_length'                 => $row['title_1_length'] ?? null,
          'title_1_pixel_width'            => $row['title_1_pixel_width'] ?? null,
          'meta_description_1'             => $row['meta_description_1'] ?? null,
          'meta_description_1_length'      => $row['meta_description_1_length'] ?? null,
          'meta_description_1_pixel_width' => $row['meta_description_1_pixel_width'] ?? null,
          'meta_keyword_1'                 => $row['meta_keyword_1'] ?? null,
          'meta_keywords_1_length'         => $row['meta_keywords_1_length'] ?? null,
          'h1_1'                           => $row['h1_1']   ?? null,
          'h1_1_length'                    => $row['h1_1_length']   ?? null,
          'h1_2'                           => $row['h1_2'] ?? null,
          'h1_2_length'                    => $row['h1_2_length'] ?? null,
          'h2_1'                           => $row['h2_1'] ?? null,
          'h2_1_length'                    => $row['h2_1_length'] ?? null,
          'h2_2'                           => $row['h2_2'] ?? null,
          'h2_2_length'                    => $row['h2_2_length'] ?? null,
          'meta_robots_1'                  => $row['meta_robots_1'] ?? null,
          'x_robots_tag_1'                 => $row['x_robots_tag_1'] ?? null,
          'meta_refresh_1'                 => $row['meta_refresh_1'] ?? null,
          'canonical_link_element_1'       => $row['canonical_link_element_1'] ?? null,
          'relnext_1'                      => $row['relnext_1'] ?? null,
          'relprev_1'                      => $row['relnext_1'] ?? null,
          'http_relnext_1'                 => $row['http_relnext_1'] ?? null,
          'http_relprev_1'                 => $row['http_relprev_1'] ?? null,
          'size_bytes'                     => $row['size_bytes'] ?? null,
          'word_count'                     => $row['word_count'] ?? null,
          'text_ratio'                     => $row['text_ratio'] ?? null,
          'crawl_depth'                    => $row['crawl_depth'] ?? null,
          'link_score'                     => $row['link_score'] ?? null,
          'inlinks'                        => $row['inlinks'] ?? null,
          'unique_inlinks'                 => $row['unique_inlinks'] ?? null,
          'percentage_of_total'            => $row['of_total'] ?? null,
          'outlinks'                       => $row['outlinks'] ?? null,
          'unique_outlinks'                => $row['unique_outlinks'] ?? null,
          'external_outlinks'              => $row['external_outlinks'] ?? null,
          'unique_external_outlinks'       => $row['unique_external_outlinks'] ?? null,
          'hash'                           => $row['hash'] ?? null,
          'response_time'                  => $row['response_time'] ?? null,
          'last_modified'                  => $row['last_modified'] ?? null,
          'redirect_url'                   => $row['redirect_url'] ?? null,
          'redirect_type'                  => $row['redirect_type'] ?? null,
          'url_encoded_address'            => $row['url_encoded_address'] ?? null,
        ];
        return $data;
    }
}
