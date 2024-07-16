<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- <style>
    .info-card {
      background: #f8f9fa;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.2s;
      cursor: pointer;
    }

    .info-card:hover {
      transform: scale(1.05);
    }

    .info-card .card-icon {
      background: #e9ecef;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1.5rem;
    }

    .info-card .card-title {
      font-size: 1.2rem;
      margin-bottom: 1rem;
    }

    .info-card .card-body {
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .info-card .card-body h6 {
      font-size: 1.5rem;
    }

    .section .pagetitle {
      margin-bottom: 2rem;
    }

    .card {
      margin-bottom: 1.5rem;
    }
  </style> -->
  <title>Dasbor Dosen</title>
</head>

<body>

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
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
                <h5 class="card-title"><a class="card-title" href="<?= base_url() ?>title/">Judul Perlu Disetujui</a></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="ri-user-follow-line"></i>
                  </div>
                  <div class="ps-3">
                    <span class="text-success small pt-1 fw-bold" class=""><?= $judul; ?> </span><span class="text-muted small">mahasiswa</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
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
                <h5 class="card-title"><a class="card-title" href="<?= base_url() ?>Progress_proposal/">Mahasiswa yang Dibimbing</a></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <span class="text-success small pt-1 fw-bold" class=""><?= $dibimbing; ?> </span><span class="text-muted small">mahasiswa</span>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

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

          </div><!-- End Customers Card -->

          <!-- Recent Sales -->
          <!-- <div class="col-12">
            <div class="card recent-sales overflow-auto">

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
                <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                  <div class="datatable-top">
                    <div class="datatable-dropdown">
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
                    </div>
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
          </div> -->
          <!-- End Recent Sales -->

          <!-- Top Selling -->
          <div class="col-12">
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
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Budget Report -->
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

          <div class="card-body pb-0">
            <h5 class="card-title">Budget Report <span>| This Month</span></h5>

            <div id="budgetChart" style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);" class="echart" _echarts_instance_="ec_1721038297419">
              <div style="position: relative; width: 714px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="714" height="400" style="position: absolute; left: 0px; top: 0px; width: 714px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
            </div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                  legend: {
                    data: ['Allocated Budget', 'Actual Spending']
                  },
                  radar: {
                    // shape: 'circle',
                    indicator: [{
                        name: 'Sales',
                        max: 6500
                      },
                      {
                        name: 'Administration',
                        max: 16000
                      },
                      {
                        name: 'Information Technology',
                        max: 30000
                      },
                      {
                        name: 'Customer Support',
                        max: 38000
                      },
                      {
                        name: 'Development',
                        max: 52000
                      },
                      {
                        name: 'Marketing',
                        max: 25000
                      }
                    ]
                  },
                  series: [{
                    name: 'Budget vs spending',
                    type: 'radar',
                    data: [{
                        value: [4200, 3000, 20000, 35000, 50000, 18000],
                        name: 'Allocated Budget'
                      },
                      {
                        value: [5000, 14000, 28000, 26000, 42000, 21000],
                        name: 'Actual Spending'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div> -->
        <!-- End Budget Report -->

        <!-- Website Traffic -->
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

          <div class="card-body pb-0">
            <h5 class="card-title">Website Traffic <span>| Today</span></h5>

            <div id="trafficChart" style="min-height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: relative;" class="echart" _echarts_instance_="ec_1721038297420">
              <div style="position: relative; width: 714px; height: 400px; padding: 0px; margin: 0px; border-width: 0px;"><canvas data-zr-dom-id="zr_0" width="714" height="400" style="position: absolute; left: 0px; top: 0px; width: 714px; height: 400px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas></div>
              <div class=""></div>
            </div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: 1048,
                        name: 'Search Engine'
                      },
                      {
                        value: 735,
                        name: 'Direct'
                      },
                      {
                        value: 580,
                        name: 'Email'
                      },
                      {
                        value: 484,
                        name: 'Union Ads'
                      },
                      {
                        value: 300,
                        name: 'Video Ads'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div> -->
        <!-- End Website Traffic -->

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
            <h5 class="card-title">Jadwal &amp; Pengumuman</h5>

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

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>