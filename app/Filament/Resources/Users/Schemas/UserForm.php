<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(2)
            ->components([
                Section::make('Personal Information')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->label('Email address')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(20),
                        DatePicker::make('date_of_birth')
                            ->label('Date of Birth'),
                        Select::make('gender')
                            ->options([
                                'male' => 'Male',
                                'female' => 'Female',
                                'other' => 'Other',
                            ])
                            ->native(false),
                        TextInput::make('country')
                            ->maxLength(100),
                        TextInput::make('city')
                            ->maxLength(100),
                    ])
                    ->columns(2),

                Section::make('Account Settings')
                    ->schema([
                        TextInput::make('password')
                            ->password()
                            ->required(fn (string $context): bool => $context === 'create')
                            ->minLength(8)
                            ->dehydrated(fn ($state) => filled($state))
                            ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                        Select::make('role')
                            ->options([
                                'user' => 'User',
                                'admin' => 'Admin',
                                'moderator' => 'Moderator',
                                'editor' => 'Editor',
                            ])
                            ->required()
                            ->default('user')
                            ->native(false),
                        Select::make('status')
                            ->options([
                                'active' => 'Active',
                                'inactive' => 'Inactive',
                                'suspended' => 'Suspended',
                            ])
                            ->required()
                            ->default('active')
                            ->native(false),
                        DateTimePicker::make('email_verified_at')
                            ->label('Email Verified At'),
                    ])
                    ->columns(2),

                Section::make('Profile')
                    ->schema([
                        FileUpload::make('avatar')
                            ->image()
                            ->imageResizeMode('cover')
                            ->imageCropAspectRatio('1:1')
                            ->imageResizeTargetWidth(200)
                            ->imageResizeTargetHeight(200)
                            ->directory('avatars'),
                        Textarea::make('bio')
                            ->rows(4)
                            ->maxLength(1000),
                    ])
                    ->columns(2),

                Section::make('System Information')
                    ->schema([
                        DateTimePicker::make('last_login_at')
                            ->label('Last Login')
                            ->disabled(),
                        DateTimePicker::make('profile_completed_at')
                            ->label('Profile Completed At')
                            ->disabled(),
                    ])
                    ->columns(2)
                    ->visibleOn('edit'),
            ]);
    }
}
