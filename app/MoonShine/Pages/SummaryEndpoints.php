<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\PgaAccessLog;
use MoonShine\Components\TableBuilder;
use MoonShine\Fields\Text;
use MoonShine\TypeCasts\ModelCast;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class SummaryEndpoints extends Page
{
    protected ?string $alias = 'summary-endpoints';

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
        return $this->title ?: 'Summary:Endpoints';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            TableBuilder::make(
                items: PgaAccessLog::selectRaw('endpoint, is_error, count(*) as count')
                    ->groupBy('endpoint', 'is_error')
                    ->orderBy('count', 'desc')
                    ->orderBy('endpoint', 'asc')
                    ->orderBy('is_error', 'asc')
                    ->paginate(5)
            )
                ->fields([Text::make('Endpoint'), Text::make('Is_Error'), Text::make('Count')])
                ->cast(ModelCast::make(PgaAccessLog::class))
        ];
	}
}
