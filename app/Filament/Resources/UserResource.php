<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('two_factor_secret')
                    ->maxLength(65535),
                Forms\Components\Textarea::make('two_factor_recovery_codes')
                    ->maxLength(65535),
                Forms\Components\DateTimePicker::make('two_factor_confirmed_at'),
                Forms\Components\TextInput::make('current_team_id'),
                Forms\Components\TextInput::make('profile_photo_path')
                    ->maxLength(2048),
                Forms\Components\TextInput::make('address1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('address2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('region')
                    ->maxLength(255),
                Forms\Components\TextInput::make('country')
                    ->maxLength(255),
                Forms\Components\TextInput::make('postal_code')
                    ->maxLength(255),
                Forms\Components\TextInput::make('company_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone_number')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alternate_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255),
                Forms\Components\TextInput::make('payment_method')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tax_reference')
                    ->maxLength(255),
                Forms\Components\TextInput::make('account_number')
                    ->maxLength(255),
                Forms\Components\Textarea::make('notes')
                    ->maxLength(65535),
                Forms\Components\Toggle::make('active')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('email_verified_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('two_factor_secret'),
                Tables\Columns\TextColumn::make('two_factor_recovery_codes'),
                Tables\Columns\TextColumn::make('two_factor_confirmed_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('current_team_id'),
                Tables\Columns\TextColumn::make('profile_photo_path'),
                Tables\Columns\TextColumn::make('address1'),
                Tables\Columns\TextColumn::make('address2'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('region'),
                Tables\Columns\TextColumn::make('country'),
                Tables\Columns\TextColumn::make('postal_code'),
                Tables\Columns\TextColumn::make('company_name'),
                Tables\Columns\TextColumn::make('phone_number'),
                Tables\Columns\TextColumn::make('alternate_number'),
                Tables\Columns\TextColumn::make('website'),
                Tables\Columns\TextColumn::make('payment_method'),
                Tables\Columns\TextColumn::make('tax_reference'),
                Tables\Columns\TextColumn::make('account_number'),
                Tables\Columns\TextColumn::make('notes'),
                Tables\Columns\BooleanColumn::make('active'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }    
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
