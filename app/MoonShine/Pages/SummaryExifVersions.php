<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\PgaProcessLog;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Laravel\TypeCasts\ModelCaster;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\UI\Fields\Text;

class SummaryExifVersions extends Page
{
    /**
     * @return array<string, string>
     */
    public function getBreadcrumbs(): array
    {
        return [
            '#' => $this->getTitle()
        ];
    }

    public function getTitle(): string
    {
        return $this->title ?: 'Summary:Exif Versions';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
	{
		return [
            TableBuilder::make()
                ->items(
                    (new ModelCaster(PgaAccessLog::class))
                        ->paginatorCast(
                            PgaProcessLog::selectRaw('exif_version, count(*) as count')
                                ->groupBy('exif_version')
                                ->orderBy('count', 'desc')
                                ->paginate(5)
                        )
                )
                ->fields([Text::make('Exif_Version'), Text::make('Count')])
        ];
	}
}
