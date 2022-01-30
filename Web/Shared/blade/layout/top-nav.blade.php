<nav class=" bg-gray-900 text-gray-400 font-bold w-screen flex items-center px-4">
    <a href="/dashboard" class="flex py-3 gap-4 text-red-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
             stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
        </svg>
        <div>Book.Quest</div>
    </a>
    <div class="flex flex-1 pl-6 items-center" hx-target="#primary">
        <a href="/book" hx-get="/book"  hx-push-url="/book" class="px-2 py-3 text-amber-400 hover:text-amber-300 hover:underline decoration-2">Books</a>
        <a href="/author" hx-get="/author" hx-push-url="/author" class="px-2 py-3 text-lime-400 hover:text-lime-300 hover:underline decoration-2">Authors</a>
        <a href="/series" hx-get="/series" hx-push-url="/series" class="px-2 py-3 text-green-400 hover:text-green-300 hover:underline decoration-2">Series</a>
        <a href="/universe" hx-get="/universe" hx-push-url="/universe" class="px-2 py-3 text-emerald-400 hover:text-emerald-300 hover:underline decoration-2">Universes</a>
        <a href="/narrator" hx-get="/narrator" hx-push-url="/narrator" class="px-2 py-3 text-cyan-400 hover:text-cyan-300 hover:underline decoration-2">Narrators</a>
        <a href="/map" hx-get="/map" hx-push-url="/map" class="px-2 py-3 text-sky-400 hover:text-sky-300 hover:underline decoration-2">Map</a>
    </div>
    <div>
        @if(\Infrastructure\Auth\Service\Auth::user() !== null)
            <div>{{\Infrastructure\Auth\Service\Auth::user()->display_name}}</div>
        @else
            <button onclick="dialog('/login/login-selector-dialog')" class="text-white font-medium">Login</button>
        @endif
    </div>
</nav>
