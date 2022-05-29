<div>
    @if (Session::has('message'))
        <p id="success" data-value="1" data-msg="{{ session::get('message') }}"></p>
    @elseif(Session::has('dangerMessage'))
        <p id="danger" data-value="1" data-msg="{{ session::get('dangerMessage') }}"></p>
    @endif

    <div class="row  w-100">
        @forelse ($ads as $ad)
            <main class="col-md-4 col-lg-3">
                <section class="card ">
                    <div class="card-header">
                        {{ $ad->url }}
                    </div>
                    <div class="card-body">
                        <img class="card-img w-100" src=" {{ asset($ad->image) }}" alt="" height="150px">
                    </div>
                    <div class="card-footer">
                        <a href=" {{ $ad->url }}" class="text-primary">open link </a>
                        <br>
                        <button wire:focus="$emit('edit',{{ $ad }})"
                            class=" btn btn-outline-primary editeModalbtn btn-sm">
                            <span>edit</span>
                            <i class="fa fa-edit"></i>
                        </button>
                        <button wire:focus="$emit('detele',{{ $ad }})"
                            class=" btn btn-outline-danger deleteModalBtn btn-sm">
                            <span>delete</span>
                            <i class="fa fa-trash"></i>
                        </button>
                        <button wire:focus="$emit('active',{{ $ad }})"
                            class=" btn btn-outline-success deactiveModalBtn btn-sm">
                            <span>active</span>
                            <i class="fa fa-cog"></i>
                        </button>
                    </div>
                </section>
            </main>

        @empty
            <h2 class="alert alert-primary">no data found </h2>
        @endforelse
        {{ $ads->links() }}
    </div>



    <!-- edit ad Modal -->
    <div class="modal fade editeModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Ad </h5>
                    <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($selectedAd != null)
                        <form action="{{ route('ad.update', $selectedAd->id) }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            @method('patch')
                            <label for="url"> url </label>
                            <input type="url" name="url" id="url" class="form-control mb-2 "
                                value="{{ $selectedAd->url }}">
                            @error('url')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror

                            <label for="image"> image </label>
                            <input type="file" name="image" id="image" class="form-control mb-2 ">
                            @error('image')
                                <p class="text-danger"> {{ $message }} </p>
                            @enderror
                            <button type="button" class="btn btn-secondary closeModal"
                                data-dismiss="modal">Close</button>
                            <button class="btn btn-success">update ad</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- delete ad Modal -->
    <div class="modal fade deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Ad </h5>
                    <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($selectedAdToDelete != null)
                        <form action="{{ route('ad.delete', $selectedAdToDelete->id) }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            @method('delete')
                            <p class="alert alert-danger">
                                <b>are you sure you want to delete the selected ad?</b>
                            </p>
                            <button type="button" class="btn btn-secondary closeModal"
                                data-dismiss="modal">Close</button>
                            <button class="btn btn-danger">delete ad</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- deactive ad Modal -->
    <div class="modal fade deactiveModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Active Ad </h5>
                    <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if ($selectedAdToActive != null)
                        <form action="{{ route('ad.actived', $selectedAdToActive->id) }}" method="post"
                            enctype="multipart/form-data">

                            @csrf
                            @method('patch')
                            <p class="alert alert-success">
                                <b>are you sure you want to active the selected ad?</b>
                            </p>
                            <button type="button" class="btn btn-secondary closeModal"
                                data-dismiss="modal">Close</button>
                            <button class="btn btn-success">active ad</button>
                        </form>
                    @endif
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
            $(".deleteModalBtn").click(function() {
                $(".deleteModal").modal("show");
            })

            $(".deactiveModalBtn").click(function() {
                $(".deactiveModal").modal("show");
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
