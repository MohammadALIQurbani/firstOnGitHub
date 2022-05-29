<div>
    <div class="card">
        <div class="card-header">
            <span>all employeerss </span>
            <input type="text" class="form-inline " placeholder="searh" wire:model="search">
            @if (Session::has('message'))
                <p class="alert alert-success m-2">
                    {{ session::get('message') }}
                </p>
            @endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <th>id</th>
                        <th>name</th>
                        <th>last name</th>
                        <th>phone</th>
                        <th>image</th>
                        <th>email</th>
                        {{-- <th>role</th> --}}
                        <th>update money actount</th>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lname }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <img src="{{ asset($user->image) }}" alt="" class="imageRounded">
                                </td>
                                <td>{{ $user->email }}</td>
                                {{-- <td>{{ $user->role }}</td> --}}
                                <td>

                                    <button class="accountbtn btn btn-outline-success btn-sm"
                                        data-id="{{ $user->id }}">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <p class="">{{ $users->links() }}</p>
            </div>

            <!-- Modal -->
            <div class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>

                        </div>
                        <div class="modal-body">
                            <form action="{{ route('employeeAccount.store') }}" method="POST">
                                @csrf
                                <input type="hidden" id="user_id" name="user_id">
                                <label for="">money</label>
                                <input type="number" class="form-control mb-2" name="money">

                                <label for="">date</label>
                                <input type="date" class="form-control mb-2">
                                <button type="button" class="btn btn-secondary">Close</button>
                                <button type="submit" class="btn btn-primary">submit</button>
                            </form>
                        </div>
                        {{-- <div class="modal-footer"> --}}
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".accountbtn").click(function() {
                $("#user_id").val($(this).attr('data-id'));
                // alert($(this).attr('data-id'));
                $(".modal").modal("show");
            });
            $(".btn-secondary").click(function() {
                $(".modal").modal("hide");
            })
        })
    </script>
@endpush
