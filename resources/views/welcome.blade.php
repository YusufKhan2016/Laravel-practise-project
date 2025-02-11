<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
</head>
<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-5 py-3 font-monospace">

        <div class="container-fluid ">
            <!-- Home Text -->
            <a class="navbar-brand fs-2" href="#">Home</a>

            <!-- Logo Centered in Navbar -->
            <div class="d-flex justify-content-center flex-grow-1">
                <a href="#">
                    <img src="https://www.datascapeit.com/wp-content/uploads/2023/01/Datascape-IT-Logo-1.png" alt="Company Logo" style="height: 55px;">
                </a>
            </div>

            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle bg-blue    " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Menu
                </button>
                <ul class="dropdown-menu bg-black">
                    <li><a class="dropdown-item text-primary" href="#">Profile</a></li>
                    <li><a class="dropdown-item text-danger" href="#">Settings</a></li>
                    <li><a class="dropdown-item text-success" href="#">Log out</a></li>
                </ul>

            </div>      
            
        </div>
    </nav>

    <main class="px-5">
        <!-- success message  -->
        <div style="display: flex; justify-content:flex-end; padding-bottom:10px;">

            <button style="background-color: green;  border:none; border-radius:4px;"><a style="color: white; text-decoration:none; font-size:17px; padding:5px;" href="/add" target="_blank">Create Post</a></button>
        </div>



        @if(session('success'))
        <div class="alert alert-success alert-dismissable fade in text-2xl text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session('success')}}
        </div>
        @endif
        <!-- success message ends  -->


        <!-- main table content  -->


        <table class="table table-bordered table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post ->id}}</td>
                        <td>{{$post ->Name}}</td>
                        <td>{{$post ->Email}}</td>
                        <td>{{$post ->Phone}}</td>
                        <td>
                            @if ($post->Image)
                                <img src="images/{{$post->Image}}" alt="Image" width="50px">
                            @else
                                <p class="text-danger">No image available</p>
                            @endif
                        </td>
                        <td>
                            <button class="btn btn-warning btn-sm">
                                <a style="text-decoration: none; color:white" href="{{route('edit', $post->id)}}">Edit</a>
                                
                            </button>
                            <button class="btn btn-danger btn-sm">
                                <a style="text-decoration: none; color:white" href="{{route('delete',$post ->id)}}">Delete</a>
                            </button>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        @if ($posts->count() > 0)
        <div class="d-flex justify-content-lg-start mt-3">
            <ul class="pagination">
                <!-- Previous Page -->
                @if ($posts->onFirstPage())
                    <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link" href="{{ $posts->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                @endif

                <!-- Numbered Links -->
                @for ($i = 1; $i <= $posts->lastPage(); $i++)
                    <li class="page-item {{ ($posts->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $posts->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                <!-- Next Page -->
                @if ($posts->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $posts->nextPageUrl() }}" rel="next">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
                @endif
            </ul>
        </div>
        @endif
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>