
<section class="section">
        <div class="card">
            <div class="card-body">
              <form>

                <div class="row mb-3 mt-3">
                  <label class="col-sm-2 col-form-label">Judul</label>
                  <div class="col-sm-10">
                    <select class="form-select w-50" aria-label="Default select example">
                      <option selected="">Pilih Judul</option>
                      <option value="1">Sistem Informasi</option>
                      <option value="2">Data Mining</option>
                      <option value="3">UI/UX</option>
                    </select>
                  </div>
                </div>

                <div class="row mb-3 mt-3">
                  <label class="col-sm-2 col-form-label">Naskah Skripsi</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control w-50" placeholder="Pilih File">
                  </div>
                </div>

                <div class="row mb-3 mt-3">
                  <label class="col-sm-2 col-form-label">Traskrip Nilai</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control w-50" placeholder="Pilih File">
                  </div>
                </div>

                  <div class="col-sm-10" align="center">
                    <a href="<?= base_url()?>registration_proposal/admin2" type="submit" class="btn btn-primary">Daftar</a>
                  </div>

              </form>
            </div>
        </div>
</section>
