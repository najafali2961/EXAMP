<?php

namespace App\Helpers;

use App\Models\Statement;

class TextHelper
{
    public static function getText($entityType, $entityId, $languageId)
    {
        $statement = Statement::where([
            ['entity_type', $entityType],
            ['entity_id', $entityId],
            ['language_id', $languageId],
        ])->first();

        return $statement ? $statement->text : null;
    }
    public static function getTexts($entityType, $entityId, $languageIds)
    {
        $texts = [];
        foreach ($languageIds as $languageId) {
            $statement = Statement::where([
                ['entity_type', $entityType],
                ['entity_id', $entityId],
                ['language_id', $languageId],
            ])->first();

            if ($statement) {
                $texts[] = $statement->text;
            }
        }
        return implode(' / ', $texts);
    }
}
