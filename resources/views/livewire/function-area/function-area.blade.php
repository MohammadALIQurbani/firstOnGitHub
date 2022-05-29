<div>
    <div class="card">
        @if (Session::has('message'))
            <p id="success" data-value="1" data-msg="{{ session::get('message') }}"></p>
        @elseif(Session::has('dangerMessage'))
            <p id="danger" data-value="1" data-msg="{{ session::get('dangerMessage') }}"></p>
        @endif
        <div class="card-header">
            <span>all functional areas </span>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary btn-sm float-right mt-2" data-toggle="modal"
                data-target="#exampleModal">
                add new functional area
                <i class="fa fa-plus"></i>
            </button>

            <input type="text" class="form-inline " placeholder="searh" wire:model="search">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>id</th>
                        <th>functional area</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        @forelse ($functionAreas as $functionArea)
                            <tr>
                                <td>{{ $functionArea->id }}</td>
                                <td>{{ $functionArea->name }}</td>
                                <td>

                                    <button wire:click="$emit('update',{{ $functionArea }})"
                                        class="accountbtn btn btn-outline-success btn-sm editeModalbtn">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button wire:click="$emit('delete',{{ $functionArea }})"
                                        class="modalDangerBtn btn btn-outline-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <p class="">{{ $functionAreas->links() }}</p>
            </div>


            <!-- Modal add functional area modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">functional area</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('FunctionArea.store') }}" method="POST">
                                @csrf
                                <label for="functionArea">functional area</label>
                                <input type="text" name="name" class="form-control mb-2"
                                    placeholder="enter name of functional area" required>
                                <button type="button" class="btn btn-secondary m-1" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary m-1">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal edit functional area modal-->
            <div class="modal fade editeModal" id="editeModal" tabindex="-1" aria-labelledby="editeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editeModalLabel">edit functional area</h5>
                            <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($selectedFunctionArea != null)
                                <form action="{{ route('FunctionArea.update', $selectedFunctionArea) }}"
                                    method="POST">
                                    @csrf
                                    @method('patch')
                                    <label for="functionArea">functional area</label>
                                    <input type="text" name="name" value="{{ $selectedFunctionArea->name }}"
                                        class=" form-control mb-2" placeholder="enter name of functional area" required>

                                    <button type="submit" class="btn btn-primary m-1">update</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal delete functional area modal-->
            <div class="modal fade modalDanger modal-danger" id="modal-danger" tabindex="-1"
                aria-labelledby="editeModalLabel" aria-hidden="true">
                <div class="modal-dialog " id="modal-danger">
                    <div class="modal-content bg-danger">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editeModalLabel">edit functional area</h5>
                            <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @if ($selectedFunctionAreaToDelete != null)
                                <form action="{{ route('FunctionArea.delete', $selectedFunctionAreaToDelete) }}"
                                    method="POST">
                                    @csrf
                                    <h3>are you sure you want to delete selected functional area?</h3>
                                    @method('delete')


                                    <button type="submit" class="btn btn-outline-light m-1">delete</button>
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
            $(".modalDangerBtn").click(function() {
                $(".modalDanger").modal("show");
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
