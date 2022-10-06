@extends('layouts.admin.master')

@section('content')
    <div class="body-wrapper">
        <div class="bodywrapper__inner">

            <div class="row">
                <div class="col-lg-12">
                    {{--<div class="card b-radius--10 ">--}}
                        {{--<div class="card-body p-0">--}}
                            {{--<div class="table-responsive--md table-responsive">--}}
                    <div class="col-lg-6 col-sm-6">
                        <h6 class="page-title">Manage Users</h6>
                    </div>
                                <table id="adminTable" class="table table--light style--two">
                                    <thead>
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col">Username</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Joined At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td><a href="{{ route('view-user', $user->id) }}">{{ $user->username }}</a></td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->number ?? 'N/A' }}</td>
                                                <td>{{ ($user->role_id == 1 ? 'Admin' : 'User') }}</td>
                                                <td><span class="{{ ($user->status == '' ? 'text-success' : 'text-danger') }}">{{ ($user->status == '' ? 'Active' : 'Banned') }}</span></td>
                                                <td>{{ date_format($user->created_at, 'd-m-Y') }}</td>
                                            </tr>
                                            @endforeach
                                    </tbody>
                                </table><!-- table end -->
                            </div>
                        {{--</div>--}}
                    {{--</div><!-- card end -->--}}
                {{--</div>--}}

            </div>
        </div><!-- bodywrapper__inner end -->
    </div><!-- body-wrapper end -->
@endsection