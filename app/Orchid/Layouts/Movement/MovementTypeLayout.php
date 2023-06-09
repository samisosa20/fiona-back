<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Movement;

use Orchid\Screen\Field;
use Orchid\Screen\Layouts\Rows;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\RadioButtons;

class MovementTypeLayout extends Rows
{
    /**
     * The screen's layout elements.
     *
     * @return Field[]
     */
    public function fields(): array
    {
        return [
            RadioButtons::make('movement.type')
                ->options([
                    'income' => __('Income'),
                    'expensive' => __('Expensive'),
                    'transfer' => __('Transfer')
                ])
                ->required()
                ->title(__('Type Movement')),

            Input::make('movement.amount')
                ->type('number')
                ->step(0.01)
                ->min(0)
                ->required()
                ->title(__('Amount')),

            DateTimer::make('movement.date_purchase')
                ->allowInput()
                ->format24hr()
                ->required()
                ->enableTime()
                ->format('Y-m-d H:i')
                ->value(now()->format('Y-m-d H:i'))
                ->title(__('Date purchase')),
        ];
    }
}
