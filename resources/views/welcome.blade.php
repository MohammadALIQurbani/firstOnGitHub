@extends('layouts.publicapp')

@section('content')
    <div class="container-fluid p-0  bg-gray">
        <div class="site-content">
            <div class="d-flex justify-content-center">
                <div class="d-flex flex-column text-black text-blod py-5">
                    <h1 class="site-title">
                        Find Your Dream Job In Afghanistan.
                    </h1>
                    <p class="site-describtion">
                        <b> Expand Your NetWork, Hire Best Talants.</b>
                    </p>
                </div>
            </div>
        </div>
        <div class="container">
            <livewire:public-post.post-lists>
        </div>
        <livewire:public-job-list.public-job-list>

    </div>
@endsection
