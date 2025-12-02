<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<section class="min-vh-100 d-flex align-items-center">
  <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card">
                 <div class="card-body">
                        <h5 class="card-title">
                            Изменить профиль
                        </h5> 
                        <form action="{{ route('user.profile.save') }}" method="post" class="form">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Имя</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{old('user', $user->name) }}" autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Сохранить</button>   
                        </form>
                 </div> 
            </div>
        </div>
    </div> 
  </div>
</section>
</body>
</html>