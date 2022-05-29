@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ asset($jobPost->user->image) }}"
                        alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"> {{ $jobPost->title }} </h3>

                <p class="text-muted text-center"> {{ $jobPost->functionArea->name }} </p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>title</b> <a class="float-right"> {{ $jobPost->title }} </a>
                    </li>
                    <li class="list-group-item">
                        <b>functional area</b> <a class="float-right">{{ $jobPost->functionArea->name }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>gender</b> <a class="float-right">{{ $jobPost->gender }}</a>
                    </li>

                    <li class="list-group-item">
                        <b>time</b> <a class="float-right">{{ $jobPost->time }}</a>
                    </li>


                    <li class="list-group-item">
                        <b>post date</b> <a class="float-right">{{ $jobPost->created_at }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>expired date</b> <a class="float-right">{{ $jobPost->expire_date }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>language</b> <a class="float-right">{{ $jobPost->language }}</a>
                    </li>

                    <li class="list-group-item">
                        <b>salary</b> <a class="float-right">{{ $jobPost->salary }}</a>
                    </li>

                    <li class="list-group-item">
                        <b>contract_preiod</b> <a class="float-right">{{ $jobPost->contract_preiod }}</a>
                    </li>

                    <li class="list-group-item">
                        <b>location</b> <a class="float-right">{{ $jobPost->location }}</a>
                    </li>

                    <li class="list-group-item">
                        <b>apply_email</b> <a href="/{{ $jobPost->apply_email }}" class="float-right"
                            target="_blank">{{ $jobPost->apply_email }}</a>
                    </li>

                    <li class="list-group-item">
                        <b>apply_form</b> <a href="{{ $jobPost->apply_form }}"
                            class="float-right">{{ $jobPost->apply_form }}</a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h2 class="text-primary">company_information</h2>
                {!! $jobPost->company_information !!}
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <h3 class="text-primary">job_description</h3>
                {!! $jobPost->job_description !!}
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <h4 class="text-primary">job_requirements</h4>
                {!! $jobPost->job_requirements !!}
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h5 class="text-primary">apply_description</h5>
                {!! $jobPost->apply_description !!}
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">
                <h6 class="text-primary">experince</h6>
                {!! $jobPost->apply_description !!}
            </div>
        </div>
        <a href="{{ route('jobPost.edit', $jobPost) }}" class="btn btn-primary btn-block"><b>edit job post
                inforomation
                <i class="fa fa-edit"></i></b></a>
    </div>
@endsection
