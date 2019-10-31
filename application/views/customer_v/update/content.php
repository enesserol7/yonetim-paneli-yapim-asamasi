<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4><?php echo "<b>$item->personnel_name</b> kaydını düzenliyorsunuz" ?></h4>
                </div>
                <div class="widget-body">
                    <?php 
                    $personnel_nameSurname = explode(" ", $item->personnel_name);
                    
                    ?>
                    <form class="needs-validation" novalidate action="<?php echo base_url("customers/update/$item->id"); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kurum *</label>
                            <div class="col-lg-5">
                                <?php if ($this->session->userdata("user")) { ?>
                                  <div class="select">
                                    <select name="institution_id" class="form-control">
                                        <?php $institutionss = array_unique($institutions,SORT_REGULAR); ?>
                                        <?php foreach($institutions as $institution) { ?>
                                            <option <?php echo ($institution->id == $item->institution_id) ? "selected" : ""; ?> value="<?php echo $institution->id; ?>"><?php echo $institution->title; ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php if(isset($form_error)){ ?>
                                      <small class="pull-right input-form-error"> <?php echo form_error("institution_id"); ?></small>
                                  <?php } ?>
                              </div>
                          <?php }elseif ($this->session->userdata("institution_user")) { ?>
                              <div class="select">
                                <select name="institution_id" class="form-control">
                                    <?php $institutionss = array_unique($institutions,SORT_REGULAR); ?>
                                    <?php foreach($institutions as $institution) { ?>
                                        <?php if (isAllowedViewInstitution($institution->id)) { ?>
                                          <option <?php echo ($institution->id == $item->institution_id) ? "selected" : ""; ?> value="<?php echo $institution->id; ?>"><?php echo $institution->title; ?></option>
                                      <?php } ?>
                                  <?php } ?>
                              </select>
                              <?php if(isset($form_error)){ ?>
                                  <small class="pull-right input-form-error"> <?php echo form_error("institution_id"); ?></small>
                              <?php } ?>
                          </div>
                      <?php } ?>
                  </div>
              </div>
              <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İsim *</label>
                <div class="col-lg-5">
                    <input class="form-control" placeholder="İsim" name="personnel_name" value="<?php echo isset($form_error) ? set_value("personnel_name") : "$personnel_nameSurname[0]"; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("personnel_name"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Soyisim *</label>
                <div class="col-lg-5">
                    <input class="form-control" placeholder="Soyisim" name="personnel_surname" value="<?php echo isset($form_error) ? set_value("personnel_surname") : "$personnel_nameSurname[1]"; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("personnel_surname"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">TC No *</label>
                <div class="col-lg-5">
                    <input class="form-control" placeholder="TC No" name="tc" value="<?php echo isset($form_error) ? set_value("tc") : "$item->tc"; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("tc"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sicil No * </label>
                <div class="col-lg-5">
                    <input class="form-control" placeholder="Sicil No" name="registration_number" value="<?php echo isset($form_error) ? set_value("registration_number") : "$item->registration_number"; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("registration_number"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Telefon *</label>
                <div class="col-lg-5">
                    <input class="form-control" placeholder="Telefon" name="personnel_phone" value="<?php echo isset($form_error) ? set_value("personnel_phone") : "$item->personnel_phone"; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("personnel_phone"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Giriş Tarihi *</label>
                <div class="col-lg-5">
                    <input type="date" class="form-control" placeholder="Giriş Tarihi: DD/MM/YYY" name="entry_date" value="<?php echo isset($form_error) ? set_value("entry_date") : "$item->entry_date"; ?>">
                    <?php if (isset($form_error)) { ?>
                        <small class="input-form-error pull-right"><?php echo form_error("entry_date"); ?></small>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Aşama *</label>
                <div class="col-lg-5">
                    <div class="select">
                        <select name="isActive" class="form-control">
                            <option <?php echo ($item->isActive == "1") ? "selected" : ""; ?> value="1">1.Aşamada</option>
                            <option <?php echo ($item->isActive == "2") ? "selected" : ""; ?> value="2">2.Aşamada</option>
                            <option <?php echo ($item->isActive == "3") ? "selected" : ""; ?> value="3">3.Aşamada</option>
                            <option <?php echo ($item->isActive == "4") ? "selected" : ""; ?> value="4">4.Aşamada</option>
                            <option <?php echo ($item->isActive == "5") ? "selected" : ""; ?> value="5">5.Aşamada</option>
                            <option <?php echo ($item->isActive == "6") ? "selected" : ""; ?> value="6">6.Aşamada</option>
                            <option <?php echo ($item->isActive == "7") ? "selected" : ""; ?> value="7">7.Aşamada</option>
                        </select>
                        <?php if(isset($form_error)){ ?>
                            <small class="pull-right input-form-error"> <?php echo form_error("isActive"); ?></small>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-8 form-control-label d-flex justify-content-lg-end">Evrak Güncelleme İşlemi Yapmayacaksanız Alttaki Alanları Boş Bırakınız! </label>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kimlik Fotokopisi Seçiniz </label>
                <div class="col-lg-5">
                    <input type="file" name="copy_of_identity_card" class="form-control">
                </div>
            </div>
            <div class="form-group row d-flex align-items-center mb-5">
                <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Sözleşme Seçiniz </label>
                <div class="col-lg-5">
                    <input type="file" name="contract" class="form-control">
                </div>
            </div>
            <div class="text-right">
                <button class="btn btn-gradient-01" type="submit">Kaydet</button>
                <a href="<?php echo base_url("customers"); ?>" class="btn btn-shadow">İptal</a>
            </div>
        </form>
    </div>
</div>
<!-- End Form -->
</div>
</div>
<!-- End Row -->
</div>