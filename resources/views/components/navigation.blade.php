<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            NBA Teams
        </a>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/teams">All teams</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/news">News</a>
            </li>
            @if (!auth()->check())
                <li class="nav-item">
                    <a class="nav-link" href="/login">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Sign up</a>
                </li>
            @endif
            @if (auth()->check())
                <li class="nav-item">
                    <strong> Username: {{ auth()->user()->name }} </strong>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>
            @endif
        </ul>
    </div>
</nav>

<style>
    .navbar-nav {
        flex-direction: row !important;
        align-items: center;
    }

    .nav-item {
        display: flex;
        align-items: center;
        margin-left: 15px;
        text-transform: capitalize;
    }
</style>
