<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav"
                aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav">
                @forelse ($varieties as $variety)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('variety.show', $variety->slug) }}">{{ $variety->name }}</a>
                    </li>
                @empty
                  <div>
                      <p>You have no categories yet</p>
                  </div>
                @endforelse
            </ul>
        </div>
    </div>
</nav>