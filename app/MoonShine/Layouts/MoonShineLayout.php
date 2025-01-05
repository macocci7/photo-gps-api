<?php

declare(strict_types=1);

namespace App\MoonShine\Layouts;

use MoonShine\Laravel\Layouts\AppLayout;
use MoonShine\ColorManager\ColorManager;
use MoonShine\Contracts\ColorManager\ColorManagerContract;
use MoonShine\Laravel\Components\Layout\{Locales, Notifications, Profile, Search};
use MoonShine\MenuManager\MenuGroup;
use MoonShine\MenuManager\MenuItem;
use MoonShine\UI\Components\{Breadcrumbs,
    Components,
    Layout\Flash,
    Layout\Div,
    Layout\Body,
    Layout\Burger,
    Layout\Content,
    Layout\Footer,
    Layout\Head,
    Layout\Favicon,
    Layout\Assets,
    Layout\Meta,
    Layout\Header,
    Layout\Html,
    Layout\Layout,
    Layout\Logo,
    Layout\Menu,
    Layout\Sidebar,
    Layout\ThemeSwitcher,
    Layout\TopBar,
    Layout\Wrapper,
    When};

final class MoonShineLayout extends AppLayout
{
    protected function assets(): array
    {
        return [
            ...parent::assets(),
        ];
    }

    protected function menu(): array
    {
        return [
            ...array_map(fn ($e) => $e->icon('m.cog-8-tooth'), parent::menu()),
            MenuItem::make('Docs', 'https://moonshine-laravel.com/docs', null, true)
                ->icon('m.academic-cap'),
            MenuGroup::make('Summary', [
                MenuItem::make('Endpoints', \App\MoonShine\Pages\SummaryEndpoints::class)
                    ->icon('code-bracket'),
                MenuItem::make('Exif Versions', \App\MoonShine\Pages\SummaryExifVersions::class)
                    ->icon('camera'),
                MenuItem::make('IPs', \App\MoonShine\Pages\SummaryIps::class)
                    ->icon('globe-alt'),
            ])->icon('chart-bar'),
        ];
    }

    /**
     * @param ColorManager $colorManager
     */
    protected function colors(ColorManagerContract $colorManager): void
    {
        parent::colors($colorManager);

        // $colorManager->primary('#00000');
    }

    public function build(): Layout
    {
        return parent::build();
    }
}
