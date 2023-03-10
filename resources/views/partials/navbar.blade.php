<nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand text-primary fw-bold fs-3" href="/">
      Pengaduan Masyarakat
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fs-5 {{ ($title === "Pengaduan" ? 'active fw-bold' : '' )}}" aria-current="page" href="/">Aspirasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-5 {{ ($title === "About" ? 'active fw-bold' : '' )}}" aria-current="page" href="/about">About</a>
        </li>
      </ul>
      <a class="navbar-brand text-primary fw-bold fs-3" href="" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-bookmark-star-fill d-inline-block align-text-top "></i>
      </a>
    </div>
  </div>
</nav>

  <div class="container">  @if (session()->has('LoginError'))
    <div class="alert alert-danger my-3 alert-dismissible fade show" role="alert">
      {{ session('LoginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif</div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Login Admin</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/login" method="post">
            @csrf
            <div class="form-floating mb-3">
              <input type="text" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror" autofocus name="username"  id="floatingInput" placeholder="username" >
              <label for="floatingInput">Username</label>
              @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" class="form-control @error('password') is-invalid @enderror" autofocus name="password" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
              @error('password')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
        </div>
      </div>
    </div>
  </div>
