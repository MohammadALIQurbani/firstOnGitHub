<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container">
        <form action="{{ route('sendMail') }}" method="POST">
            @csrf
            <div class="card ">
                <div class="card-header p-4 bg-dark">
                    <p>
                        <b>send or email to employeers inoder to inform them-:)</b>
                    </p>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <label for="title">title</label>
                            <input type="text" class="form-control mb-2" name="title">
                            <label for="body">body</label>
                            <textarea class="form-control textarea" name="body"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">employeer lists</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <th>id</th>
                                <th>name</th>
                                <th>last name</th>
                                <th>employeer logo</th>
                                <th>phone</th>
                                <th>
                                    email
                                </th>
                                <th>
                                    {{-- <input type="checkbox" wire:model="selectAll"> --}}
                                    <input type="checkbox" id="selectAll">
                                </th>
                            </thead>
                            <tbody>
                                @forelse ($employeers as $employeer)
                                    <tr>
                                        <td>{{ $employeer->id }}</td>
                                        <td>{{ $employeer->name }}</td>
                                        <td>{{ $employeer->lname }}</td>
                                        <td>
                                            <img src="{{ asset($employeer->image) }}" alt="" class="imageRounded">
                                        </td>
                                        <td> {{ $employeer->phone }} </td>
                                        <td>
                                            <label for="{{ $employeer->email }}">{{ $employeer->email }}</label>
                                        </td>
                                        <td>
                                            {{-- <input type="checkbox" name="email[]" id="{{ $employeer->email }}"
                                                wire:model="selectedRows" value="{{ $employeer->email }}"> --}}

                                            <input type="checkbox" name="email[]" id="{{ $employeer->email }}"
                                                value="{{ $employeer->email }}">
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary">
                send to selected employeers
            </button>
        </form>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.textarea').summernote();
            $("#selectAll").click(function() {
                $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
            })
        })
    </script>
@endpush
