@extends('backend.master')
@section('content')
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        DataTable Example
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
<form method="post" action="{{route('author.store')}}">
    <table class="table">
        @csrf
        <tr>
            <td>FirstName
                <div class="form-control"><input type="text" name="first_name"></div>
                @if ($errors->any())
                    <div class=" alert-danger">{{ $errors->first('first_name') }}</div>
               @endif
            </td>
        </tr>
        <tr>
            <td>LastName
                <div class="form-control"><input type="text" name="last_name"></div>
                @if ($errors->any())
                    <div class=" alert-danger">{{ $errors->first('last_name') }}</div>
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="2"><div class="form-submit"><input type="submit" value="submit"></div></td>
        </tr>
    </table>
</form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@endsection
