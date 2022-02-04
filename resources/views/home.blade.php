@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                {{-- content --}}
                <div class="card-body">
                    <livewire:show-contact>
                </div>
                {{-- endContent --}}
            </div>
        </div>
    </div>
</div>
@endsection
