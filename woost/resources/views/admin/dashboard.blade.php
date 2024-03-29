@extends('components.layouts.admin.main')

@section('mainContent')
<div class="mx-auto sm:px-6 lg:px-8 ">
    <div class="overflow-hidden rounded-lg bg-blue shadow">
        <div class="p-10">
            <h1 class="text-xl font-semibold text-gray-900 mb-5">Administration</h1>
            <div x-data="{
                    openBigTab:{{ session('openBigTab', 1) }},
                    activeTextClasses: 'rounded-l-lg text-indigo-500',
                    inactiveTextClasses: 'text-gray-500 hover:text-gray-700',
                    activeBigTabClasses: 'bg-indigo-500',
                    inactiveBigTabClasses: 'bg-transparent',
                }">
                <div class="sm:hidden">
                    <label for="bigtabs" class="sr-only">Choisir une rubrique</label>
                    <select x-model="openBigTab" id="bigtabs" name="bigtabs" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm">
                        <option selected value="1">Utilisateurs</option>
                        <option value="2">Item 2</option>
                        <option value="3">Item 3</option>
                        <option value="4">Item 4</option>
                        <option value="5">Item 5</option>
                        <option value="6">Statistiques</option>
                    </select>
                </div>
                <div class="hidden sm:block">
                    <nav class="isolate flex divide-x divide-gray-200 rounded-lg shadow" aria-label="Tabs">

                        <a @click="openBigTab = 1" href="#" :class="openBigTab === 1 ? activeTextClasses : inactiveTextClasses" class="group inline-flex justify-center relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium hover:bg-gray-50 focus:z-10" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6.878V6a2.25 2.25 0 012.25-2.25h7.5A2.25 2.25 0 0118 6v.878m-12 0c.235-.083.487-.128.75-.128h10.5c.263 0 .515.045.75.128m-12 0A2.25 2.25 0 004.5 9v.878m13.5-3A2.25 2.25 0 0119.5 9v.878m0 0a2.246 2.246 0 00-.75-.128H5.25c-.263 0-.515.045-.75.128m15 0A2.25 2.25 0 0121 12v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6c0-.98.626-1.813 1.5-2.122" />
                            </svg>
                            <span>Utilisateurs</span>
                            <span aria-hidden="true" :class="openBigTab === 1 ? activeBigTabClasses : inactiveBigTabClasses" class="absolute inset-x-0 bottom-0 h-0.5">
                            </span>
                        </a>

                        <a @click="openBigTab = 2" href="#" :class="openBigTab === 2 ? activeTextClasses : inactiveTextClasses" class="group inline-flex justify-center relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium hover:bg-gray-50 focus:z-10" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                            </svg>
                            <span>Item 2</span>
                            <span aria-hidden="true" :class="openBigTab === 2 ? activeBigTabClasses : inactiveBigTabClasses" class="absolute inset-x-0 bottom-0 h-0.5">
                            </span>
                        </a>

                        <a @click="openBigTab = 3" href="#" :class="openBigTab === 3 ? activeTextClasses : inactiveTextClasses" class="group inline-flex justify-center relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium hover:bg-gray-50 focus:z-10" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                            <span>Item 3</span>
                            <span aria-hidden="true" :class="openBigTab === 3 ? activeBigTabClasses : inactiveBigTabClasses" class="absolute inset-x-0 bottom-0 h-0.5">
                            </span>
                        </a>

                        <a @click="openBigTab = 4" href="#" :class="openBigTab === 4 ? activeTextClasses : inactiveTextClasses" class="group inline-flex justify-center relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium hover:bg-gray-50 focus:z-10" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                            </svg>

                            <span>Item 4</span>
                            <span aria-hidden="true" :class="openBigTab === 4 ? activeBigTabClasses : inactiveBigTabClasses" class="absolute inset-x-0 bottom-0 h-0.5">
                            </span>
                        </a>

                        <a @click="openBigTab = 5" href="#" :class="openBigTab === 5 ? activeTextClasses : inactiveTextClasses" class="group inline-flex justify-center relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium hover:bg-gray-50 focus:z-10" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                            </svg>
                            <span>Item 5</span>
                            <span aria-hidden="true" :class="openBigTab === 5 ? activeBigTabClasses : inactiveBigTabClasses" class="absolute inset-x-0 bottom-0 h-0.5">
                            </span>
                        </a>

                        <a @click="openBigTab = 6" href="#" :class="openBigTab === 6 ? activeTextClasses : inactiveTextClasses" class="group inline-flex justify-center relative min-w-0 flex-1 overflow-hidden bg-white py-4 px-4 text-sm font-medium hover:bg-gray-50 focus:z-10" aria-current="page">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-0.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                            </svg>
                            <span>Statistiques</span>
                            <span aria-hidden="true" :class="openBigTab === 6 ? activeBigTabClasses : inactiveBigTabClasses" class="absolute inset-x-0 bottom-0 h-0.5">
                            </span>
                        </a>

                    </nav>
                </div>

                <div class="w-full">

                    <div x-show="openBigTab == 1">
                        @livewire('admin.manage-users')
                    </div>

                    <div x-show="openBigTab == 2">
                    </div>

                    <div x-show="openBigTab == 3">
                    </div>

                    <div x-show="openBigTab == 4">
                    </div>

                    <div x-show="openBigTab == 5">
                    </div>

                    <div x-show="openBigTab == 6">
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection