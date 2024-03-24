@extends('components.layouts.admin.main')

@section('mainContent')
<div class="mx-auto sm:px-6 lg:px-8 ">
    <div class="overflow-hidden rounded-lg bg-white shadow">
        <div class="p-10">
            <div class="w-full">
            @isset($user)
                @livewire('admin.edit-user', ['user' => $user])
            @else
                @livewire('admin.edit-user')
            @endisset
            </div>
        </div>
    </div>
</div>
@endsection
