<?php

namespace App\Actions\Todo;

use App\Models\Section;

class UpdateSectionService
{
    /**
     * @param Section $section
     * @param string $content
     * @return Section
     */
    public function handle(Section $section, string $content)
    {
        $section->content = $content;
        $section->save();

        return $section;
    }
}
