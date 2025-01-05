<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\PgaAccessLog;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Laravel\TypeCasts\ModelCaster;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\UI\Fields\Text;

class SummaryEndpoints extends Page
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
        return $this->title ?: 'Summary:Endpoints';
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
                            PgaAccessLog::selectRaw('endpoint, is_error, count(*) as count')
                                ->groupBy('endpoint', 'is_error')
                                ->orderBy('count', 'desc')
                                ->orderBy('endpoint', 'asc')
                                ->orderBy('is_error', 'asc')
                                ->paginate(5)
                        )
                )
                ->fields([Text::make('Endpoint'), Text::make('Is_Error'), Text::make('Count')]),
        ];
	}
}
