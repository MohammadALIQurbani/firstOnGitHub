@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4>dear admin you are going to fill out jop post of <b>{{ $user->name }} </b> infomation</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('jobPost.store', $user) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="title">title</label>
                            <input type="text" name="title" id="title" class="form-control mb-1" value="{{ old('title') }}"
                                placeholder="title">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="function_areas">function_area</label>
                            <select class="form-control mb-1" name="function_area_id" id="function_areas">
                                <option value="">select functional area</option>
                                @forelse ($functionAreas as $functionArea)
                                    <option value="{{ $functionArea->id }}">
                                        {{ $functionArea->name }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                            @error('function_areas')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="vancy">vancy</label>
                            <input type="text" id="vancy" class="form-control  mb-1" name="vancy"
                                value="{{ old('vancy') }}" placeholder="vancy">

                            @error('vancy')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="expire_date">expire_date</label>
                            <input type="date" id="expire_date" class="form-control mb-2" name="expire_date"
                                value="{{ old('expire_date') }}" placeholder="expire_date">

                            @error('expire_date')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="gender">gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">select danger</option>
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="any">any</option>
                            </select>

                            @error('gender')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="language">language </label>
                            <input type="text" id="language" class="form-control mb-1" name="language"
                                value="{{ old('language') }}" placeholder=" dari,pashto,english, ...">

                            @error('language')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="salary">salary</label>
                            <input type="text" id="salary" class="form-control mb-1" name="salary"
                                value="{{ old('salary') }}" placeholder="salary">

                            @error('salary')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="contract_preiod">contract_preiod</label>
                            <input type="text" id="contract_preiod" class="form-control mb-1" name="contract_preiod"
                                value="{{ old('contract_preiod') }}" placeholder="contract_preiod">

                            @error('contract_preiod')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="location">location</label>
                            <input type="text" id="location" class="form-control mb-1" name="location"
                                value="{{ old('location') }}" placeholder="location">

                            @error('location')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="apply_email">apply_email</label>
                            <input type="email" id="apply_email" class="form-control mb-1" name="apply_email"
                                value="{{ old('apply_email') }}" placeholder="apply_email">


                            @error('apply_email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="apply_form">apply_form</label>
                            <input type="url" id="apply_form" class="form-control mb-1" name="apply_form"
                                value="{{ old('apply_form') }}" placeholder="apply_form or apply site url">

                            @error('apply_form')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="time">time</label>
                            <select id="time" class="form-control mb-1" name="time">
                                <option value="">select time</option>
                                <option value="part_time">part_time</option>
                                <option value="full_time">full_time</option>
                            </select>

                            @error('apply_form')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="company_information">company_information</label>
                            <textarea name="company_information" id="company_information" class="textarea mb-2">
                                {!! old('company_information') !!}     
                            </textarea>

                            @error('company_information')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="job_description">job_description</label>
                            <textarea name="job_description" id="job_description" class="textarea mb-2">{!! old('job_description') !!} </textarea>


                            @error('job_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="job_requirements">job_requirements</label>
                            <textarea name="job_requirements" id="job_requirements" class="textarea mb-2">  {!! old('job_requirements') !!}</textarea>

                            @error('job_requirements')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <label for="apply_description">apply_description</label>
                            <textarea name="apply_description" id="apply_description" class="textarea mb-2"> {!! old('apply_description') !!}</textarea>

                            @error('apply_description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <label for="experince">experince</label>
                            <textarea name="experince" id="experince" class="textarea mb-2"> {!! old('experince') !!}</textarea>

                            @error('experince')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                            <button class="btn btn-outline-primary">submit jop post information</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            // Summernote
            $('.textarea').summernote()
        })
    </script>
@endpush
