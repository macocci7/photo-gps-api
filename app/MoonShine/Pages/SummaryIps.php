<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;

use App\Models\PgaAccessLog;
use MoonShine\Components\TableBuilder;
use MoonShine\Fields\Text;
use MoonShine\TypeCasts\ModelCast;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class SummaryIps extends Page
{
    protected ?string $alias = 'summary-ips';

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
        return $this->title ?: 'Summary:IPs';
    }

    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
	{
		return [
            TableBuilder::make(
                items: PgaAccessLog::selectRaw('ip, count(ip) as count')
                    ->groupBy('ip')
                    ->orderBy('count', 'desc')
                    ->paginate(5)
            )
                ->fields([Text::make('IP'), Text::make('Count')])
                ->cast(ModelCast::make(PgaAccessLog::class))
        ];
	}
}
