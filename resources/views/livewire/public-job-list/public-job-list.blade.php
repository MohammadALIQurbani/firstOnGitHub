<div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mb-5 mt-1 sm-text-center">
                <h2>all new jobs available in project Name.domain Name </h2>

                <div class="row mb-2">
                    <div class="col-md-5 mb-1">

                        <div class="input-group input-group-sm">
                            <input type="text" placeholder="job title" class="form-control py-2"
                                wire:model.defer="title">

                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="input-group input-group-sm">
                            <input type="text" placeholder="location" class="form-control" wire:model.defer="location">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-primary btn-flat">
                                    <i class="fa fa-search" wire:click="search">search</i>
                                </button>
                            </span>
                        </div>
                    </div>

                </div>

                @foreach ($jobPosts as $jobPost)
                    <div class="row bg-white mb-2 justify-content-center rounded">

                        <div class="col-md-4 ">
                            <img src="{{ asset($jobPost->user->image) }}" class="postImage  mt-2" alt="image"
                                width="590px">
                            <div class="pt-2">

                                <a href="{{ route('job.post.details', $jobPost) }}"
                                    class="text-dark mt-4  text-decoration">
                                    <b> {{ $jobPost->user->name }}</b>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 m-0 p-0 sm-text-center">
                            <div class="p-2">
                                <a href="{{ route('job.post.details', $jobPost) }}"
                                    class="text-dark mt-4  text-decoration">
                                    <b> {{ $jobPost->title }}</b>
                                </a>

                                <p>
                                    <b>location</b>: {{ $jobPost->location }}
                                </p>

                                <p>
                                    <b>post date</b>: {{ $jobPost->created_at }}
                                </p>

                                <p>
                                    <b>close date</b>: {{ $jobPost->expire_date }}
                                </p>
                            </div>
                            <a href="{{ route('job.post.details', $jobPost) }}"
                                class="btn btn-outline-primary float-md-end m-2 btn-flat">detial</a>
                        </div>

                    </div>
                @endforeach

            </div>
            <div class="col-md-4 mt-5">
                <a href="">
                    <div class="card">
                        <img src="{{ asset('image/portfolio-4.jpg') }}" alt="" class="card-img">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
