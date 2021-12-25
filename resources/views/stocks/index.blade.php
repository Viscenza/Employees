@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
  <h1 class="display-3">Stocks</h1>
  <div>
    <a href="{{ route('stocks.create')}}" class="btn btn-primary mb-3">Add Stock</a>
  </div>
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div>
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Stock Name</td>
          <td>Stock Ticket</td>
          <td>Stock Value</td>
          <td>Updated at</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
<tbody>
@foreach($stocks as $stock)
         <tr>
            <td>{{$stock->id}}</td>
            <td>{{$stock->stock_name}} </td>
            <td>{{$stock->ticket}}</td>
            <td>{{$stock->value}}</td>
            <td>{{$stock->updated_at}}</td>
            <td>
    <a href="{{ route('stocks.edit',$stock->id)}}" class="btn btn-primary">Edit</a>
    </td>
    <td>
<form action="{{ route('stocks.destroy', $stock->id)}}"method="post">
  @csrf
  @method('DELETE')
  <button class="btn btn-danger"type="submit">Delete</button>
                </form>
    </td>
  </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
