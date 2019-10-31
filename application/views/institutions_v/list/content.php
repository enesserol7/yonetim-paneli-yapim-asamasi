<div class="widget widget-07 has-shadow">
  <!-- Begin Widget Header -->
  <div class="widget-header bordered d-flex align-items-center">
    <h2>Kurum Listesi</h2>
    <div class="widget-options">
      <div class="btn-group" role="group">
        <?php if (isAllowedWriteModule()) { ?>
         <a href="<?php echo base_url("institutions/new_form"); ?>" class="pull-right btn btn-outline btn-primary btn-sm"><i class="fa fa-plus"></i>Yeni Ekle</a>
       <?php } ?>
     </div>
   </div>
 </div>
 <!-- End Widget Header -->
 <!-- Begin Widget Body -->
 <div class="widget-body">
  <div class="table-responsive table-scroll padding-right-10" style="max-height: 520px; overflow: hidden; outline: none;" tabindex="5">
    <?php if (empty($items)) { ?>
      <div class="alert alert-info text-center">
       <h5 class="alert-title">Kayıt Bulunamadı</h5>
       <?php if (isAllowedWriteModule()) { ?>
         <p>Burada herhangi bir veri bulunmamaktadır. Ekleme için lütfen <a href="<?php echo base_url("institutions/new_form"); ?>">tıklayınız...</a></p>
       <?php } ?>
     </div>
   <?php }else { ?>
    <table id="export-table" class="table table-hover mb-0 content-container">
      <thead>
        <tr>
          <th class="order"><i class="la la-reorder"></i></th>
          <th>Kurum Adı</th>
          <th>Telefon</th>
          <th>E-Posta</th>
          <th><span style="width:100px;">Durum</span></th>
          <th>İşlemler</th>
        </tr>
      </thead>
      <tbody class="sortable" data-url="<?php echo base_url("institutions/rankSetter"); ?>">
        <?php foreach ($items as $item) { ?>
          <tr id="ord-<?php echo $item->id; ?>">
            <td class="order"><i class="la la-reorder"></i></td>
            <td><?php echo $item->title; ?></td>
            <td><?php echo $item->phone_1; ?></td>
            <td><?php echo $item->email; ?></td>
            <td>
              <div class="media">
                <div class="media-right align-self-center">
                  <label>
                    <input class="toggle-checkbox isActive"
                    type="checkbox"
                    <?php echo ($item->isActive) ? "checked" : ""; ?>
                    data-url="<?php echo base_url("institutions/isActiveSetter/$item->id"); ?>">
                    <span>
                      <span></span>
                    </span>
                  </label>
                </div>
              </div>
            </td>
            <td class="td-actions">
              <?php if (isAllowedDeleteModule()) { ?>
                <a href="#" data-url="<?php echo base_url("institutions/delete/$item->id"); ?>" class="remove-btn"><i class="la la-close delete"></i></a>
              <?php } ?>
              <?php if (isAllowedUpdateModule()) { ?>
                <a href="<?php echo base_url("institutions/update_form/$item->id"); ?>"><i class="la la-edit edit"></i></a>
              <?php } ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  <?php } ?>
</div>
</div>
<!-- End Widget Body -->
<!-- Begin Widget Footer -->

<!-- End Widget Footer -->
</div>