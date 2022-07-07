        <!-- CONTENT -->
        <div class="col-lg-10 bg-white p-4 mt-1">
            <!-- JUDUL TABEL -->
            <h3><i class="fas fa-file-medical mr-2"></i> DIAGNOSIS</h3><hr>

            <!-- TABEL -->
            <form action="<?= BASEURL;?>/diagnosis" method="post">
                <input type="hidden" name="page" value="<?= $data['page'];?>">
                <div class="continer shadow p-3" style="background-color: whitesmoke;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Id Gejala</th>
                                <th scope="col">Gejala Kerusakan</th>
                                <th scope="col" class="text-center">Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i=$data['dataAwal']; $i < $data['dataAkhir']; $i++) { ?>
                            <tr>
                                <th scope="row"><?= 'G'.$data['gejala'][$i]['id_gejala'];?></th>
                                <td><?= $data['gejala'][$i]['nama_gejala'];?></td>
                                <td>
                                <select id="inputState" class="form-control" name="bobot[<?= $data['gejala'][$i]['id_gejala'];?>]">
                                    <!-- <option value='1'>Pilih bobot</option> -->
                                    <?php foreach ($data['bobot'] as $id => $bobot) { ?>
                                        <option value="<?= $bobot['id_bobot']; ?>" <?php if($data['inputan'][$i+1]==$bobot['id_bobot']){ ?> selected <?php }?>><?= $bobot['keterangan']; ?></option>
                                    <?php } ?>
                                </select>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>     
                </div>
                <button type="submit" class="btn btn-success btn-md mt-3 float-left" style="width: 300px;" name="hasilDiagnosis"><b>Cek Kerusakan</b></button><br>
                <nav aria-label="...">
                    <ul class="pagination float-right">
                        <li class="page-item <?php if($data['page']==1){ ?> disabled <?php }?>">
                        <button class="page-link" name="prev" href="<?= BASEURL;?>/diagnosis/<?= $data['page']-1; ?>" tabindex="-1">Previous</button>
                        </li>
                        <?php for ($i=1; $i <= $data['maxPage']; $i++) { ?>
                            <li class="page-item <?php if($data['page']==$i){ ?> active <?php }?>">
                                <button class="page-link" name="tombolPage" value="<?= $i; ?>" href="<?= BASEURL;?>/diagnosis/<?= $i; ?>"><?= $i; ?></button>
                            </li>
                        <?php } ?>
                        <li class="page-item <?php if($data['page']==$data['maxPage']){ ?> disabled <?php }?>">
                        <button class="page-link" name="next" href="<?= BASEURL;?>/diagnosis/<?= $data['page']+1; ?>">Next</button>
                        </li>
                    </ul>
                </nav>
            </form>
                
            <br><br><br><br><br><br><br><br>  
        </div>