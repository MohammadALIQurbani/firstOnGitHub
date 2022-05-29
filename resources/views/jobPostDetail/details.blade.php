@extends('layouts.publicapp')

@section('content')
    <div class="container-fluid   bg-gray">


        <div class="row justify-content-center ">

            <div class="col-md-8">
                <div class="card mt-5">

                    <div class="text-center mt-2">

                        <img class="postImage " src="{{ asset($jobPost->user->image) }}" alt="">
                        <h2 class="text-primary">{{ $jobPost->title }}</h2>
                        <h3 class="text-default"> {{ $jobPost->user->name }} {{ $jobPost->user->lname }} </h3>

                    </div>
                    <ul class="list-group list-group-unbordered mb-3  m-3">
                        <h4 class="text-info">Job Details</h4>

                        <li class="list-group-item">
                            <b>title</b> <a class="float-end text-decoration"> {{ $jobPost->title }} </a>
                        </li>
                        <li class="list-group-item">
                            <b>functional area</b> <a
                                class="float-end text-decoration">{{ $jobPost->functionArea->name }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>gender</b> <a class="float-end text-decoration">{{ $jobPost->gender }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>time</b> <a class="float-end text-decoration">{{ $jobPost->time }}</a>
                        </li>


                        <li class="list-group-item">
                            <b>post date</b> <a class="float-end text-decoration">{{ $jobPost->created_at }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>expired date</b> <a class="float-end text-decoration">{{ $jobPost->expire_date }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>language</b> <a class="float-end text-decoration">{{ $jobPost->language }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>salary</b> <a class="float-end text-decoration">{{ $jobPost->salary }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>contract_preiod</b> <a
                                class="float-end text-decoration">{{ $jobPost->contract_preiod }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>location</b> <a class="float-end text-decoration">{{ $jobPost->location }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>apply_email</b> <a href="mailto:{{ $jobPost->apply_email }}"
                                class="float-end text-decoration" target="_blank">{{ $jobPost->apply_email }}</a>
                        </li>

                        <li class="list-group-item">
                            <b>apply_form</b> <a href="{{ $jobPost->apply_form }}"
                                class="float-end text-decoration">{{ $jobPost->apply_form }}</a>
                        </li>
                    </ul>
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

                <div class="card mt-2 mb-5">
                    <div class="card-body">
                        <h6 class="text-primary">apply</h6>
                        @if ($jobPost->apply_email != null)
                            <p>apply email</p>
                            <a href="mailto:{{ $jobPost->apply_email }}">{{ $jobPost->apply_email }}</a>
                            <br>
                        @endif
                        @if ($jobPost->apply_form != null)
                            <p>apply apply_form</p>

                            <a href="{{ $jobPost->apply_form }}">{{ $jobPost->apply_form }}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
