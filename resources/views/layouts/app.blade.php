<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-white dark:bg-zinc-800">

        <div class="flex min-h-screen">

            {{-- Sidebar --}}
            <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
                <flux:sidebar.toggle class="lg:hidden" />

                <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                    <x-app-logo />
                </a>

                <flux:navlist variant="outline">
                    <flux:navlist.group :heading="__('Menu')" class="grid">

                        <flux:navlist class="w-64">

                            {{-- Item: Dashboard --}}
                            <flux:navlist.item
                                :href="route('dashboard')"
                                :current="request()->routeIs('dashboard')"
                                wire:navigate
                            >
                                {{ __('Dashboard') }}
                            </flux:navlist.item>

                            {{-- Grupo: Usuários --}}
                            <flux:navlist.group
                                heading="Usuarios"
                                expandable
                                :expanded="request()->routeIs('usuarios.*')"
                                class="mt-4">
                                
                                <flux:navlist.item
                                    :href="route('usuarios.index')"
                                    :current="request()->routeIs('usuarios.index')"
                                    wire:navigate
                                >
                                    {{ __('Listar') }}
                                </flux:navlist.item>

                                <flux:navlist.item
                                    :href="route('usuarios.create')"
                                    :current="request()->routeIs('usuarios.create')"
                                    wire:navigate
                                >
                                    {{ __('Nova') }}
                                </flux:navlist.item>
                            </flux:navlist.group>

                            {{-- Grupo: Bancos --}}
                            <flux:navlist.group
                                heading="Bancos"
                                expandable
                                :expanded="request()->routeIs('bank.*')"
                                class="mt-4">

                                <flux:navlist.item
                                    :href="route('bank.index')"
                                    :current="request()->routeIs('bank.index')"
                                    wire:navigate
                                >
                                    {{ __('Listar') }}
                                </flux:navlist.item>

                                <flux:navlist.item
                                    :href="route('bank.create')"
                                    :current="request()->routeIs('bank.create')"
                                    wire:navigate
                                >
                                    {{ __('Criar') }}
                                </flux:navlist.item>

                            </flux:navlist.group>

                            {{-- Grupo: Cadastros --}}
                            <flux:navlist.group
                                heading="Cadastros"
                                expandable
                                :expanded="request()->routeIs('bank.*') || request()->routeIs('usuarios.*')"
                                class="mt-4">

                                <flux:navlist.item
                                    :href="route('bank.index')"
                                    :current="request()->routeIs('bank.*')"
                                    wire:navigate
                                >
                                    {{ __('Bancos') }}
                                </flux:navlist.item>

                                <flux:navlist.item
                                    :href="route('usuarios.index')"
                                    :current="request()->routeIs('usuarios.*')"
                                    wire:navigate
                                >
                                    {{ __('Contas') }}
                                </flux:navlist.item>
                            </flux:navlist.group>

                        </flux:navlist>

                    </flux:navlist.group>
                </flux:navlist>

                <flux:spacer />

                {{-- Links Inferiores --}}
                <flux:navlist variant="outline">
                    <flux:navlist.item href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                        {{ __('Repository') }}
                    </flux:navlist.item>

                    <flux:navlist.item href="https://laravel.com/docs/starter-kits#livewire" target="_blank">
                        {{ __('Documentation') }}
                    </flux:navlist.item>
                </flux:navlist>

                {{-- Desktop User Menu --}}
                <flux:dropdown position="bottom" align="start">
                    <flux:profile
                        :name="auth()->user()->name"
                        :initials="auth()->user()->initials()"
                    />

                    <flux:menu class="w-[220px]">
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                        >
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" class="w-full">
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </flux:sidebar>

            {{-- Mobile User Menu --}}
            <flux:header class="lg:hidden">
                <flux:sidebar.toggle class="lg:hidden" inset="left" />

                <flux:spacer />

                <flux:dropdown position="top" align="end">
                    <flux:profile
                        :initials="auth()->user()->initials()"
                    />

                    <flux:menu>
                        <flux:menu.radio.group>
                            <div class="p-0 text-sm font-normal">
                                <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                    <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                        <span
                                            class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                        >
                                            {{ auth()->user()->initials() }}
                                        </span>
                                    </span>

                                    <div class="grid flex-1 text-start text-sm leading-tight">
                                        <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                        <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <flux:menu.radio.group>
                            <flux:menu.item :href="route('settings.profile')" wire:navigate>{{ __('Settings') }}</flux:menu.item>
                        </flux:menu.radio.group>

                        <flux:menu.separator />

                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <flux:menu.item as="button" type="submit" class="w-full">
                                {{ __('Log Out') }}
                            </flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            </flux:header>

            {{-- Conteúdo principal --}}
            <main class="flex-1 p-6 overflow-auto">
                @yield('content')
            </main>

        </div>

        @fluxScripts
    </body>
</html>
