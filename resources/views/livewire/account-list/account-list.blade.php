<div>
    <div class="card">
        <div class="card-header">
            <span>all employeerss </span>
            <input type="text" class="form-inline " placeholder="searh" wire:model="search">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>id</th>
                        <th>name</th>
                        <th>last name</th>
                        <th>phone</th>
                        <th>image</th>
                        <th>email</th>
                        <th>all money</th>
                        <th>all remainder</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        @forelse ($employeerAccounts as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->lname }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    <img src="{{ asset($user->image) }}" alt="" class="imageRounded">
                                </td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->allmoney }}</td>
                                <td>{{ $user->remainder }}</td>
                                <td>
                                    {{-- <a href="{{route('user.edit',$user)}}" class="btn btn-outline-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                    </a> --}}
                                    <a href="{{ route('employeerAccount.show', $user->name) }}"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="fa fa-eye"></i>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
            </button>

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
