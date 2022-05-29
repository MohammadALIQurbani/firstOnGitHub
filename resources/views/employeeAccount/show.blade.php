@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-header">times that {{ $user->name }} : {{ $user->lname }} payed money</div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>id</th>
                            <th>pay date</th>
                            <th>money</th>
                        </thead>
                        <tbody>
                            @forelse ($user->employeerAccounts as  $employeerAccount)
                                <tr>
                                    <td>{{ $employeerAccount->id }}</td>
                                    <td>{{ $employeerAccount->created_at }}</td>
                                    <td>{{ $employeerAccount->money }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
