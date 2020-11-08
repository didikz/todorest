<?php

namespace App\Actions\Todo;

use App\Models\Section;

class DeleteSectionService
{
    /**
     * @param Section $section
     * @return bool|null
     * @throws \Exception
     */
    public function handle(Section $section)
    {
        return $section->delete();
    }
}
