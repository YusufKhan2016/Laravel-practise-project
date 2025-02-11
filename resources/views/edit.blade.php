<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertical Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Full-height sidebar */
        .vertical-navbar {
            width: 70vh; /* Adjust width */
            height: 100vh; /* Full height */
            background-color: #343a40; /* Dark background */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-top: 20px;
        }

        /* Rotate text vertically */
        .nav-link {
            writing-mode: vertical-rl; /* Rotate text */
            transform: rotate(180deg); /* Adjust rotation */
            text-align: center;
            justify-content: center ;
            color: white;
            font-size: 100px;
            margin: 10px 0;
            font-weight: 700;
        }

        .nav-link:hover {
            color: white;
        }
    </style>
</head> 
<body>


<div class="d-flex vh-100">
    <div class="position-absolute top-0 start-0 m-3 ">
        <a href="/" class="btn btn-secondary px-5">Go Back</a>
    </div>
    <!-- Sidebar -->
    <div class="vertical-navbar">
        <a class="nav-link" href="#">Admin</a>      
    </div>

    <!-- <div class="d-flex justify-content-center align-items-center w-100">
        
    </div>
     -->
    <!-- Centered Form -->
    <form action="{{ route('update', $ourPost->id) }}" enctype="multipart/form-data" method="post" class="container d-flex align-items-center justify-content-center flex-grow-1">
        @csrf 
        
        <div class="w-50">
            <h1 class="d-flex justify-content-center">{{$ourPost->Name}}'s Form</h1>
            <div class="form-floating  mb-3">
                <input type="text" class="form-control form-control @error('Name') is-invalid @enderror" id="floatingInput" name="Name" placeholder="Name" value="{{$ourPost->Name}}">
                @error('Name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="floatingInput">Name</label>
            </div>  
            <div class="form-floating mb-3">
                <input type="email" class="form-control form-control @error('Email') is-invalid @enderror" id="floatingEmail" name="Email" placeholder="name@example.com" value="{{$ourPost->Email}}">
                @error('Email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="floatingEmail">Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" class="form-control form-control @error('Phone') is-invalid @enderror" id="floatingPhone" name="Phone" placeholder="+8801......"value="{{$ourPost->Phone}}">
                @error('Phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <label for="floatingPhone">Phone</label>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Insert your image (Optional)</label>
                <input name="Image" class="form-control" type="file" id="formFile">
                @error('Image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Add Data</button>
        </div>
    </form> 

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
