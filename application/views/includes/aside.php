<div class="default-sidebar">
    <nav class="side-navbar box-scroll sidebar-scroll">
        <ul class="list-unstyled">
            <li><a href="<?php echo base_url(); ?>"><i class="la la-columns"></i><span>Dashboard</span></a></li>
        </ul>
        <span class="heading">Bayi İşlemleri</span>
        <ul class="list-unstyled">
            <?php if(isAllowedViewModule("institutions")) { ?>
                <li><a href="<?php echo base_url("institutions"); ?>" title="Bayiler"><i class="la la-share-alt"></i><span>Bayiler</span></a></li>
            <?php } ?>
            <?php if(isAllowedViewModule("institution_users")) { ?>
                <li><a href="<?php echo base_url("institution_users"); ?>" title="Bayi Kullanıcıları"><i class="la la-users"></i><span>Bayi Kullanıcıları</span></a></li>
            <?php } ?>
            <?php if(isAllowedViewModule("institution_user_roles")) { ?>
                <li><a href="<?php echo base_url("institution_user_roles"); ?>" title="Bayi Kullanıcı Rolü"><i class="la la-user-secret"></i><span>Bayi Kullanıcı Rolü</span></a></li>
            <?php } ?>
        </ul>
        <span class="heading">Müşteri İşlemleri</span>
        <ul class="list-unstyled">
            <?php if(isAllowedViewModule("customers")) { ?>
                <li><a href="<?php echo base_url("customers"); ?>" title="Müşteri Girişi"><i class="la la-user-plus"></i><span>Müşteri Girişi</span></a></li>
            <?php } ?>
        </ul>
        <?php if ($this->session->userdata("user")) { ?>
            <span class="heading">Panel Kullanıcıları</span>
            <ul class="list-unstyled">
                <?php if(isAllowedViewModule("users")) { ?>
                    <li><a href="<?php echo base_url("users"); ?>" title="Kullanıcılar"><i class="la la-users"></i><span>Kullanıcılar</span></a></li>
                <?php } ?>
                <?php if(isAllowedViewModule("user_roles")) { ?>
                    <li><a href="<?php echo base_url("user_roles"); ?>" title="Kullanıcı Rolü"><i class="la la-user-secret"></i><span>Kullanıcı Rolü</span></a></li>
                <?php } ?>
            </ul>
        <?php } ?>
    </nav>
</div>