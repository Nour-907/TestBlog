<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#!">Mini Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/post">Posts</a></li>
                <li class="nav-item"><a class="nav-link" href="/createpost">Create a Post</a></li>
                   @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button>Log out</button>
                    </form>

                   @else
                   <li class="nav-item"><a class="nav-link" href="/login">Log In</a></li>

                   @endauth




            </ul>
        </div>
    </div>
</nav>


@yield('content')
@yield('createpost')



 <!-- Footer-->
 <footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Mini Blog 2024</p></div>
</footer>
