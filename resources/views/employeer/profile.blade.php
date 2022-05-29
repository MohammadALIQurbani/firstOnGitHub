@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">

            <div class="col-md-6">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset($user->image) }}"
                                alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">{{ $user->lname }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>name</b> <a class="float-right">{{ $user->name }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>last name</b> <a class="float-right">{{ $user->lname }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>phone</b> <a class="float-right">{{ $user->phone }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>email</b> <a class="float-right">{{ $user->email }}</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>update</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>
            <div class="col-md-4">

                <!-- About Me Box -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">About Me</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum
                            enim
                            neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
