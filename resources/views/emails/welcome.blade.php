@component('mail::message')
# Welcome to Our Site Simple CMS

Thank You For Registration with us. <br>
Here, You can see our Latest 5 Product created.

@foreach($products as $product)
## <a href="{{ route('products.show', $product->id) }}" >{{ $product->product_name }}</a>
@endforeach

@component('mail::button', ['url' => route('products.index') ])
View All Products
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
