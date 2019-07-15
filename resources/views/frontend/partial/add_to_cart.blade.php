<form class="" action="{{ route('cards.store') }}" method="post">
  @csrf
  <input type="hidden" name="product_id" value="{{ $product->id }}">
  <button class="btn btn-outline-info _cart _add-to-cart" type="submit" name="button">ADD TO CART</button>
</form>
