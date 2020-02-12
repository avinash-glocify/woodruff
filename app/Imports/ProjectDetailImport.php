<?php

namespace App\Imports;

use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Project;
use App\Models\ProjectDetail;

use App\Services\Project as ProjectService;

class ProjectDetailImport implements ToCollection, WithHeadingRow
{
    public $project;
    public $type;

    public function __construct(Project $project, $type)
    {
        $this->project = $project;
        $this->type    = $type;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $key => $row) {
            if(isset($row['url'])) {
              $projectDetail      = ProjectDetail::where(['url' => $row['url'], 'project_id' => $this->project->id ])->first();
              $data               = ProjectService::getMetaData($row, $existDetail ?? false, $this->type);
              $data['project_id'] = $this->project->id;
              $projectDetail      = ProjectDetail::updateOrCreate(['url' => $row['url']],$data);
            }
        }
    }
}
