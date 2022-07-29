<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width:100%;height:93vh">
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2"
            data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong><?php echo $_COOKIE['username'] ?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
    </div>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <!-- <li class="nav-item">
            <a href="#" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16">
                    <use xlink:href="index.php"></use>
                </svg>
                Home
            </a>
        </li> -->
        <li>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Customer
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="nav nav-pills flex-column mb-auto">
                                    <li>
                                        <a href="index.php" class="nav-link link-dark">
                                            <svg class="bi me-2" width="16" height="16">
                                                <use xlink:href="#table"></use>
                                            </svg>
                                            All customer
                                        </a>
                                    </li>
                                    <li>
                                        <a href="create.php" class="nav-link link-dark">
                                            <svg class="bi me-2" width="16" height="16">
                                                <use xlink:href="#table"></use>
                                            </svg>
                                            Create customer
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li>

    </ul>
    <hr>
</div>