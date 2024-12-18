<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo.png') }}" alt="JB Smartphones Logo" width="150" height="auto">
    </a>   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav custom-navbar">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('category') }}">Category</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('brand') }}">Brands</a>
            </li>
        </ul>
    </div>
</nav>