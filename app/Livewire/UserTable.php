<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class UserTable extends Component implements HasForms, HasTable {
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table {
        return $table
            ->query(User::query())
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->headerActions([
                Tables\Actions\Action::make('newUser')
                    ->label('Add user')
                    ->modal()
                    ->form([
                        TextInput::make('name')
                            ->required()
                            ->columnSpan(2),
                        TextInput::make('email')
                            ->required()
                            ->columnSpan(2),
                    ])
                    ->action(function (array $data) {
                        User::create($data);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View {
        return view('livewire.user-table');
    }
}
