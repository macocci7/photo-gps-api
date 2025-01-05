<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\PgaAccessLog;
use MoonShine\Laravel\Pages\Page;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Laravel\TypeCasts\ModelCaster;
use MoonShine\UI\Components\Table\TableBuilder;
use MoonShine\UI\Fields\Text;

class SummaryIps extends Page
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
        return $this->title ?: 'Summary:IPs';
    }

    /**
     * @return list<ComponentContract>
     */
    protected function components(): iterable
	{
		return [
            TableBuilder::make()
            ->items(
                new ModelCaster(PgaAccessLog::class)
                    ->paginatorCast(
                        PgaAccessLog::selectRaw('ip, count(ip) as count')
                            ->groupBy('ip')
                            ->orderBy('count', 'desc')
                            ->paginate(5)
                    )
            )
            ->fields([Text::make('IP'), Text::make('Count')])
        ];
	}
}
