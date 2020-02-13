<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\Ahref;

class AhrefsImport implements ToCollection,WithHeadingRow
{
    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if(isset($row['link_url'])) {
              $projectDetail      = Ahref::where(['link_url' => $row['link_url'], 'referring_page_url' => $row['referring_page_url'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row);
              if($projectDetail) {
                $projectDetail   = $projectDetail->update($data);
              } else {
                $projectDetail   = Ahref::create($data);
              }
            }
        }
    }

    public function getMetaData($row)
    {
        $data   = [
          'project_id'            => $this->project->id,
          'ahref_number'          => $row[''] ?? null,
          'domain_rating'         => $row['domain_rating'] ?? null,
          'url_rating_desc'       => $row['url_rating_desc'] ?? null,
          'referring_domains'     => $row['referring_domains']   ?? null,
          'referring_page_url'    => $row['referring_page_url'] ?? null,
          'referring_page_title'  => $row['referring_page_title'] ?? null,
          'internal_links_count'  => $row['internal_links_count'] ?? null,
          'external_links_count'  => $row['external_links_count'] ?? null,
          'link_url'              => $row['link_url'] ?? null,
          'textpre'               => $row['textpre'] ?? null,
          'link_anchor'           => $row['link_anchor'] ?? null,
          'textpost'              => $row['textpost'] ?? null,
          'type'                  => $row['type'] ?? null,
          'backlink_status'       => $row['backlink_status'] ?? null,
          'first_seen'            => $row['first_seen']   ?? null,
          'last_check'            => $row['last_check']   ?? null,
          'day_lost'              => $row['day_lost'] ?? null,
          'language'              => $row['language'] ?? null,
          'traffic'               => $row['traffic'] ?? null,
          'keywords'              => $row['keywords'] ?? null,
          'js_rendered'           => $row['js_rendered'] ?? null,
          'linked_domains'        => $row['linked_domains'] ?? null,
        ];
        return $data;
    }
}
