<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\PgaProcessLog;
use MoonShine\Components\TableBuilder;
use MoonShine\Fields\Text;
use MoonShine\TypeCasts\ModelCast;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class SummaryExifVersions extends Page
{
    protected ?string $alias = 'summary-exif-versions';

    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Summary:Exif Versions';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            TableBuilder::make(
                items: PgaProcessLog::selectRaw('exif_version, count(*) as count')
                    ->groupBy('exif_version')
                    ->orderBy('count', 'desc')
                    ->paginate(5)
            )
                ->fields([Text::make('Exif_Version'), Text::make('Count')])
                ->cast(ModelCast::make(PgaProcessLog::class))
        ];
	}
}
