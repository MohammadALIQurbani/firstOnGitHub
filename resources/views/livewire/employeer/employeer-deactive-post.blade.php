<div>
    <div class="card">
        @if (Session::has('message'))
            <p id="success" data-value="1" data-msg="{{ session::get('message') }}"></p>
        @elseif(Session::has('dangerMessage'))
            <p id="danger" data-value="1" data-msg="{{ session::get('dangerMessage') }}"></p>
        @endif
        <div class="card-header">
            <span class="block">all of your's deactive job posts </span>

            {{-- @php
                $to = Carbon\Carbon::createFromDate(now()->toString());
                $date = Carbon\Carbon::create($workShop->present_date . '');
                $day = $to->diffInDays($date, false);
                $day = $day + 1;
            @endphp
            @if ($day <= 0)
                <span class="text text-red-500 font-semibold" dir="rtl">
                    {{ $day }} روز سپری شده از برگذاری
                </span>
                <p>
                    <a href="{{ route('workshop.mak.asPresent', $workShop->id) }}" class="btn text-primary">انتقال به
                        بخش ارایه شده ها </a>
                </p>
            @else
                <span class="text text-green-500 font-semibold" dir="rtl">
                    - مدت روز {{ $day }} باقی مانده تا برگذاری
                </span>
            @endif --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>id</th>
                        <th>title</th>
                        <th>logo</th>
                        <th>vancy</th>
                        <th>post date</th>
                        <th>expire/close date</th>
                        <th>functional area</th>
                        <th>action</th>
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
                                <td> {{ $jobPost->expire_date }} </td>
                                <td> {{ $jobPost->functionArea->name }} </td>
                                {{-- @foreach ($jobPost->functionAreas as $functionArea)
                                @endforeach --}}
                                <td>
                                    <a href="{{ route('jobPost.show', $jobPost) }}"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <button wire:click="$emit('active',{{ $jobPost }})"
                                        class="btn btn-outline-success btn-sm deactiveBnt" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="fa fa-trash"></i>
                                    </button>
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
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($selectedJopPostToActive != null)
                                <form action="{{ route('jobPost.active', $selectedJopPostToActive->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('patch')
                                    <p class="alert alert-success">
                                        <b>are you sure you want to activ selected jop post</b>
                                    </p>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">active ad</button>
                                </form>
                            @endif
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
            // $(".deactiveBnt").click(function() {
            //     $(".deactiveModal").modal("show");
            // })
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
                    type: 'success',
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
            $('.emtpyAccount').click(function() {
                toastr.error(
                    'your account is empty or you don\'t have engough money in your account pleas charge your account.'
                )
            });
            $('.toastrDefaultsuccess').click(function() {
                toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
            });
        })
    </script>
@endpush
