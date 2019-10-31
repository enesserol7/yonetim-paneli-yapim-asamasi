<div class="widget widget-07 has-shadow">
  <div class="widget-header bordered d-flex align-items-center">
    <h2><?php echo $customerStatus; ?>.Aşama Müşteriler Listesi</h2>
    <div class="widget-options">
      <div class="btn-group" role="group">
        <?php if (isAllowedWriteModule()) { ?>
          <a href="<?php echo base_url("customers/new_form"); ?>" class="pull-right btn btn-outline btn-primary btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
        <?php } ?>
        <a href="<?php echo base_url("customers/customer_status/1"); ?>" class="btn btn-shadow btn btn-gradient-04">1.Aşama Müşterileri Gör</a>
        <a href="<?php echo base_url("customers/customer_status/2"); ?>" class="btn btn-shadow btn btn-gradient-03">2.Aşama Müşterileri Gör</a>
        <a href="<?php echo base_url("customers/customer_status/3"); ?>" class="btn btn-shadow btn btn-gradient-01">3.Aşama Müşterileri Gör</a>
        <a href="<?php echo base_url("customers/customer_status/4"); ?>" class="btn btn-shadow btn btn-gradient-05">4.Aşama Müşterileri Gör</a>
        <a href="<?php echo base_url("customers/customer_status/5"); ?>" class="btn btn-shadow btn btn-gradient-03">5.Aşama Müşterileri Gör</a>
        <a href="<?php echo base_url("customers/customer_status/6"); ?>" class="btn btn-shadow btn btn-gradient-04">6.Aşama Müşterileri Gör</a>
        <a href="<?php echo base_url("customers/customer_status/7"); ?>" class="btn btn-shadow btn btn-gradient-01">7.Aşama Müşterileri Gör</a>
      </div>
    </div>
  </div>
  <div class="widget-body">
    <div class="table-responsive table-scroll padding-right-10" style="overflow: hidden; outline: none;" tabindex="5">
      <?php if (empty($items)) { ?>
        <div class="alert alert-info text-center">
         <h5 class="alert-title">Kayıt Bulunamadı</h5>
         <?php if (isAllowedWriteModule()) { ?>
          <p>Burada herhangi bir veri bulunmamaktadır. Ekleme için lütfen <a href="<?php echo base_url("customers/new_form"); ?>">tıklayınız...</a></p>
        <?php } ?>
      </div>
    <?php }else { ?>
      <table id="export-table" class="table table-hover mb-0 content-container">
        <thead>
          <tr>
            <th>İsim & Soyisim</th>
            <th>TC</th>
            <th>Bayi</th>
            <th>Telefon</th>
            <th><span>Durum</span></th>
            <th><span>Aktif/Pasif</span></th>
            <th>İşlemler</th>
          </tr>
        </thead>
        <tbody class="sortable" data-url="<?php echo base_url("customers/rankSetter"); ?>">
          <?php $itemss = array_unique($items,SORT_REGULAR); ?>
          <?php foreach ($itemss as $item) { ?>
            <tr id="ord-<?php echo $item->id; ?>">
              <td><?php echo $item->personnel_name; ?></td>
              <td><?php echo $item->tc; ?></td>
              <td><?php echo $item->institution_name; ?></td>
              <td><?php echo $item->personnel_phone; ?></td>
              <td>
                <?php if($item->isActive == 1){ ?>
                  <?php echo "<b style='color:green'>1.Aşamada</b>" ?>
                <?php }else if($item->isActive == 2) { ?>
                  <?php echo "<b style='color:orange'>2.Aşamada</b>" ?> 
                <?php }else if($item->isActive == 3) { ?>
                  <?php echo "<b style='color:orange'>3.Aşamada</b>" ?> 
                <?php }else if($item->isActive == 4) { ?>
                  <?php echo "<b style='color:orange'>4.Aşamada</b>" ?> 
                <?php }else if($item->isActive == 5) { ?>
                  <?php echo "<b style='color:orange'>5.Aşamada</b>" ?> 
                <?php }else if($item->isActive == 6) { ?>
                  <?php echo "<b style='color:orange'>6.Aşamada</b>" ?> 
                <?php }else if($item->isActive == 7) { ?>
                  <?php echo "<b style='color:orange'>7.Aşamada</b>" ?> 
                <?php } ?>
              </td>
              <td>
                <div class="media">
                  <div class="media-right align-self-center">
                    <label>
                      <input class="toggle-checkbox isActive"
                      type="checkbox"
                      data-url="<?php echo base_url("customers/isActivePersonnelSetter/$item->id"); ?>"
                      <?php echo ($item->isActivePersonnel) ? "checked" : ""; ?> 
                      >
                      <span>
                        <span></span>
                      </span>
                    </label>
                  </div>
                </div>
              </td>
              <td class="td-actions">
                <?php if($this->session->userdata("user")){ ?>
                  <?php if (isAllowedDeleteModule()) { ?>
                    <a href="#" data-url="<?php echo base_url("customers/delete/$item->id"); ?>" class="remove-btn" title="Sil"><i class="la la-close delete"></i></a>
                  <?php } ?>
                <?php } ?>
                <?php if (isAllowedUpdateModule()) { ?>
                  <a href="<?php echo base_url("customers/update_form/$item->id"); ?>" title="Düzenle"><i class="la la-edit edit"></i></a>
                <?php } ?>
                <?php if (isAllowedViewModule()) { ?>
                  <a href="<?php echo base_url("customers/document_form/$item->id"); ?>" title="Dokümanlar"><i class="la la-paste documentList"></i></a>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } ?>
  </div>
</div>
</div>