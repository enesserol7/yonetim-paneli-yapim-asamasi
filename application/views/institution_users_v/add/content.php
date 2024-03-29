<div class="container-fluid">
    <!-- Begin Page Header-->
    <!-- End Page Header -->
    <div class="row flex-row">
        <div class="col-xl-12">
            <!-- Form -->
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Yeni Kullanıcı Ekle</h4>
                </div>
                <div class="widget-body">
                    <form class="needs-validation" novalidate action="<?php echo base_url("institution_users/save"); ?>" method="post">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kullanıcı Adı *</label>
                            <div class="col-lg-5">
                                <input class="form-control" placeholder="Kullanıcı Adı" name="user_name" value="<?php echo isset($form_error) ? set_value("user_name") : ""; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("user_name"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">İsim & Soyisim *</label>
                            <div class="col-lg-5">
                                <input class="form-control" placeholder="Ad Soyad" name="full_name" value="<?php echo isset($form_error) ? set_value("full_name") : ""; ?>">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("full_name"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">E-Posta Adresi *</label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo isset($form_error) ? set_value("email") : ""; ?>">
                                    <?php if (isset($form_error)) { ?>
                                        <small class="input-form-error pull-right"><?php echo form_error("email"); ?></small>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Şifre *</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" placeholder="Şifre" name="password">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("password"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Şifre Tekrar *</label>
                            <div class="col-lg-5">
                                <input type="password" class="form-control" placeholder="Şifre Tekrar" name="re_password">
                                <?php if (isset($form_error)) { ?>
                                    <small class="input-form-error pull-right"><?php echo form_error("re_password"); ?></small>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-4 form-control-label d-flex justify-content-lg-end">Kullanıcı Rolü *</label>
                            <div class="col-lg-5">
                                <div class="select">
                                    <?php if ($this->session->userdata("user")) { ?>
                                        <select name="user_role_id" class="form-control">
                                            <?php foreach($user_roles as $user_role) { ?>
                                                <option value="<?php echo $user_role->id; ?>"><?php echo $user_role->title; ?></option>
                                            <?php } ?>
                                        </select>
                                        <?php if(isset($form_error)){ ?>
                                            <small class="pull-right input-form-error"> <?php echo form_error("user_role_id"); ?></small>
                                        <?php } ?>
                                    <?php }elseif ($this->session->userdata("institution_user")) { ?>
                                        <select name="user_role_id" class="form-control">
                                            <?php foreach($user_roles as $user_role) { ?>
                                                <?php if (isAllowedViewInstitution($user_role->institution_id)) { ?>
                                                <option value="<?php echo $user_role->id; ?>"><?php echo $user_role->title; ?></option>
                                            <?php } ?>
                                        <?php } ?>
                                    </select>
                                    <?php if(isset($form_error)){ ?>
                                        <small class="pull-right input-form-error"> <?php echo form_error("user_role_id"); ?></small>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button class="btn btn-gradient-01" type="submit">Kaydet</button>
                        <a href="<?php echo base_url("institution_users"); ?>" class="btn btn-shadow">İptal</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Form -->
    </div>
</div>
<!-- End Row -->
</div>