<nav class="border-b border-border px-6">
    <div class="max-w-6xl mx-auto h-16 flex items-center justify-between">
        <div>
            <a href="/">
                <img src="/images/logo.png" alt="Idea logo" width="150">
            </a>
        </div>
        <div class="space-x-6">
            @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn error">Logout</button>
                </form>
            @endauth
            @guest
                <a href="/login">Log in</a>
                <a href="/register" class="btn">Register</a>
            @endguest
            
        </div>
    </div>

</nav>