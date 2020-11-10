@extends('dashboard.layout')

@section('content')
<form action="{{ route('purchases.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="category">Select User Name</label>
    <select class="form-control" id="userName" name="userName">
      <option value="">Select user</option>
      @foreach($users as $user)
        <option value="{{ $user->id }}" {{ old('userName') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
      @endforeach
    </select>
    @error('userName')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="category">Select Category</label>
    <select class="form-control" id="category" name="category">
      <option value="">Select category</option>
      @foreach($categories as $category)
      	<option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
      @endforeach
    </select>
    @error('category')
    <span style="color: red">{{ $message }}</span>
    @endif
  </div>
  <div class="form-group">
    <label for="InputRole">Product</label>
    <select class="form-control" id="product" name="product[]" multiple="multiple">
      <option value="">Select category first</option>
      {{-- @foreach($products as $product)
        <option value="{{ $product->id }}" {{ old('product') == $product->id ? 'selected' : '' }}>{{ $product->product_name }}</option>
      @endforeach --}}
    </select>
    @error('product')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
  <div class="form-group">
    <label for="InputRole">Price</label>
    <input type="number" class="form-control" id="amount" name="amount" placeholder="0" value="{{old('amount')}}" readonly="readonly">
    @error('amount')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
  <div class="form-group">
    <label for="InputRole">Purchase Date</label>
    <input type="date" class="form-control" id="date" name="date" placeholder="Ener Purchase Date" value="{{old('date')}}">
    @error('date')
    <span style="color: red">{{ $message }}</span>
    @endif 
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

{{-- Jquery --}}

<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){

  // get product list from select category wise
  $("select[name='category']").change(function(){
      var category = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('get-product') ?>",
          method: 'POST',
          data: {category:category, _token:token},
          success: function(data) {
            $("select[id='product'").html('');
            $("select[id='product'").html(data.options);
          }
      });
  });

  // set ammout selected product
  $("select[id='product']").change(function(){
      var product = $(this).val();
      var token = $("input[name='_token']").val();
      $.ajax({
          url: "<?php echo route('get-amount') ?>",
          method: 'POST',
          data: {product:product, _token:token},
          success: function(data) {
            $("#amount").val(data.options);
          }
      });
  });

  });
</script>