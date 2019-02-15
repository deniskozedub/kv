@extends('welcome')

@section('content')
<h3>companies</h3>


<table class="table table-responsive">
    <thead>
    <tr>
        <th>name</th>
        <th>email</th>
        <th>logo</th>
        <th>action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($company as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td><img src="{{$item->logo}}" height="100"></td>
        <td>
            <button class="btn btn-primary" data-name="{{$item->name}}"  data-email="{{$item->email}}"
                    data-idcat="{{$item->id}}"   data-toggle="modal" data-target="#edit" >edit</button>
            <button class="btn btn-danger" data-idcat="{{$item->id}}"     data-toggle="modal" data-target="#delete" >delete</button>
        </td>

    </tr>
    @endforeach
    </tbody>
</table>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
   add company
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">add company</h4>
            </div>

            <form method="post" action="new_company" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" name="name" id="title">

                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" id="email">

                </div>

                    <div class="form-group">
                        <label for="logo">Email:</label>
                        <input type="file" class="form-control" name="logo" id="logo">

                    </div>

                </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>

            </div>
            </form>
        </div>
    </div>
</div>










<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">edit company</h4>
            </div>

            <form action="/new_company" enctype="multipart/form-data" method="post">
                {{method_field('patch')}}

                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="cat_id" id="cat_id">

                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name">

                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email">

                    </div>

                    <div class="form-group">
                        <label for="logo">Email:</label>
                        <input type="file" class="form-control" name="logo" id="logo">

                    </div>

                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>

                </div>
            </form>
        </div>
    </div>
</div>




<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">delete company</h4>
            </div>

            <form action="/new_company" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden" name="cat_id" id="cat_id" >
                    <p class="text-center">
                    Are you sure??
                    </p>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">back</button>
                    <button type="submit" class="btn btn-success">delete</button>

                </div>
            </form>
        </div>
    </div>
</div>








@endsection
