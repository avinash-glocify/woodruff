<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\GoogleSearchConsole;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;


class GoogleSearchConsoleImport implements ToCollection,WithHeadingRow
{
    public $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if(isset($row['page'])) {
              $projectDetail      = GoogleSearchConsole::where(['page' => $row['page'], 'project_id' => $this->project->id ])->first();
              $data               = $this->getMetaData($row);
              if($projectDetail) {
                $projectDetail->update($data);
              } else {
                $projectDetail = GoogleSearchConsole::create($data);
              }
            }
        }
    }

    public function getMetaData($row)
    {
        $data = [
          'project_id'   => $this->project->id,
          'page'         => $row['page'] ?? null,
          'impressions'  => $row['impressions'] ?? null,
          'clicks'       => $row['clicks'] ?? null,
          'ctr'          => $row['ctr'] ?? null,
          'position'     => $row['position'] ?? null,
          ];
        return $data;
    }
}
