<div>
    <div class="card">
        @if (Session::has('message'))
            <p id="success" data-value="1" data-msg="{{ session::get('message') }}"></p>
        @elseif(Session::has('dangerMessage'))
            <p id="danger" data-value="1" data-msg="{{ session::get('dangerMessage') }}"></p>
        @endif
        <div class="card-header">
            <span class="block">all active job posts </span><br>
            <input type="text" placeholder=" searh" wire:model="search">
            <a href="{{ route('jobPost.create') }}" class="btn btn-outline-primary btn-sm float-right ">
                add a employeer's job post information
                <i class="fa fa-plus"></i>
            </a>


        </div>
        <div class="card-body">
            <div class="table-responsive bg-light rounded">
                <table class="table table-hover table-striped">
                    <thead class="bg-info">
                        <th>id</th>
                        <th>title</th>
                        <th>logo</th>
                        <th>vancy</th>
                        <th> date</th>
                        <th>expire date</th>
                        <th>functional area</th>
                        <th>remaind days</th>
                        <th>details</th>
                    </thead>
                    <tbody>
                        @forelse ($jobPosts as $jobPost)
                            <tr>
                                <td> {{ $jobPost->id }} </td>
                                <td> {{ $jobPost->title }} </td>
                                <td> <img src="{{ asset($jobPost->user->image) }}" alt="" class="imageRounded">
                                </td>
                                <td> {{ $jobPost->vancy }} </td>
                                <td> {{ $jobPost->created_at }} </td>
                                <td>
                                    <p> {{ $jobPost->expire_date }}</p>

                                </td>
                                <td> {{ $jobPost->functionArea->name }} </td>
                                {{-- @foreach ($jobPost->functionAreas as $functionArea)
                                @endforeach --}}
                                <td>

                                    @php
                                        $to = Carbon\Carbon::createFromDate(now()->toString());
                                        $date = Carbon\Carbon::create($jobPost->expire_date . '');
                                        $day = $to->diffInDays($date, false);
                                        $day = $day + 1;
                                    @endphp
                                    @if ($day <= 0)
                                        <span class="text text-red-500 font-semibold" dir="rtl">
                                            {{ $day }}

                                        </span>
                                        <p>
                                            <a href="" class="btn text-primary">
                                            </a>
                                        </p>
                                    @else
                                        <span class="text text-green-500 font-semibold" dir="rtl">
                                            {{ $day }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('jobPost.show', $jobPost) }}"
                                        class="btn btn-outline-primary btn-sm ">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-outline-warning btn-sm hover"
                                        wire:click="$emit('deactive',{{ $jobPost->id }})" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fa fa-trash"></i>
                                    </a>

                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{-- <p class="">{{ $users->links() }}</p> --}}
            </div>
            <!-- Button trigger modal -->
            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button> --}}

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deactive post modal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($selectedJopPostToDeactive != null)
                                <form action="{{ route('jobPost.deactive', $selectedJopPostToDeactive->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('patch')
                                    <p class="alert alert-warning">
                                        <b>are you sure i want to deactive selected jop post?</b>
                                    </p>

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="sumbit" class="btn btn-warning">deactive jop post</button>

                                </form>
                            @endif
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal fade deactivemodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".editeModalbtn").click(function() {
                $(".editeModal").modal('show');
            })
            $(".closeModal").click(function() {
                $(".modal").modal('hide');

            })
            $(".deactivebtn").click(function() {
                $(".deactivemodal").modal("show");
            })
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 6000
            });

            // $('.swalDefaultSuccess').click(function() {
            if ($("#success").attr('data-value') === '1') {
                // let msg = $("#success").attr('data-msg');
                // alert(msg)
                Toast.fire({
                    type: 'success',
                    title: $("#success").attr('data-msg')
                })
            }
            // });
            $('.swalDefaultInfo').click(function() {
                Toast.fire({
                    type: 'info',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            $('.swalDefaultError').click(function() {
                Toast.fire({
                    type: 'error',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });
            if ($("#danger").attr('data-value') === '1') {
                Toast.fire({
                    type: 'warning',
                    title: $("#danger").attr('data-msg')
                })
            }
            $('.swalDefaultQuestion').click(function() {
                Toast.fire({
                    type: 'question',
                    title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
                })
            });

            // $('.toastrDefaultSuccess').click(function() {
            // toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            // });
            $('.toastrDefaultInfo').click(function() {
                toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultError').click(function() {
                toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
            $('.toastrDefaultWarning').click(function() {
                toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
        })
    </script>
@endpush
