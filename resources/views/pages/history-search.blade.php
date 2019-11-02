@extends('layouts.app')
@section('content')

    <div class="container-fluid app-body">
        <h3>Recent Posts Sent To Buffer </h3>
        <div class="row">
            <div class="col-md-8">

                <form method="get" action="{{ route('search') }}">
                    <div class="col-md-3">

                        <input type="text" class="form-control" name="query" value="{{ isset($query) ? $query : '' }}" placeholder="Search here ....">
                    </div>


                </form>
{{--                <form method="get" action="{{ route('search') }}">--}}
{{--                    <div class="col-md-3">--}}
{{--                        <select class="form-control" name="select">--}}
{{--                            <option value="all">All Groupe</option>--}}
{{--                            <option value="upload">Content Upload</option>--}}
{{--                            <option value="curation">Content Curation</option>--}}
{{--                            <option value="rss-automation">RSS-Automation</option>--}}
{{--                        </select>--}}

{{--                    </div>--}}

{{--                    --}}{{--                    <div class="col-md-3">--}}
{{--                    --}}{{--                        <input class="form-control" type="date" name="date" placeholder="MM/DD/YYY" type="text"/>--}}
{{--                    --}}{{--                    </div>--}}

{{--                    <div class="col-md-3">--}}

{{--                        <div class="input-group">--}}

{{--                            <button type="text">Search</button>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </form>--}}


            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover social-accounts">
                    <thead>
                    <tr>
                        <th>Group Name</th>
                        <th>Group Type</th>
                        <th>Account Name</th>
                        <th>Post Text</th>
                        <th>Time</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($buffer_posts as $buffer_post)
                        <tr>
                            <td>{{ $buffer_post->name }}</td>
                            <td>{{ $buffer_post->type }}</td>
                            <td>{{ $buffer_post->uname }}</td>
                            <td>{{ $buffer_post->posttext }}</td>
                            <td>{{ $buffer_post->time }}</td>
                        </tr>
                    @endforeach


                    </tbody>


                </table>
            </div>

            <div>
                <div style="float: right;">
                    {{ $buffer_posts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
