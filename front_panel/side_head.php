</head>
<body class="bg-light">
<div class="container">
    <div class="row">
        <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded my-2">
                <a class="navbar-brand" href="#">ZMK</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0" action='search.php' method='post'>
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" name='search_key' aria-label="Search">
                    <button class="btn btn-light my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
              </nav>
        </div>
        <div class="col-12">
         <?php foreach(show_ads() as $ads){ ?>
          <div class="card mb-4">
            <div class="card-body">
              <a href="<?php echo $ads['link'] ?>" target='_blink'><img src="assests/img/<?php echo $ads['photo'] ?>" class='w-100' alt=""></a>
            </div>
          </div>
         <?php } ?>
        </div>
    </div>
</div>