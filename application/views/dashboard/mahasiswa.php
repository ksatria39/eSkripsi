<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">


        <div class="card mb-4">
          <div class="card-body">
            <div class="card-title">Judul Skripsi</div>
            <h5 class="text-uppercase"><?= $data_proposal[0]->judul; ?></h5>
          </div>
        </div>

        <!-- Bimbingan Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Total Bimbingan <span>| Terbaru</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="ri-article-line"></i>
                </div>
                <div class="ps-3">
                  <div><span class="text-muted small pt-2 ps-1"> Proposal</span>
                    <span class="text-success small pt-1 fw-bold"><?= $guidance_count[0] ?></span> <span class="text-muted small pt-2 ps-1"> Kali</span>
                  </div>
                  <div>
                    <span class="text-muted small pt-2 ps-1"> Skripsi</span>
                    <span class="text-success small pt-1 fw-bold"><?= $guidance_count[1] ?></span> <span class="text-muted small pt-2 ps-1"> Kali</span>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- tanggal bimbingan last Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Terakhir Bimbingan <span>| Tanggal</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="ri-chat-history-line"></i>
                </div>
                <div class="ps-3">
                  <div><span class="text-muted small pt-2 ps-1"> Proposal</span>
                    <span class="text-success small pt-1 fw-bold"><?= $last_guidance_date[0] ?></span>
                  </div>
                  <div>
                    <span class="text-muted small pt-2 ps-1"> Skripsi</span>
                    <span class="text-success small pt-1 fw-bold"><?= $last_guidance_date[1] ?></span>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Revenue Card -->

        <!-- Customers Card -->
        <!-- <div class="col-xxl-4 col-xl-12">

          <div class="card info-card customers-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Customers <span>| This Year</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-people"></i>
                </div>
                <div class="ps-3">
                  <h6>1244</h6>
                  <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                </div>
              </div>

            </div>
          </div>

        </div> -->
        <!-- End Customers Card -->

        <!-- Recent Sales -->
        <div class="col-12">
          <div class="card recent-sales overflow-auto">

            <!-- <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div> -->

            <div class="card-body">
              <h5 class="card-title">Jadwal <span>| Terbaru</span></h5>

              <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                <div class="datatable-top">
                  <!-- <div class="datatable-dropdown">
                    <label>
                      <select class="datatable-selector">
                        <option value="5">5</option>
                        <option value="10" selected="">10</option>
                        <option value="15">15</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                      </select> entries per page
                    </label>
                  </div>
                  <div class="datatable-search">
                    <input class="datatable-input" placeholder="Search..." type="search" title="Search within table">
                  </div> -->
                </div>
                <div class="datatable-container">
                  <table class="table table-borderless datatable datatable-table">
                    <thead>
                      <tr>
                        <th data-sortable="true" style="width: 14.698795180722893%;"><button class="datatable-sorter">#</button></th>
                        <th data-sortable="true" style="width: 24.096385542168676%;"><button class="datatable-sorter">Customer</button></th>
                        <th data-sortable="true" style="width: 24.819277108433734%;"><button class="datatable-sorter">Product</button></th>
                        <th data-sortable="true" style="width: 16.14457831325301%;"><button class="datatable-sorter">Price</button></th>
                        <th data-sortable="true" style="width: 20.240963855421686%;"><button class="datatable-sorter">Status</button></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr data-index="0">
                        <td><a href="#">#2457</a></td>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td>$64</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr data-index="1">
                        <td><a href="#">#2147</a></td>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                      <tr data-index="2">
                        <td><a href="#">#2049</a></td>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td>$147</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr data-index="3">
                        <td><a href="#">#2644</a></td>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                      </tr>
                      <tr data-index="4">
                        <td><a href="#">#2644</a></td>
                        <td>Raheem Lehner</td>
                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                        <td>$165</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="datatable-bottom">
                  <div class="datatable-info">Showing 1 to 5 of 5 entries</div>
                  <nav class="datatable-pagination">
                    <ul class="datatable-pagination-list"></ul>
                  </nav>
                </div>
              </div>

            </div>

          </div>
        </div><!-- End Recent Sales -->

        <!-- Top Selling -->
        <!-- <div class="col-12">
          <div class="card top-selling overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body pb-0">
              <h5 class="card-title">Top Selling <span>| Today</span></h5>

              <table class="table table-borderless">
                <thead>
                  <tr>
                    <th scope="col">Preview</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sold</th>
                    <th scope="col">Revenue</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                    <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                    <td>$64</td>
                    <td class="fw-bold">124</td>
                    <td>$5,828</td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                    <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                    <td>$46</td>
                    <td class="fw-bold">98</td>
                    <td>$4,508</td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                    <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                    <td>$59</td>
                    <td class="fw-bold">74</td>
                    <td>$4,366</td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                    <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                    <td>$32</td>
                    <td class="fw-bold">63</td>
                    <td>$2,016</td>
                  </tr>
                  <tr>
                    <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                    <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                    <td>$79</td>
                    <td class="fw-bold">41</td>
                    <td>$3,239</td>
                  </tr>
                </tbody>
              </table>

            </div>

          </div>
        </div> -->
        <!-- End Top Selling -->

      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

      <!-- Recent Activity -->
      <!-- <div class="card">
        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body">
          <h5 class="card-title">Recent Activity <span>| Today</span></h5>

          <div class="activity">

            <div class="activity-item d-flex">
              <div class="activite-label">1</div>
              <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
              <div class="activity-content">
                <a href="#" class="fw-bold text-dark">Status Pengajuan Judul</a>
              </div>
            </div>

            <div class="activity-item d-flex">
              <div class="activite-label">2</div>
              <i class="bi bi-circle-fill activity-badge text-danger align-self-start"></i>
              <div class="activity-content">
                Voluptatem blanditiis blanditiis eveniet
              </div>
            </div>

            <div class="activity-item d-flex">
              <div class="activite-label">3</div>
              <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
              <div class="activity-content">
                Voluptates corrupti molestias voluptatem
              </div>
            </div>

            <div class="activity-item d-flex">
              <div class="activite-label">4</div>
              <i class="bi bi-circle-fill activity-badge text-info align-self-start"></i>
              <div class="activity-content">
                Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
              </div>
            </div>

            <div class="activity-item d-flex">
              <div class="activite-label">5</div>
              <i class="bi bi-circle-fill activity-badge text-warning align-self-start"></i>
              <div class="activity-content">
                Est sit eum reiciendis exercitationem
              </div>
            </div>

            <div class="activity-item d-flex">
              <div class="activite-label">6</div>
              <i class="bi bi-circle-fill activity-badge text-muted align-self-start"></i>
              <div class="activity-content">
                Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
              </div>
            </div>

          </div>

        </div>
      </div> -->
      <!-- End Recent Activity -->

      <!-- News & Updates Traffic -->
      <div class="card">
        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        <div class="card-body pb-0">
          <h5 class="card-title">Pengumuman</h5>

          <div class="news">
            <div class="post-item clearfix">
              <img src="assets/img/news-1.jpg" alt="">
              <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
              <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
            </div>

            <div class="post-item clearfix">
              <img src="assets/img/news-2.jpg" alt="">
              <h4><a href="#">Quidem autem et impedit</a></h4>
              <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
            </div>

            <div class="post-item clearfix">
              <img src="assets/img/news-3.jpg" alt="">
              <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
              <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
            </div>

            <div class="post-item clearfix">
              <img src="assets/img/news-4.jpg" alt="">
              <h4><a href="#">Laborum corporis quo dara net para</a></h4>
              <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
            </div>

            <div class="post-item clearfix">
              <img src="assets/img/news-5.jpg" alt="">
              <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
              <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
            </div>

          </div><!-- End sidebar recent posts-->

        </div>
      </div>
      <!-- End News & Updates -->

    </div><!-- End Right side columns -->

  </div>
</section>
